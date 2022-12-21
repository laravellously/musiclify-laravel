<?php

namespace App\Http\Livewire\Admin\Settings;

use App\Http\Validators\Admin\Settings\MediaValidator;
use App\Models\SettingsMedia;
use Livewire\Component;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class MediaComponent extends Component
{
    use SEOToolsTrait;
    
    public $requirements_file_max_size;
    public $requirements_file_allowed_extensions;
    public $delivered_work_max_size;
    public $portfolio_max_images;
    public $portfolio_max_size;

    /**
     * Initialize component
     *
     * @return void
     */
    public function mount()
    {
        // Get settings
        $settings = settings('media');

        // Fill default settings
        $this->fill([
            'requirements_file_max_size'           => $settings->requirements_file_max_size,
            'requirements_file_allowed_extensions' => $settings->requirements_file_allowed_extensions,
            'delivered_work_max_size'              => $settings->delivered_work_max_size,
            'portfolio_max_images'                 => $settings->portfolio_max_images,
            'portfolio_max_size'                   => $settings->portfolio_max_size
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
        $this->seo()->setTitle( setSeoTitle(__('messages.t_media_settings'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.settings.media')->extends('livewire.admin.layout.app')->section('content');
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
            MediaValidator::validate($this);

            // Update settings
            SettingsMedia::where('id', 1)->update([
                'requirements_file_max_size'           => $this->requirements_file_max_size,
                'requirements_file_allowed_extensions' => $this->requirements_file_allowed_extensions,
                'delivered_work_max_size'              => $this->delivered_work_max_size,
                'portfolio_max_images'                 => $this->portfolio_max_images,
                'portfolio_max_size'                   => $this->portfolio_max_size
            ]);

            // Refresh data from cache
            settings('media', true);

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
