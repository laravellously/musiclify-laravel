<?php

namespace App\Http\Livewire\Admin\Settings;

use App\Http\Validators\Admin\Settings\AppearanceValidator;
use App\Models\SettingsAppearance;
use Livewire\Component;
use Livewire\WithFileUploads;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class AppearanceComponent extends Component
{
    use WithFileUploads, SEOToolsTrait;

    public $primary_color;
    public $is_dark_mode;
    public $font_link;
    public $font_family;
    public $logo_desktop_height;
    public $is_sliders;
    public $is_featured_categories;
    public $is_best_sellers;

    /**
     * Initialize component
     *
     * @return void
     */
    public function mount()
    {
        // Get settings
        $settings = settings('appearance');

        // Fill default settings
        $this->fill([
            'primary_color'          => $settings->colors['primary'],
            'logo_desktop_height'    => $settings->sizes['header_desktop_logo_height'],
            'is_dark_mode'           => $settings->is_dark_mode ? 1 : 0,
            'is_sliders'             => $settings->is_sliders ? 1 : 0,
            'is_featured_categories' => $settings->is_featured_categories ? 1 : 0,
            'is_best_sellers'        => $settings->is_best_sellers ? 1 : 0,
            'font_link'              => $settings->font_link,
            'font_family'            => $settings->font_family,
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
        $this->seo()->setTitle( setSeoTitle(__('messages.t_appearance_settings'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.settings.appearance')->extends('livewire.admin.layout.app')->section('content');
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
            AppearanceValidator::validate($this);
            
            // Set colors
            $colors = [
                'primary' => $this->primary_color
            ];

            // Set sizes
            $sizes = [
                'header_desktop_logo_height' => $this->logo_desktop_height
            ];

            // Update settings
            SettingsAppearance::first()->update([
                'colors'                 => $colors,
                'sizes'                  => $sizes,
                'is_dark_mode'           => $this->is_dark_mode ? 1 : 0,
                'is_sliders'             => $this->is_sliders ? 1 : 0,
                'is_featured_categories' => $this->is_featured_categories ? 1 : 0,
                'is_best_sellers'        => $this->is_best_sellers ? 1 : 0,
                'font_link'              => $this->font_link,
                'font_family'            => $this->font_family,
            ]);

            // Update cache
            settings('appearance', true);

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
