<?php

namespace App\Http\Livewire\Main\Messages;

use App\Models\Conversation;
use App\Models\User;
use Livewire\Component;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class NewComponent extends Component
{
    use SEOToolsTrait;
    
    /**
     * Init component
     *
     * @param string $username
     * @return void
     */
    public function mount($username)
    {
        // Get user
        $user = User::where('username', $username)
                    ->whereIn('status', ['active', 'verified'])
                    ->where('id', '!=', auth()->id())
                    ->first();

        // Check if user exists
        if (!$user) {
            return redirect('/');
        }

        // Check if there a conversation between these users before
        $conversation = Conversation::where(function($builder) use($user) {
                                        return $builder->where(function($query) use($user) {
                                            return $query->where('from_id', auth()->id())->orWhere('from_id', $user->id);
                                        })->where(function($query) use($user) {
                                            return $query->where('to_id', auth()->id())->orWhere('to_id', $user->id);
                                        });
                                    })->first();

        // Check if exists
        if (!$conversation) {
            
            // Create new conversation
            $conversation = Conversation::create([
                'uid'     => uid(),
                'from_id' => auth()->id(),
                'to_id'   => $user->id
            ]);

        }

        // Set redirect url
        $url = "messages/$conversation->uid";

        // Redirect to conversation
        return redirect($url);

    }
    
}