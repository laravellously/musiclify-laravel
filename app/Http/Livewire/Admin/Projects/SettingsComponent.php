<?php

namespace App\Http\Livewire\Admin\Projects;

use App\Http\Validators\Admin\Projects\SettingsValidator;
use App\Models\ProjectSettings;
use Livewire\Component;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class SettingsComponent extends Component
{
    use SEOToolsTrait;

    public $is_enabled;
    public $auto_approve_projects;
    public $is_free_posting;
    public $is_premium_posting;
    public $commission_type;
    public $commission_from_freelancer;
    public $commission_from_publisher;

    /**
     * Initialize component
     *
     * @return void
     */
    public function mount()
    {
        // Get settings
        $settings = settings('projects');

        // Fill default settings
        $this->fill([
            'is_enabled'                 => $settings->is_enabled ? 1 : 0,
            'auto_approve_projects'      => $settings->auto_approve_projects ? 1 : 0,
            'is_free_posting'            => $settings->is_free_posting ? 1 : 0,
            'is_premium_posting'         => $settings->is_premium_posting ? 1 : 0,
            'commission_type'            => $settings->commission_type,
            'commission_from_freelancer' => $settings->commission_from_freelancer,
            'commission_from_publisher'  => $settings->commission_from_publisher
        ]);
    }


    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        // Seo
        $this->seo()->setTitle( setSeoTitle(__('messages.t_projects_settings'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.projects.settings')->extends('livewire.admin.layout.app')->section('content');
    }


    /**
     * Update settings
     *
     * @return void
     */
    public function update()
    {
        try {

            // Validate form
            SettingsValidator::validate($this);
            
            // Update settings
            ProjectSettings::where('id', 1)->update([
                'is_enabled'                 => $this->is_enabled ? 1 : 0,
                'auto_approve_projects'      => $this->auto_approve_projects ? 1 : 0,
                'is_free_posting'            => $this->is_free_posting ? 1 : 0,
                'is_premium_posting'         => $this->is_premium_posting ? 1 : 0,
                'commission_type'            => $this->commission_type,
                'commission_from_freelancer' => $this->commission_from_freelancer,
                'commission_from_publisher'  => $this->commission_from_publisher
            ]);

            // Refresh data from cache
            settings('projects', true);

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
