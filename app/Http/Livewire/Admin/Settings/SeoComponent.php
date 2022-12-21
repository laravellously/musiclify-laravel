<?php

namespace App\Http\Livewire\Admin\Settings;

use App\Http\Validators\Admin\Settings\SeoValidator;
use App\Models\SettingsSeo;
use App\Utils\Uploader\ImageUploader;
use Livewire\Component;
use Livewire\WithFileUploads;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class SeoComponent extends Component
{
    use WithFileUploads, SEOToolsTrait;

    public $description;
    public $facebook_page_id;
    public $facebook_app_id;
    public $twitter_username;
    public $ogimage;
    public $is_sitemap;

    /**
     * Initialize component
     *
     * @return void
     */
    public function mount()
    {
        // Get settings
        $settings = settings('seo');

        // Fill default settings
        $this->fill([
            'description'      => $settings->description,
            'facebook_page_id' => $settings->facebook_page_id,
            'facebook_app_id'  => $settings->facebook_app_id,
            'twitter_username' => $settings->twitter_username,
            'is_sitemap'       => $settings->is_sitemap,
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
        $this->seo()->setTitle( setSeoTitle(__('messages.t_seo_settings'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.settings.seo')->extends('livewire.admin.layout.app')->section('content');
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
            SeoValidator::validate($this);

            // Get seo settings
            $settings = settings('seo');

            // Upload ogimage
            if ($this->ogimage) {
                $ogimage_id = ImageUploader::make($this->ogimage)
                                        ->folder('site/ogimage')
                                        ->deleteById($settings->ogimage_id)
                                        ->handle();
            } else {
                $ogimage_id = $settings->ogimage_id;
            }

            // Update settings
            $settings->description      = $this->description;
            $settings->facebook_page_id = $this->facebook_page_id;
            $settings->facebook_app_id  = $this->facebook_app_id;
            $settings->twitter_username = $this->twitter_username;
            if ($this->ogimage) {
                $settings->ogimage_id       = $ogimage_id;
            }
            $settings->is_sitemap       = $this->is_sitemap;
            $settings->save();

            // Refresh data from cache
            settings('seo', true);

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
