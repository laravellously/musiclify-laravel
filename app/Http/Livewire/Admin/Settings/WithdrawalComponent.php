<?php

namespace App\Http\Livewire\Admin\Settings;

use App\Http\Validators\Admin\Settings\WithdrawalValidator;
use App\Models\SettingsWithdrawal;
use Livewire\Component;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class WithdrawalComponent extends Component
{
    use SEOToolsTrait;
    
    public $min_withdrawal_amount;
    public $withdrawal_period;

    /**
     * Initialize component
     *
     * @return void
     */
    public function mount()
    {
        // Get settings
        $settings = settings('withdrawal');

        // Fill default settings
        $this->fill([
            'min_withdrawal_amount' => $settings->min_withdrawal_amount,
            'withdrawal_period'     => $settings->withdrawal_period
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
        $this->seo()->setTitle( setSeoTitle(__('messages.t_withdrawal_settings'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.settings.withdrawal')->extends('livewire.admin.layout.app')->section('content');
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
            WithdrawalValidator::validate($this);

            // Update settings
            SettingsWithdrawal::where('id', 1)->update([
                'min_withdrawal_amount' => $this->min_withdrawal_amount,
                'withdrawal_period'     => $this->withdrawal_period
            ]);

            // Refresh data from cache
            settings('withdrawal', true);

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
