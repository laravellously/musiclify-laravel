<?php

namespace App\Http\Livewire\Main\Auth;

use App\Http\Validators\Main\Auth\RegisterValidator;
use App\Models\Admin;
use App\Models\EmailVerification;
use App\Models\User;
use App\Notifications\Admin\PendingUser;
use App\Notifications\User\Everyone\VerifyEmail;
use App\Notifications\User\Everyone\Welcome;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class RegisterComponent extends Component
{
    use SEOToolsTrait;
    
    public $email;
    public $username;
    public $password;

    public $social_grid;

    /**
     * Initialize component
     *
     * @return void
     */
    public function mount()
    {
        // Set empty social grid counter
        $social_grid_counter = 0;

        // Get auth settings
        $settings_auth = settings('auth');

        // Check if facebook login enabled
        if ($settings_auth->is_facebook_login) {
            $social_grid_counter += 1;
        }

        // Check if twitter login enabled
        if ($settings_auth->is_twitter_login) {
            $social_grid_counter += 1;
        }

        // Check if google login enabled
        if ($settings_auth->is_google_login) {
            $social_grid_counter += 1;
        }

        // Check if github login enabled
        if ($settings_auth->is_github_login) {
            $social_grid_counter += 1;
        }

        // Check if linkedin login enabled
        if ($settings_auth->is_linkedin_login) {
            $social_grid_counter += 1;
        }

        // Set grid
        $this->social_grid = $social_grid_counter;

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
        $title       = __('messages.t_signup') . " $separator " . settings('general')->title;
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

        return view('livewire.main.auth.register')->extends('livewire.main.layout.app')->section('content');
    }


    /**
     * Register user
     *
     * @return void
     */
    public function register()
    {
        try {
            
            // Validate form
            RegisterValidator::validate($this);

            // Get auth settings
            $settings       = settings('auth');

            // Create new user
            $user           = new User();
            $user->uid      = uid();
            $user->email    = clean($this->email);
            $user->username = clean($this->username);
            $user->password = Hash::make($this->password);
            $user->status   = $settings->verification_required ? 'pending' : 'active';
            $user->level_id = 1;
            $user->save();

            // Check if user requires verification
            if ($settings->verification_required) {
                
                // Check if verification using email
                if ($settings->verification_type === 'email') {
                    
                    // Generate token
                    $token                    = uid(64);

                    // Generate verification
                    $verification             = new EmailVerification();
                    $verification->token      = $token;
                    $verification->email      = $this->email;
                    $verification->expires_at = now()->addMinutes( $settings->verification_expiry_period );
                    $verification->save();

                    // Send notification to user
                    $user->notify( (new VerifyEmail($verification))->locale(config('app.locale')) );

                    // Redirect to same page with success message
                    return redirect('auth/register')->with('success', __('messages.t_register_verification_email_sent', ['email' => $this->email, 'minutes' => $settings->verification_expiry_period]));

                } else if ($settings->verification_type === 'admin') {

                    // Send notification to admin
                    Admin::first()->notify( (new PendingUser($user))->locale(config('app.locale')) );

                    // Redirect to same page with success
                    return redirect('auth/register')->with('success', __('messages.t_register_verification_admin_pending'));

                }

            }

            // Send welcome message
            $user->notify(new Welcome);

            // Now login
            auth()->login($user, true);

            // Redirect to home
            return redirect('/');

        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
