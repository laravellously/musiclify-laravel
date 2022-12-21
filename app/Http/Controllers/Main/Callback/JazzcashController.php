<?php
 
namespace App\Http\Controllers\Main\Callback;
 
use App\Http\Controllers\Controller;
use App\Models\DepositTransaction;
use Illuminate\Http\Request;
use App\Models\User;

class JazzcashController extends Controller
{
   
    /**
     * JazzCash callback
     *
     * @param Request $request
     * @return void
     */
    public function callback(Request $request)
    {
        try {

            // Get session saved key
            $callback_type = session('jazzcash_callback', null);

            // Check if there is a saved key
            if ($callback_type) {

                // Reset session same key
                config()->set('session.same_site', 'lax');

                // Check deposit callback
                if ($callback_type === 'deposit') {
                    
                    // Handle deposit payment
                    $this->deposit($request);

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
     * Handle deposit callback
     *
     * @return mixed
     */
    protected function deposit($request)
    {
        try {
        
            // Get response
            $jazzcash = \AKCybex\JazzCash\Facades\JazzCash::response();

            // Check if payment succeeded
            if ($jazzcash->code() == 000) {

                // Get order details
                $payment                   = $jazzcash->order();
                
                // Get default currency exchange rate
                $default_currency_exchange = settings('currency')->exchange_rate;

                // Get payment gateway exchange rate
                $gateway_currency_exchange = settings('jazzcash')->exchange_rate;

                // Get gateway default currency
                $gateway_currency          = settings('jazzcash')->currency;

                // Set provider name
                $provider_name             = 'jazzcash';

                // Get paid amount
                $amount                    = $payment['pp_Amount'];

                // Calculate fee
                $fee                       = $this->calculateFee($amount);

                // Set transaction id
                $transaction_id            = $payment['pp_TxnRefNo'];

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

                // Error
                return redirect('account/deposit/history')->with('error', $jazzcash->message());
                
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
            $fee_rate = settings('jazzcash')->deposit_fee;

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