<?php

namespace App\Http\Livewire\Admin\Reports;

use App\Models\ReportedUser;
use App\Models\User;
use Livewire\WithPagination;
use Livewire\Component;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class UsersComponent extends Component
{
    use WithPagination, SEOToolsTrait;

    /**
     * Init component
     *
     * @return void
     */
    public function mount()
    {
        // Mark new reports as seen
        ReportedUser::where('is_seen', false)->update([
            'is_seen' => true
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
        $this->seo()->setTitle( setSeoTitle(__('messages.t_reported_users'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.reports.users', [
            'reports' => $this->reports
        ])->extends('livewire.admin.layout.app')->section('content');
    }


    /**
     * Get list of reports
     *
     * @return object
     */
    public function getReportsProperty()
    {
        return ReportedUser::latest()->paginate(42);
    }


    /**
     * Ban user
     *
     * @param integer $id
     * @return void
     */
    public function ban($id)
    {
        // Get report
        $report = ReportedUser::where('id', $id)->firstOrFail();

        // Ban user
        User::where('id', $report->reported_id)->update([
            'status' => 'banned'
        ]);

        // Success
        $this->dispatchBrowserEvent('alert',[
            "message" => __('messages.t_user_has_been_banned_success')
        ]);
    }


    /**
     * Delete report
     *
     * @param integer $id
     * @return void
     */
    public function delete($id)
    {
        // Delete report
        ReportedUser::where('id', $id)->delete();

        // Success
        $this->dispatchBrowserEvent('alert',[
            "message" => __('messages.t_report_has_been_successfully_deleted')
        ]);
    }
    
}
