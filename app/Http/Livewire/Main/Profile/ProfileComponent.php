<?php

namespace App\Http\Livewire\Main\Profile;

use App\Http\Validators\Main\Profile\ReportValidator;
use App\Models\Admin;
use App\Models\Gig;
use App\Models\OrderItem;
use App\Models\ReportedUser;
use App\Models\User;
use App\Notifications\Admin\ProfileReported;
use Livewire\Component;
use Livewire\WithPagination;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class ProfileComponent extends Component
{

    use WithPagination, SEOToolsTrait;

    public $user;
    public $reason;
    public $last_delivery;

    /**
     * Init component
     *
     * @return void
     */
    public function mount($username)
    {
        // Get user
        $user                = User::where('username', $username)->whereIn('status', ['verified', 'active'])->firstOrFail();

        // Set user
        $this->user          = $user;

        // Set last delivery date
        $this->last_delivery = $this->getLastDelivery();
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
        $title       = $this->user->username . " $separator " . settings('general')->title;
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

        return view('livewire.main.profile.profile', [
            'gigs' => $this->gigs
        ])->extends('livewire.main.layout.app')->section('content');
    }


    /**
     * Get user gigs
     *
     * @return object
     */
    public function getGigsProperty()
    {
        return Gig::where('user_id', $this->user->id)
                  ->active()
                  ->orderByRaw('RAND()')
                  ->paginate(42);
    }


    /**
     * Report this profile
     *
     * @return void
     */
    public function report()
    {
        try {

            // User must be online
            if (auth()->guest()) {
                
                // Error
                $this->dispatchBrowserEvent('alert',[
                    "message" => __('messages.t_u_must_login_to_report_this_profile'),
                    "type"    => "info"
                ]);

                return;

            }

            // Can't report your own profile
            if (auth()->id() === $this->user->id) {
                return;
            }

            // Validate form
            ReportValidator::validate($this);

            // Report profile
            $report = ReportedUser::updateOrCreate(
                ['reporter_id' => auth()->id(), 'reported_id' => $this->user->id],
                [
                    'ip_address' => request()->ip(),
                    'reason'     => clean($this->reason),
                    'seen'       => false
                ]
            );

            // Send notification to admin
            Admin::first()->notify( (new ProfileReported($this->user))->locale(config('app.locale')) );

            // Reset reason
            $this->reset('reason');

            // Close modal
            $this->dispatchBrowserEvent('close-modal', 'modal-report-container');

            // Success
            $this->dispatchBrowserEvent('alert',[
                "message" => __('messages.t_profile_has_been_successfully_reported'),
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
     * Get last delivered item
     *
     * @return mixed
     */
    public function getLastDelivery()
    {
        // Get last delivery item
        $item = OrderItem::where('owner_id', $this->user->id)->where('status', 'delivered')->latest()->first();

        // Check if user has item
        if ($item) {
            return $item->delivered_at;
        }

        // No item found
        return null;
    }
    
}