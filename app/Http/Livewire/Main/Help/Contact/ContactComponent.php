<?php

namespace App\Http\Livewire\Main\Help\Contact;

use App\Http\Validators\Main\Help\ContactValidator;
use App\Models\Admin;
use App\Models\SupportMessage;
use App\Notifications\Admin\PendingMessage;
use Lukeraymonddowning\Honey\Traits\WithHoney;
use Lukeraymonddowning\Honey\Traits\WithRecaptcha;
use Livewire\Component;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use Lukeraymonddowning\Honey\Exceptions\RecaptchaFailedException;

class ContactComponent extends Component
{

    use WithHoney, WithRecaptcha, SEOToolsTrait;

    public $name;
    public $email;
    public $subject;
    public $message;

    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        // SEO
        $separator   = settings('general')->separator;
        $title       = __('messages.t_contact_us') . " $separator " . settings('general')->title;
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

        return view('livewire.main.help.contact.contact')->extends('livewire.main.layout.app')->section('content');
    }

    
    /**
     * Contact us
     *
     * @return void
     */
    public function contact()
    {
        try {

            // Check if recaptcha enabled
            if (settings('security')->is_recaptcha) {
                
                // Check if recaptcha passed
                if (!$this->recaptchaPasses()) {
                    
                    // Error recaptcha
                    $this->dispatchBrowserEvent('alert',[
                        "message" => __('messages.t_recaptcha_error_message'),
                        "type"    => "error"
                    ]);

                    return;

                }

            }

            // Validate request
            ContactValidator::validate($this);

            // Send message
            $message             = new SupportMessage();
            $message->ip_address = request()->ip();
            $message->user_agent = request()->header('user-agent');
            $message->name       = clean($this->name);
            $message->email      = clean($this->email);
            $message->subject    = clean($this->subject);
            $message->message    = clean($this->message);
            $message->save();
            
            // Send notification to this email

            // Send notification to admin
            Admin::first()->notify( (new PendingMessage($message))->locale(config('app.locale')) );

            // Reset form
            $this->reset();

            // Success
            $this->dispatchBrowserEvent('alert',[
                "message" => __('messages.t_your_message_support_received_success'),
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {

            // Validation error
            $this->dispatchBrowserEvent('alert',[
                "message" => __('messages.t_toast_form_validation_error'),
                "type"    => "error"
            ]);

            throw $e;

        } catch(RecaptchaFailedException $th) {

            // Error
            $this->dispatchBrowserEvent('alert',[
                "message" => __('messages.t_recaptcha_error_message'),
                "type"    => "error"
            ]);

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