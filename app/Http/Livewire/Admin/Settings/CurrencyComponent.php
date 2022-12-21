<?php

namespace App\Http\Livewire\Admin\Settings;

use App\Http\Validators\Admin\Settings\CurrencyValidator;
use App\Models\SettingsCurrency;
use Livewire\Component;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class CurrencyComponent extends Component
{
    use SEOToolsTrait;
    
    public $name;
    public $code;
    public $exchange_rate;

    /**
     * Initialize component
     *
     * @return void
     */
    public function mount()
    {
        // Get settings
        $settings = settings('currency');

        // Fill default settings
        $this->fill([
            'name'          => $settings->name,
            'code'          => $settings->code,
            'exchange_rate' => $settings->exchange_rate,
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
        $this->seo()->setTitle( setSeoTitle(__('messages.t_currency_settings'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.settings.currency', [
            'currencies' => config('money')
        ])->extends('livewire.admin.layout.app')->section('content');
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
            CurrencyValidator::validate($this);

            // Update settings
            SettingsCurrency::where('id', 1)->update([
                'name'          => $this->name,
                'code'          => $this->code,
                'exchange_rate' => $this->exchange_rate
            ]);

            // Refresh data from cache
            settings('currency', true);

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
