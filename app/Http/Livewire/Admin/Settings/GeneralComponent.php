<?php

namespace App\Http\Livewire\Admin\Settings;

use App\Http\Validators\Admin\Settings\GeneralValidator;
use App\Models\Language;
use App\Models\SettingsGeneral;
use App\Utils\Uploader\ImageUploader;
use Livewire\Component;
use Livewire\WithFileUploads;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use Illuminate\Support\Facades\Config;

class GeneralComponent extends Component
{
    use WithFileUploads, SEOToolsTrait;

    public $title;
    public $subtitle;
    public $separator;
    public $logo;
    public $logo_dark;
    public $favicon;
    public $announce_link;
    public $announce_text;
    public $is_language_switcher;
    public $default_language;

    /**
     * Initialize component
     *
     * @return void
     */
    public function mount()
    {
        // Get settings
        $settings = settings('general');

        // Fill default settings
        $this->fill([
            'title'                => $settings->title,
            'subtitle'             => $settings->subtitle,
            'separator'            => $settings->separator,
            'announce_link'        => $settings->header_announce_link,
            'announce_text'        => $settings->header_announce_text,
            'is_language_switcher' => $settings->is_language_switcher,
            'default_language'     => $settings->default_language
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
        $this->seo()->setTitle( setSeoTitle(__('messages.t_general_settings'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.settings.general', [
            'languages' => $this->languages
        ])->extends('livewire.admin.layout.app')->section('content');
    }


    /**
     * Get available languages
     *
     * @return object
     */
    public function getLanguagesProperty()
    {
        return Language::where('is_active', true)->orderBy('name', 'desc')->get();
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
            GeneralValidator::validate($this);

            // Get old settings
            $settings = settings('general');

            // Check if request has logo
            if ($this->logo) {
                $logo_id = ImageUploader::make($this->logo)
                                        ->folder('site/logo')
                                        ->deleteById($settings->logo_id)
                                        ->handle();
            } else {
                $logo_id = $settings->logo_id;
            }

            // Check if request has logo dark
            if ($this->logo_dark) {
                $logo_dark_id = ImageUploader::make($this->logo_dark)
                                        ->folder('site/logo')
                                        ->deleteById($settings->logo_dark__id)
                                        ->handle();
            } else {
                $logo_dark_id = $settings->logo_dark_id;
            }

            // Check if request has favicon
            if ($this->favicon) {
                $favicon_id = ImageUploader::make($this->favicon)
                                        ->folder('site/favicon')
                                        ->deleteById($settings->favicon_id)
                                        ->handle();
            } else {
                $favicon_id = $settings->favicon_id;
            }

            // Update settings
            SettingsGeneral::where('id', 1)->update([
                'title'                => $this->title,
                'subtitle'             => $this->subtitle,
                'separator'            => $this->separator,
                'logo_id'              => $logo_id,
                'logo_dark_id'         => $logo_dark_id,
                'favicon_id'           => $favicon_id,
                'header_announce_text' => $this->announce_text ? $this->announce_text : null,
                'header_announce_link' => $this->announce_link ? $this->announce_link : null,
                'is_language_switcher' => $this->is_language_switcher,
                'default_language'     => $this->default_language,
            ]);

            // Set app name
            Config::write('app.name', $this->title);
            Config::write('app.url', url('/'));
            Config::write('app.locale', $this->default_language);
            Config::write('app.fallback_locale', $this->default_language);

            // Refresh data from cache
            settings('general', true);

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
