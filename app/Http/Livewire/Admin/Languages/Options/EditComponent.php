<?php

namespace App\Http\Livewire\Admin\Languages\Options;

use App\Http\Validators\Admin\Languages\EditValidator;
use App\Models\Language;
use Livewire\Component;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class EditComponent extends Component
{
    use SEOToolsTrait;
    
    public $country_code;
    public $name;
    public $is_active;
    public $force_rtl;
    public $language;

    /**
     * Init component
     *
     * @param integer $id
     * @return void
     */
    public function mount($id)
    {
        // Get language
        $language = Language::where('id', $id)->firstOrFail();

        // Fill form
        $this->fill([
            'country_code'  => $language->country_code,
            'name'          => $language->name,
            'is_active'     => $language->is_active ? 1 : 0,
            'force_rtl'     => $language->force_rtl ? 1 : 0
        ]);

        // Set language
        $this->language = $language;
    }

    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        // Seo
        $this->seo()->setTitle( setSeoTitle(__('messages.t_edit_language'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.languages.options.edit')->extends('livewire.admin.layout.app')->section('content');
    }


    /**
     * Update language
     *
     * @return void
     */
    public function update()
    {
        try {

            // Get language
            $language = Language::where('id', $this->language->id)->firstOrFail();

            // Validate form
            EditValidator::validate($this);

            // Update
            $language->name          = $this->name;
            $language->country_code  = $this->country_code;
            $language->is_active     = $this->is_active ? 1 : 0;
            $language->force_rtl     = $this->force_rtl ? 1 : 0;
            $language->save();

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
