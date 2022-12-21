<?php

namespace App\Http\Livewire\Admin\Projects\Subscriptions;

use App\Http\Validators\Admin\Projects\Subscriptions\EditValidator;
use App\Models\ProjectSubscription;
use Livewire\Component;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class EditComponent extends Component
{
    use SEOToolsTrait;

    public $title;
    public $description;
    public $price;
    public $days;
    public $badge_text_color;
    public $badge_bg_color;
    public $is_active;
    public $plan;

    /**
     * Initialize component
     *
     * @return void
     */
    public function mount($id)
    {
        // Get plan
        $plan = ProjectSubscription::where('id', $id)->firstOrFail();

        // fill form
        $this->fill([
            'title'            => $plan->title,
            'description'      => $plan->description,
            'price'            => $plan->price,
            'days'             => $plan->days,
            'badge_text_color' => $plan->badge_text_color,
            'badge_bg_color'   => $plan->badge_bg_color,
            'is_active'        => $plan->is_active ? 1 : 0
        ]);

        // Set plan
        $this->plan = $plan;
    }


    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        // Seo
        $this->seo()->setTitle( setSeoTitle(__('messages.t_edit_project_subscription_plan'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.projects.subscriptions.edit')->extends('livewire.admin.layout.app')->section('content');
    }


    /**
     * Update plan
     *
     * @return void
     */
    public function update()
    {
        try {

            // Validate form
            EditValidator::validate($this);
            
            // Update plan
            $this->plan->title            = $this->title;
            $this->plan->description      = $this->description;
            $this->plan->price            = $this->price;
            $this->plan->days             = $this->plan->type === 'alert' ? null : $this->days;
            $this->plan->badge_text_color = $this->badge_text_color;
            $this->plan->badge_bg_color   = $this->badge_bg_color;
            $this->plan->is_active        = $this->is_active ? 1 : 0;

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
