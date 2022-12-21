<?php

namespace App\Http\Livewire\Admin\Subcategories\Options;

use App\Http\Validators\Admin\Subcategories\CreateValidator;
use App\Utils\Uploader\ImageUploader;
use Livewire\WithFileUploads;
use App\Models\Subcategory;
use App\Models\Category;
use Livewire\Component;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class CreateComponent extends Component
{

    use WithFileUploads, SEOToolsTrait;

    public $name;
    public $slug;
    public $description;
    public $icon;
    public $image;
    public $parent_id;

    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        // Seo
        $this->seo()->setTitle( setSeoTitle(__('messages.t_create_subcategory'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.subcategories.options.create', [
            'categories' => $this->categories
        ])->extends('livewire.admin.layout.app')->section('content');
    }


    /**
     * Get all parent categories
     *
     * @return object
     */
    public function getCategoriesProperty()
    {
        return Category::orderBy('name')->get();
    }


    /**
     * Create new subcategory
     *
     * @return void
     */
    public function create()
    {
        try {

            // Validate form
            CreateValidator::validate($this);

            // Upload categorory icon
            if ($this->icon) {
                $icon_id = ImageUploader::make($this->icon)->resize(100, 100)->folder('subcategories')->handle();
            } else {
                $icon_id = null;
            }

            // Upload subcategory image
            if ($this->image) {
                $image_id = ImageUploader::make($this->image)->resize(800)->folder('subcategories')->handle();
            } else {
                $image_id = null;
            }

            // Save subcategory
            $subcategory              = new Subcategory();
            $subcategory->uid         = uid();
            $subcategory->name        = $this->name;
            $subcategory->slug        = $this->slug;
            $subcategory->description = $this->description ? $this->description : null;
            $subcategory->icon_id     = $icon_id;
            $subcategory->image_id    = $image_id;
            $subcategory->parent_id  = $this->parent_id;
            $subcategory->save();

            // Reset form
            $this->resetExcept('parent_id');

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
