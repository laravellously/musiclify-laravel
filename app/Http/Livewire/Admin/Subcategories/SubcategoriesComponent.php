<?php

namespace App\Http\Livewire\Admin\Subcategories;

use App\Models\Gig;
use Livewire\WithPagination;
use App\Models\Subcategory;
use Livewire\Component;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class SubcategoriesComponent extends Component
{
    use WithPagination, SEOToolsTrait;

    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        // Seo
        $this->seo()->setTitle( setSeoTitle(__('messages.t_subcategories'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.subcategories.subcategories', [
            'subcategories' => $this->subcategories
        ])->extends('livewire.admin.layout.app')->section('content');
    }


    /**
     * Get list of subcategories
     *
     * @return object
     */
    public function getSubcategoriesProperty()
    {
        return Subcategory::orderByDesc('id')->paginate(42);
    }


    /**
     * Delete subcategory
     *
     * @param integer $id
     * @return void
     */
    public function delete($id)
    {
        // Get subcategory
        $subcategory = Subcategory::where('id', $id)->firstOrFail();

        // Count gigs in this category
        $gigs     = Gig::where('subcategory_id', $subcategory->id)->count();

        // Check if category has any gig
        if ($gigs) {
            
            // Error
            $this->dispatchBrowserEvent('alert',[
                "message" => __('messages.t_this_subcategory_has_some_gigs_please_edit_it'),
                "type"    => "error"
            ]);

            return;

        }

        // Check if subcategory has icon
        if ($subcategory->icon) {
            deleteModelFile($subcategory->icon);
        }

        // Check if subcategory has image
        if ($subcategory->image) {
            deleteModelFile($subcategory->image);
        }

        // Delete subcategory
        $subcategory->delete();

        // Success
        $this->dispatchBrowserEvent('alert',[
            "message" => __('messages.t_toast_operation_success'),
        ]);
    }
    
}
