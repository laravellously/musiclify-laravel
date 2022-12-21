<?php

namespace App\Http\Livewire\Admin\Languages\Options;

use App\Http\Validators\Admin\Languages\CreateValidator;
use App\Models\Language;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class CreateComponent extends Component
{
    use SEOToolsTrait;
    
    public $language_code;
    public $country_code;
    public $name;
    public $is_active = true;
    public $force_rtl = false;

    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        // Seo
        $this->seo()->setTitle( setSeoTitle(__('messages.t_create_language'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.languages.options.create')->extends('livewire.admin.layout.app')->section('content');
    }


    /**
     * Create new language
     *
     * @return void
     */
    public function create()
    {
        try {

            // Validate form
            CreateValidator::validate($this);

            // Create new folder
            File::makeDirectory(lang_path($this->language_code));

            // Copy translation file to new folder
            File::copy(lang_path('en/messages.php'), lang_path($this->language_code . "/messages.php"));

            // Create new language
            $language                = new Language();
            $language->language_code = strtolower($this->language_code);
            $language->country_code  = strtolower($this->country_code);
            $language->name          = $this->name;
            $language->is_active     = $this->is_active;
            $language->force_rtl     = $this->force_rtl;
            $language->save();

            // Reset form
            $this->reset();

            // Refresh supported langs
            supported_languages(true);

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
