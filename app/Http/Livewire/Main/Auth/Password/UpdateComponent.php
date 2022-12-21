<?php

namespace App\Http\Livewire\Main\Auth\Password;

use App\Http\Validators\Main\Auth\UpdatePasswordValidator;
use App\Models\PasswordReset;
use App\Models\User;
use App\Notifications\User\Everyone\PasswordChanged;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class UpdateComponent extends Component
{
    use SEOToolsTrait;
    
    public $password;
    public $password_confirmation;
    public $email;
    public $token;

    protected $queryString = ['email', 'token'];

    /**
     * Init component
     */
    public function mount()
    {
        // Verify token
        $verify = PasswordReset::where('email', $this->email)->where('token', $this->token)->first();

        // Check if token is valid
        if (!$verify) {
            return redirect('auth/login');
        }

        // Get expiry date
        $expiry_date = new Carbon($verify->expires_at);

        // Check if date expired
        if ($expiry_date->isPast()) {
            
            return redirect('auth/login')->with('error', __('messages.t_password_reset_link_expired'));

        }
    }

    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        // SEO
        $separator   = settings('general')->separator;
        $title       = __('messages.t_update_password') . " $separator " . settings('general')->title;
        $description = settings('seo')->description;
        $ogimage     = src( settings('seo')->ogimage );

        $this->seo()->setTitle( $title );
        $this->seo()->setDescription( $description );
        $this->seo()->setCanonical( url()->current() );
        $this->seo()->opengraph()->setTitle( $title );
        $this->seo()->opengraph()->setDescription( $description );
        $this->seo()->opengraph()->setUrl( url()->current() );
        $this->seo()->opengraph()->setType('website');
        $this->seo()->opengraph()->addImage( $ogimage );
        $this->seo()->twitter()->setImage( $ogimage );
        $this->seo()->twitter()->setUrl( url()->current() );
        $this->seo()->twitter()->setSite( "@" . settings('seo')->twitter_username );
        $this->seo()->twitter()->addValue('card', 'summary_large_image');
        $this->seo()->metatags()->addMeta('fb:page_id', settings('seo')->facebook_page_id, 'property');
        $this->seo()->metatags()->addMeta('fb:app_id', settings('seo')->facebook_app_id, 'property');
        $this->seo()->metatags()->addMeta('robots', 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1', 'name');
        $this->seo()->jsonLd()->setTitle( $title );
        $this->seo()->jsonLd()->setDescription( $description );
        $this->seo()->jsonLd()->setUrl( url()->current() );
        $this->seo()->jsonLd()->setType('WebSite');

        return view('livewire.main.auth.password.update')->extends('livewire.main.layout.app')->section('content');
    }


    /**
     * Update password
     *
     * @return void
     */
    public function update()
    {
        try {

            // We have to verify things again
            $verify = PasswordReset::where('email', $this->email)->where('token', $this->token)->first();

            // Check if token is valid
            if (!$verify) {
                return redirect('auth/login');
            }

            // Get expiry date
            $expiry_date = new Carbon($verify->expires_at);

            // Check if date expired
            if ($expiry_date->isPast()) {
                
                return redirect('auth/login')->with('error', __('messages.t_password_reset_link_expired'));

            }

            // Validate form
            UpdatePasswordValidator::validate($this);

            // Get user 
            $user = User::where('email', $this->email)->first();
            
            // Update user password
            $user->password = Hash::make($this->password);
            $user->save();

            // Delete token
            $verify->delete();

            // Send notification to user
            $user->notify( (new PasswordChanged)->locale(config('app.locale')) );

            // Success
            return redirect('auth/login')->with('success', __('messages.t_password_has_been_updated'));

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
