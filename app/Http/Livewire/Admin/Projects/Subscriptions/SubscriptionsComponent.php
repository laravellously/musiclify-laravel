<?php

namespace App\Http\Livewire\Admin\Projects\Subscriptions;

use App\Models\ProjectSubscription;
use Livewire\Component;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class SubscriptionsComponent extends Component
{
    use SEOToolsTrait;


    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        // Seo
        $this->seo()->setTitle( setSeoTitle(__('messages.t_projects_subscriptions'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.projects.subscriptions.subscriptions', [
            'subscriptions' => $this->subscriptions
        ])->extends('livewire.admin.layout.app')->section('content');
    }


    /**
     * Get projects subscriptions plans
     *
     * @return object
     */
    public function getSubscriptionsProperty()
    {
        return ProjectSubscription::all();
    }


    /**
     * Activate subscription plan
     *
     * @param string $id
     * @return void
     */
    public function activate($id)
    {
        // Disable plan
        ProjectSubscription::where('id', $id)->update([
            'is_active' => true
        ]);

        // Success
        $this->dispatchBrowserEvent('alert',[
            "message" => __('messages.t_toast_operation_success'),
        ]);
    }


    /**
     * Disable selected plan
     *
     * @param string $id
     * @return void
     */
    public function disable($id)
    {
        // Disable plan
        ProjectSubscription::where('id', $id)->update([
            'is_active' => false
        ]);

        // Success
        $this->dispatchBrowserEvent('alert',[
            "message" => __('messages.t_toast_operation_success'),
        ]);
    }
    
}
