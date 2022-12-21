<?php

namespace App\Http\Livewire\Admin\Pages\Options;

use App\Http\Validators\Admin\Pages\CreateValidator;
use App\Models\Page;
use Livewire\Component;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class CreateComponent extends Component
{
    use SEOToolsTrait;
    
    public $title;
    public $slug;
    public $content;
    public $is_link = false;
    public $link;
    public $column;

    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        // Seo
        $this->seo()->setTitle( setSeoTitle(__('messages.t_create_page'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.pages.options.create')->extends('livewire.admin.layout.app')->section('content');
    }


    /**
     * Create new page
     *
     * @return void
     */
    public function create()
    {
        try {

            // Validate form
            CreateValidator::validate($this);

            // Create new page
            $page          = new Page;
            $page->uid     = uid();
            $page->title   = $this->title;
            $page->slug    = $this->slug;
            $page->content = $this->content ? $this->content : null;
            $page->is_link = $this->is_link;
            $page->link    = $this->is_link ? $this->link : null;
            $page->column  = $this->column;
            $page->save();

            // Reset form
            $this->reset();

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
