<?php

namespace App\Http\Livewire\Admin\Support;

use App\Http\Validators\Admin\Support\ReplyValidator;
use App\Mail\Admin\Support\Reply;
use App\Models\SupportMessage;
use Illuminate\Support\Facades\Mail;
use Livewire\WithPagination;
use Livewire\Component;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class SupportComponent extends Component
{
    use WithPagination, SEOToolsTrait;

    public $message;

    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        // Seo
        $this->seo()->setTitle( setSeoTitle(__('messages.t_support'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.support.support', [
            'messages' => $this->messages
        ])->extends('livewire.admin.layout.app')->section('content');
    }


    /**
     * Get list of messages
     *
     * @return object
     */
    public function getMessagesProperty()
    {
        return SupportMessage::latest()->paginate(42);
    }


    /**
     * Read message
     *
     * @param integer $id
     * @return void
     */
    public function read($id)
    {
        // Get message
        $message = SupportMessage::where('id', $id)->firstOrFail();

        // Mark as read
        $message->is_seen = true;
        $message->save();

        // Return message
        $this->dispatchBrowserEvent('support-messages-read-response', nl2br(clean($message->message)));

        // Open dialog
        $this->dispatchBrowserEvent('open-modal', 'read-message');
    }


    /**
     * Reply message
     *
     * @param integer $id
     * @return void
     */
    public function reply($id)
    {
        try {

            // Get message
            $message = SupportMessage::where('id', $id)->firstOrFail();

            // Validate form
            ReplyValidator::validate($this);

            // Send message to this email address
            Mail::to($message->email)->send(new Reply($this->message, $message));

            // Mark message as replied
            $message->is_seen    = true;
            $message->is_replied = true;
            $message->save();

            // Reset form
            $this->reset('message');

            // Success
            $this->dispatchBrowserEvent('alert',[
                "message" => __('messages.t_message_reply_sent_successfully'),
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


    /**
     * Delete message
     *
     * @param integer $id
     * @return void
     */
    public function delete($id)
    {
        // Delete
        SupportMessage::where('id', $id)->delete();

        // Success
        $this->dispatchBrowserEvent('alert',[
            "message" => __('messages.t_message_has_been_deleted')
        ]);
    }
    
}
