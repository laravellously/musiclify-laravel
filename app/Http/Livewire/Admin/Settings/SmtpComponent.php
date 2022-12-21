<?php

namespace App\Http\Livewire\Admin\Settings;

use App\Http\Validators\Admin\Settings\SmtpValidator;
use App\Mail\Admin\Settings\TrySmtp;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class SmtpComponent extends Component
{
    use SEOToolsTrait;
    
    public $host;
    public $port;
    public $encryption;
    public $username;
    public $password;
    public $from_address;
    public $from_name;

    public $email;

    /**
     * Initialize component
     *
     * @return void
     */
    public function mount()
    {
        // Fill default settings
        $this->fill([
            'host'         => config('mail.mailers.smtp.host'),
            'port'         => config('mail.mailers.smtp.port'),
            'encryption'   => config('mail.mailers.smtp.encryption'),
            'username'     => config('mail.mailers.smtp.username'),
            'from_address' => config('mail.from.address'),
            'from_name'    => config('mail.from.name'),
            'email'        => auth('admin')->user()->email
        ]);
    }


    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        // Seo
        $this->seo()->setTitle( setSeoTitle(__('messages.t_smtp_settings'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.settings.smtp')->extends('livewire.admin.layout.app')->section('content');
    }


    /**
     * Update settings
     *
     * @return void
     */
    public function update()
    {
        try {

            // Validate form
            SmtpValidator::validate($this);

            // Update settings
            Config::write('mail.mailers.smtp.host', $this->host);
            Config::write('mail.mailers.smtp.port', $this->port);
            Config::write('mail.mailers.smtp.encryption', $this->encryption);
            Config::write('mail.mailers.smtp.username', $this->username);
            Config::write('mail.from.address', $this->from_address);
            Config::write('mail.from.name', $this->from_name);

            // Update smtp password
            if ($this->password) {
                Config::write('mail.mailers.smtp.password', $this->password);
            }

            // Clear cache
            Artisan::call('config:clear');

            // Success
            $this->dispatchBrowserEvent('alert',[
                "message" => __('messages.t_toast_operation_success'),
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {

            // Validation error
            $this->dispatchBrowserEvent('alert',[
                "message" => __('messages.t_toast_form_validation_error'),
                "type"    => "error"
            ]);

            throw $e;

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
     * Send a test email
     *
     * @return void
     */
    public function send()
    {
        // check if insert email address
        if (!$this->email) {
            return;
        }

        // Send a test email address
        Mail::to($this->email)->send(new TrySmtp);

        // Success
        $this->dispatchBrowserEvent('alert',[
            "message" => __('messages.t_smtp_email_test_sent_success'),
        ]);
    }
    
}
