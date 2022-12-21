<?php

namespace App\Http\Livewire\Admin\Conversations;

use App\Models\Conversation;
use App\Models\ConversationMessage;
use Livewire\WithPagination;
use Livewire\Component;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class MessagesComponent extends Component
{
    use WithPagination, SEOToolsTrait;

    public $conversation;

    /**
     * Inti component
     *
     * @param string $id
     * @return void
     */
    public function mount($id)
    {
        // Get conversation
        $conversation       = Conversation::where('uid', $id)->firstOrFail();

        // Set conversation
        $this->conversation = $conversation;
    }

    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        // Seo
        $this->seo()->setTitle( setSeoTitle(__('messages.t_conversation_messages'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.conversations.messages', [
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
        return ConversationMessage::where('conversation_id', $this->conversation->id)->latest()->paginate(42);
    }


    /**
     * Delete selected message
     *
     * @param integer $id
     * @return void
     */
    public function delete($id)
    {
        // Delete message
        ConversationMessage::where('id', $id)->where('conversation_id', $this->conversation->id)->delete();
    }
    
}
