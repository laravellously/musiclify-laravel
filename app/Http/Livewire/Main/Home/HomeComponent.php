<?php

namespace App\Http\Livewire\Main\Home;

use App\Mail\User\Everyone\NewsletterVerification as EveryoneNewsletterVerification;
use App\Models\Category;
use App\Models\NewsletterList;
use App\Models\NewsletterVerification;
use App\Models\User;
use Livewire\Component;
use Mail;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class HomeComponent extends Component
{

    use SEOToolsTrait;
    
    public $email;


    /**
     * Init component
     *
     * @return void
     */
    public function mount()
    {
        // Check if app installed
        if (!isInstalled()) {
            return redirect('install');
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
        $title       = settings('general')->title . " $separator " . settings('general')->subtitle;
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


        return view('livewire.main.home.home', [
            'categories' => $this->categories,
            'sellers'    => $this->sellers,
        ])->extends('livewire.main.layout.app')->section('content');
    }

    /**
     * Get categories in home page
     *
     * @return object
     */
    public function getCategoriesProperty()
    {
        return Category::where('is_visible', true)->inRandomOrder()->get();
    }


    /**
     * Get best sellers
     *
     * @return object
     */
    public function getSellersProperty()
    {
        // Check if bestsellers section enabled
        if (settings('appearance')->is_best_sellers) {
            
            // Get top sellers randomly
            return User::where('account_type', 'seller')
                        ->whereHas('sales')
                        ->whereIn('status', ['status', 'verified'])
                        ->withCount('sales')
                        ->orderBy('sales_count', 'desc')
                        ->take(12)
                        ->get();

        } else {

            // No need to make sql query
            return null;

        }
    }


    /**
     * Subscribe to our newsletter
     *
     * @return void
     */
    public function newsletter()
    {
        // Check if newsletter enabled
        if (!settings('newsletter')->is_enabled) {
            return;
        }

        // Validate email address
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {

            // Error
            $this->dispatchBrowserEvent('alert',[
                "message" => __('messages.t_pls_enter_valid_email_address'),
                "type"    => "error"
            ]);

            return;

        }

        // Get email in list
        $email = NewsletterList::where('email', $this->email)->first();

        // Check if email exists
        if ($email) {
            
            // Check if email already verified
            if ($email->status === 'verified') {
                
                // Reset form
                $this->reset('email');

                // Return
                return;

            } else {

                // Delete old verifications
                NewsletterVerification::where('list_id', $email->id)->delete();

                // Generate verification token
                $token                 = uid(60);

                // Generate verification
                $verification          = new NewsletterVerification();
                $verification->list_id = $email->id;
                $verification->token   = $token;
                $verification->save();

                // Send verification token
                Mail::to($this->email)->send(new EveryoneNewsletterVerification($token));

                // Reset form
                $this->reset('email');

                // Success
                $this->dispatchBrowserEvent('alert',[
                    "message" => __('messages.t_we_sent_verification_link_newsletter'),
                ]);

            }

        } else {

            // Add email to list
            $list                  = new NewsletterList();
            $list->uid             = uid();
            $list->email           = clean($this->email);
            $list->ip_address      = request()->ip();
            $list->save();

            // Email not found, generate verification token
            $token                 = uid(60);

            // Generate verification
            $verification          = new NewsletterVerification();
            $verification->list_id = $list->id;
            $verification->token   = $token;
            $verification->save();

            // Send verification token
            Mail::to($this->email)->send(new EveryoneNewsletterVerification($token));

            // Reset form
            $this->reset('email');

            // Success
            $this->dispatchBrowserEvent('alert',[
                "message" => __('messages.t_we_sent_verification_link_newsletter'),
            ]);

        }
    }
    
}
