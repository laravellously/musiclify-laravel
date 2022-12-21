<?php

namespace App\Http\Livewire\Admin\Reports;

use App\Models\ReportedGig;
use App\Models\Gig;
use Livewire\WithPagination;
use Livewire\Component;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class GigsComponent extends Component
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
        ReportedGig::where('status', 'pending')->update([
            'status' => 'seen'
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
        $this->seo()->setTitle( setSeoTitle(__('messages.t_reported_gigs'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.reports.gigs', [
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
        return ReportedGig::latest()->paginate(42);
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
        ReportedGig::where('id', $id)->delete();

        // Success
        $this->dispatchBrowserEvent('alert',[
            "message" => __('messages.t_report_has_been_successfully_deleted')
        ]);
    }
    
}
