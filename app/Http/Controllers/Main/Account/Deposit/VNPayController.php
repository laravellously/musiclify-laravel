<?php
 
namespace App\Http\Controllers\Main\Account\Deposit;
 
use App\Http\Controllers\Controller;
use App\Models\DepositTransaction;
use Illuminate\Http\Request;
use App\Models\User;

class VNPayController extends Controller
{
   
    /**
     * Stripe callback
     *
     * @param Request $request
     * @return void
     */
    public function callback(Request $request)
    {
        try {

            // Get secure hashed value
            $vnp_SecureHash = $request->get('vnp_SecureHash');

            // Set empty array
            $paramas        = array();

            // Loop through all queires
            foreach ($request->all() as $key => $value) {
                if (substr($key, 0, 4) == "vnp_") {
                    $paramas[$key] = $value;
                }
            }
        
            // Remove hashed value from list
            unset($paramas['vnp_SecureHash']);

            // Sort by key
            ksort($paramas);

            $i        = 0;
            $hashData = "";
            foreach ($paramas as $key => $value) {
                if ($i == 1) {
                    $hashData = $hashData . '&' . urlencode($key) . "=" . urlencode($value);
                } else {
                    $hashData = $hashData . urlencode($key) . "=" . urlencode($value);
                    $i = 1;
                }
            }

            // Get hash secret
            $secureHash = hash_hmac('sha512', $hashData, config('vnpay.hash_secret'));

            // Secure hash must be same in request
            if ($secureHash == $vnp_SecureHash) {

                // Check if payment succeded
                if ($request->get('vnp_ResponseCode') == '00') {

                    // Get default currency exchange rate
                    $default_currency_exchange = settings('currency')->exchange_rate;

                    // Get payment gateway exchange rate
                    $gateway_currency_exchange = settings('vnpay')->exchange_rate;

                    // Get gateway default currency
                    $gateway_currency          = "VND";

                    // Set provider name
                    $provider_name             = 'vnpay';

                    // Get paid amount
                    $amount                    = $request->get('vnp_Amount') / 100;

                    // Calculate fee
                    $fee                       = $this->calculateFee($amount);

                    // Set transaction id
                    $transaction_id            = $request->get('vnp_TransactionNo');

                    // Make transaction
                    $deposit                   = new DepositTransaction();
                    $deposit->user_id          = auth()->id();
                    $deposit->transaction_id   = $transaction_id;
                    $deposit->payment_method   = $provider_name;
                    $deposit->amount_total     = round( ($amount * $default_currency_exchange) / $gateway_currency_exchange, 2 );
                    $deposit->amount_fee       = round( ($fee * $default_currency_exchange) / $gateway_currency_exchange, 2 );
                    $deposit->amount_net       = round( ( ($amount - $fee ) * $default_currency_exchange ) / $gateway_currency_exchange, 2 );
                    $deposit->currency         = $gateway_currency;
                    $deposit->exchange_rate    = $gateway_currency_exchange;
                    $deposit->status           = 'paid';
                    $deposit->ip_address       = $request->ip();
                    $deposit->save();

                    // Add funds to account
                    $this->addFunds(round( ( ($amount - $fee ) * $default_currency_exchange ) / $gateway_currency_exchange, 2 ));

                    // Success
                    return redirect('account/deposit/history')->with('success', __('messages.t_ur_transaction_has_completed'));

                } else {

                    // We couldn't process this payment
                    return redirect('account/deposit/history')->with('error', __('messages.t_we_could_not_handle_ur_deposit_payment'));

                }

            } else {

                // Not same hash key
                return redirect('account/deposit/history')->with('error', __('messages.t_we_could_not_handle_ur_deposit_payment'));

            }

        } catch (\Throwable $th) {
            
            // Something went wrong
            return redirect('account/deposit/history')->with('error', $th->getMessage());

        }
    }


    /**
     * Calculate fee
     *
     * @param mixed $amount
     * @return mixed
     */
    protected function calculateFee($amount)
    {
        try {
            
            // Get fee rate
            $fee_rate = settings('vnpay')->deposit_fee;

            // Calculate fee
            return $amount * $fee_rate / 100;

        } catch (\Throwable $th) {
            
            // Something went wrong
            return 0;

        }
    }


    /**
     * Add funds
     *
     * @param float $amount
     * @return void
     */
    protected function addFunds($amount)
    {
        try {
            
            // Get user
            $user                    = User::where('id', auth()->id())->first();

            // Add funds
            $user->balance_available = $user->balance_available + $amount;
            $user->save();

        } catch (\Throwable $th) {
            throw $th;
        }
    }

}