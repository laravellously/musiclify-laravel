<?php
 
namespace App\Http\Controllers\Main\Account\Deposit;
 
use App\Http\Controllers\Controller;
use App\Models\DepositTransaction;
use Illuminate\Http\Request;
use App\Models\User;

class MollieController extends Controller
{
   
    /**
     * Mollie redirect
     *
     * @param Request $request
     * @return void
     */
    public function redirect(Request $request)
    {
        try {
            
            // Get transaction id
            $transaction_id = clean($request->get('t'));

            // Get amount
            $amount         = clean(decrypt($request->get('a')));

            // Amount must be a valid number
            if (is_numeric($amount) && (float)$amount > 0) {
                
                // Get default currency exchange rate
                $default_currency_exchange = settings('currency')->exchange_rate;

                // Get payment gateway exchange rate
                $gateway_currency_exchange = settings('mollie')->exchange_rate;

                // Get gateway default currency
                $gateway_currency          = settings('mollie')->currency;

                // Set provider name
                $provider_name             = 'mollie';

                // Calculate fee
                $fee                       = $this->calculateFee($amount);

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
                $deposit->status           = 'pending';
                $deposit->ip_address       = $request->ip();
                $deposit->save();

                // Success
                return redirect('account/deposit/history')->with('warning', __('messages.t_mollie_payment_pending'));

            } else {

                // Invalid amount
                return redirect('account/deposit/history')->with('error', __('messages.t_mollie_received_amount_invalid'));

            }

        } catch (\Throwable $th) {
            
            // Something went wrong
            return redirect('account/deposit/history')->with('error', $th->getMessage());

        }
    }


    /**
     * Mollie webhook
     *
     * @param Request $request
     * @return void
     */
    public function webhook(Request $request)
    {
        try {

            // Get transaction id
            $transaction_id = clean($request->get('t'));

            // Get transaction
            $transaction   = DepositTransaction::where('transaction_id', $transaction_id)->where('payment_method', 'mollie')->firstOrFail();

            // Get amount
            $amount         = clean(decrypt($request->get('a')));

            // Get payment id
            $payment_id     = $request->get('id');

            // Amount must be a valid number
            if (is_numeric($amount) && (float)$amount > 0) {
                
                // Set mollie client
                $mollie     = new \Mollie\Api\MollieApiClient();

                // Set api key
                $mollie->setApiKey(config('mollie.key'));

                // Get payment
                $payment    = $mollie->payments->get($payment_id);

                // Check if payment paid
                if ($payment->isPaid()) {

                    // Get default currency exchange rate
                    $default_currency_exchange   = settings('currency')->exchange_rate;

                    // Get payment gateway exchange rate
                    $gateway_currency_exchange   = settings('mollie')->exchange_rate;

                    // Get amount value
                    $amount_value                = $payment->amount->value;

                    // Caluclate fee
                    $fee                         = $this->calculateFee($amount_value);

                    // Update transaction
                    $transaction->status         = 'paid';
                    $transaction->transaction_id = $payment_id;
                    $transaction->amount_total   = round( ($amount_value * $default_currency_exchange) / $gateway_currency_exchange, 2 );
                    $transaction->amount_fee     = round( ($fee * $default_currency_exchange) / $gateway_currency_exchange, 2 );
                    $transaction->amount_net     = round( ( ( $amount_value - $fee ) * $default_currency_exchange ) / $gateway_currency_exchange, 2 );
                    $transaction->save();

                    // Add funds
                    $this->addFunds($amount_value - $fee, $transaction->user_id);

                    // Success
                    return redirect('account/deposit/history')->with('success', __('messages.t_ur_transaction_has_completed'));

                } else {

                    // Payment failed
                    $transaction->status        = 'rejected';
                    $transaction->reject_reason = __('messages.t_mollie_payment_rejected');
                    $transaction->save();

                    // Error
                    return redirect('account/deposit/history')->with('success', __('messages.t_mollie_payment_rejected'));

                }

            } else {

                // Payment failed
                $transaction->status        = 'rejected';
                $transaction->reject_reason = __('messages.t_mollie_received_amount_invalid');
                $transaction->save();

                // Invalid amount
                return redirect('account/deposit/history')->with('error', __('messages.t_mollie_received_amount_invalid'));                

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
            $fee_rate = settings('mollie')->deposit_fee;

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
    protected function addFunds($amount, $user_id)
    {
        try {
            
            // Get user
            $user                    = User::where('id', $user_id)->first();

            // Add funds
            $user->balance_available = $user->balance_available + $amount;
            $user->save();

        } catch (\Throwable $th) {
            throw $th;
        }
    }

}