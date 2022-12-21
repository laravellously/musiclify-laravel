<?php
 
namespace App\Http\Controllers\Main\Callback;
 
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use App\Models\DepositTransaction;
use Illuminate\Http\Request;
use App\Models\User;

class PaymobController extends Controller
{
   
    /**
     * Paytabs deposit callback
     *
     * @param Request $request
     * @return void
     */
    public function deposit(Request $request)
    {
        try {

            // Get session saved key
            $callback_type = session('paymob_callback', null);

            // Check if there is a saved key
            if ($callback_type) {
                
                // Get transaction id
                $transaction_id = $request->get('id');

                // Check deposit callback
                if ($callback_type === 'deposit') {
                    
                    // Handle deposit payment
                    $this->deposit($transaction_id);

                } else if ($callback_type === 'checkout') {
                    
                    // Handle checkout callback


                } else {

                    // Not valid
                    return redirect('/');

                }

            } else {

                // No saved key
                return redirect('/');

            }

        } catch (\Throwable $th) {
            
            // Something went wrong
            return redirect('account/deposit/history')->with('error', $th->getMessage());

        }
    }


    /**
     * Paytabs checkout callback
     *
     * @return mixed
     */
    public function checkout($id)
    {
        try {
            
            // Get auth token
            $auth    = Http::acceptJson()->post('https://accept.paymob.com/api/auth/tokens', [
                                'api_key' => config('paymob.api_key'),
                            ])->json();

            // Get payment details
            $payment = Http::withToken($auth['token'])
                            ->get("https://accept.paymob.com/api/acceptance/transactions/$id")
                            ->json();

            // Check payment status
            if (is_array($payment) && isset($payment['success']) && $payment['success'] && $payment['is_captured']) {
                
                // Get default currency exchange rate
                $default_currency_exchange = settings('currency')->exchange_rate;

                // Get payment gateway exchange rate
                $gateway_currency_exchange = settings('paymob')->exchange_rate;

                // Get gateway default currency
                $gateway_currency          = settings('paymob')->currency;

                // Set provider name
                $provider_name             = 'paymob';

                // Get paid amount
                $amount                    = $payment['amount_cents'];

                // Calculate fee
                $fee                       = $this->calculateFee($amount);

                // Set transaction id
                $transaction_id            = $id;

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
                $deposit->ip_address       = request()->ip();
                $deposit->save();

                // Add funds to account
                $this->addFunds(round( ( ($amount - $fee ) * $default_currency_exchange ) / $gateway_currency_exchange, 2 ));

                // Success
                return redirect('account/deposit/history')->with('success', __('messages.t_ur_transaction_has_completed'));


            } else {

                // Failed payment
                return redirect('account/deposit/history')->with('error', __('messages.t_we_could_not_handle_ur_deposit_payment'));

            }


        } catch (\Throwable $th) {
            
            // Error
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
            $fee_rate = settings('paymob')->deposit_fee;

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