<?php

namespace App\Http\Livewire\Admin\Auth;

use App\Http\Validators\Admin\Auth\LoginValidator;
use App\Models\BannedIp;
use Lukeraymonddowning\Honey\Traits\WithRecaptcha;
use Lukeraymonddowning\Honey\Traits\WithHoney;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class LoginComponent extends Component
{

    use WithHoney, WithRecaptcha, SEOToolsTrait;
 
    protected $attempts = 2;
    protected $retry    = 20;

    public $email;
    public $password;
    public $message;

    public $attemptsLeft;
    public $retryAfter;

    /**
     * Initialize component
     *
     * @return void
     */
    public function mount()
    {
        // Redirect if login
        if (auth('admin')->check()) {
            return redirect(config('global.dashboard_prefix'));
        }

        // Set attempts left
        $this->attemptsLeft = RateLimiter::retriesLeft($this->throttleKey(), $this->attempts);

        // Set time left
        $this->retryAfter   = RateLimiter::availableIn($this->throttleKey(), $this->attempts);
    }


    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        // Seo
        $this->seo()->setTitle( setSeoTitle(__('messages.t_login'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.auth.login')->extends('livewire.admin.layout.default')->section('content');
    }


    /**
     * Login
     *
     * @return void
     */
    public function login()
    {
        try {

            // Check if ip address is banned
            $this->checkTooManyFailedAttempts();

            // Check if recaptcha enabled
            if (settings('security')->is_recaptcha) {
                
                // Check if recaptcha passed
                if (!$this->recaptchaPasses()) {
                    
                    // Error recaptcha
                    $this->message = __('messages.t_recaptcha_error_message');
                    
                    // Return
                    return;

                }

            }

            // Validate form
            LoginValidator::validate($this);

            // Get credentials
            $credentials = [
                'email'    => $this->email,
                'password' => $this->password
            ];
     
            if (Auth::guard('admin')->attempt($credentials, true)) {

                // Successfull login
                request()->session()->regenerate();

                // Clear failed attempts
                RateLimiter::clear($this->throttleKey());
     
                // Redirect to dashboard
                return redirect()->intended(config('global.dashboard_prefix'));

            }

            // Failed login, set failed attempt
            RateLimiter::hit($this->throttleKey(), $this->retry);
     
            // Invalid login data
            $this->message = __('messages.t_invalid_login_credentials_pls_try_again');

            // Return 
            return;

        } catch (\Illuminate\Validation\ValidationException $e) {

            // Validation error
            $this->dispatchBrowserEvent('alert',[
                "message" => __('messages.t_toast_form_validation_error'),
                "type"    => "error"
            ]);

            throw $e;

        } catch(\Lukeraymonddowning\Honey\Exceptions\RecaptchaFailedException $th) {

            // Error recaptcha
            $this->dispatchBrowserEvent('alert',[
                "message" => __('messages.t_recaptcha_error_message'),
                "type"    => "error"
            ]);

        } catch (\Throwable $th) {
            
            // Error
            $this->dispatchBrowserEvent('alert',[
                "message" => __('messages.t_toast_something_went_wrong'),
                "type"    => "error"
            ]);

            throw $th;
            
        }
    }


    /**
     * Get the rate limiting throttle key for the request.
     *
     * @return string
     */
    public function throttleKey()
    {
        // Set ip address
        $ip = str_replace('.', '_', request()->ip());

        // Return key
        return "login_ip_address_banned_$ip";
    }
    

    /**
     * Ensure the login request is not rate limited.
     * 5 failed attempt
     * @return void
     */
    public function checkTooManyFailedAttempts()
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), $this->attempts)) {
            return;
        }

        // User reach limit attempts, ban his ip address
        BannedIp::updateOrCreate(['ip_address' => request()->ip()])->increment('attempts');
        
        // Redirect to home page
        return redirect('/');
    }

}
