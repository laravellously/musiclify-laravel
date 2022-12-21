<?php

namespace App\Http\Livewire\Admin\Blog\Comments\Options;

use App\Http\Validators\Admin\Blog\CommentValidator;
use App\Models\ArticleComment;
use Livewire\Component;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class EditComponent extends Component
{
    use SEOToolsTrait;

    public $comment_content;
    public $comment;


    /**
     * Init component
     *
     * @param string $id
     * @return void
     */
    public function mount($id)
    {
        // Get comment
        $comment = ArticleComment::where('uid', $id)->firstOrFail();

        // Fill form
        $this->fill([
            'comment_content' => $comment->comment
        ]);

        // Set comment
        $this->comment = $comment;
    }


    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        // Seo
        $this->seo()->setTitle( setSeoTitle(__('messages.t_edit_comment'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.blog.comments.options.edit')->extends('livewire.admin.layout.app')->section('content');
    }


    /**
     * Update comment
     *
     * @return void
     */
    public function update()
    {
        try {

            // Validate form
            CommentValidator::validate($this);

            // Update comment
            $this->comment->comment = $this->comment_content;
            $this->comment->save();

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
