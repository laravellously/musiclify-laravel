<?php

namespace App\Http\Livewire\Admin\Services;

use App\Http\Validators\Admin\Services\CloudinaryValidator;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use Livewire\Component;
use Config;

class CloudinaryComponent extends Component
{
    use SEOToolsTrait;
    
    public $cloud_url;
    public $upload_preset;

    /**
     * Initialize component
     *
     * @return void
     */
    public function mount()
    {
        // Fill form
        $this->fill([
            'cloud_url'     => config('cloudinary.cloud_url'),
            'upload_preset' => config('cloudinary.upload_preset')
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
        $this->seo()->setTitle( setSeoTitle(__('messages.t_cloudinary'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.services.cloudinary')->extends('livewire.admin.layout.app')->section('content');
    }


    /**
     * Update cloudinary settings
     *
     * @return void
     */
    public function update()
    {
        try {

            // Validate form
            CloudinaryValidator::validate($this);

            // Save settings
            Config::write('cloudinary.cloud_url', $this->cloud_url);
            Config::write('cloudinary.upload_preset', $this->upload_preset);

            // Update cache
            settings('cloudinary', true);

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
