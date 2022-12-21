<?php

namespace App\Http\Livewire\Admin\Services;

use App\Http\Validators\Admin\Services\RecaptchaValidator;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Config;
use Livewire\Component;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class RecaptchaComponent extends Component
{
    use SEOToolsTrait;
    
    public $site_key;
    public $secret_key;

    /**
     * Initialize component
     *
     * @return void
     */
    public function mount()
    {
        // Fill default settings
        $this->fill([
            'site_key'   => config('honey.recaptcha.site_key'),
            'secret_key' => config('honey.recaptcha.secret_key')
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
        $this->seo()->setTitle( setSeoTitle(__('messages.t_recaptcha'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.services.recaptcha')->extends('livewire.admin.layout.app')->section('content');
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
            RecaptchaValidator::validate($this);

            // Update currency
            Config::write('honey.recaptcha.site_key', $this->site_key);
            Config::write('honey.recaptcha.secret_key', $this->secret_key);

            // Clear config
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
    
}
