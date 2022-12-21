<?php

namespace App\Http\Livewire\Admin\Blog;

use App\Http\Validators\Admin\Blog\SettingsValidator;
use App\Models\BlogSettings;
use Livewire\Component;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class SettingsComponent extends Component
{
    use SEOToolsTrait;

    public $enable_blog;
    public $enable_comments;
    public $auto_approve_comments;


    /**
     * Init component
     *
     * @return void
     */
    public function mount()
    {
        // Get blog settings
        $settings = settings('blog');

        // Fill form
        $this->fill([
            'enable_blog'           => $settings->enable_blog,
            'enable_comments'       => $settings->enable_comments,
            'auto_approve_comments' => $settings->auto_approve_comments,
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
        $this->seo()->setTitle( setSeoTitle(__('messages.t_blog_settings'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.blog.settings')->extends('livewire.admin.layout.app')->section('content');
    }


    /**
     * Update blog settings
     *
     * @return void
     */
    public function update()
    {
        try {

            // Validate form
            SettingsValidator::validate($this);

            // Update blog settings
            BlogSettings::first()->update([
                'enable_blog'           => $this->enable_blog,
                'enable_comments'       => $this->enable_comments,
                'auto_approve_comments' => $this->auto_approve_comments
            ]);
            
            // Refresh cache
            settings('blog', true);

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
