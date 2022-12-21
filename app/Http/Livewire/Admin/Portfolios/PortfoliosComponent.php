<?php

namespace App\Http\Livewire\Admin\Portfolios;

use App\Models\UserPortfolio;
use App\Notifications\User\Seller\PortfolioPublished;
use Livewire\WithPagination;
use Livewire\Component;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class PortfoliosComponent extends Component
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
        $this->seo()->setTitle( setSeoTitle(__('messages.t_portfolios'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.portfolios.portfolios', [
            'portfolios' => $this->portfolios
        ])->extends('livewire.admin.layout.app')->section('content');
    }


    /**
     * Get list of portfolios
     *
     * @return object
     */
    public function getPortfoliosProperty()
    {
        return UserPortfolio::latest()->paginate(42);
    }


    /**
     * Delete portfolio
     *
     * @param integer $id
     * @return void
     */
    public function delete($id)
    {
        // Get portfolio
        $portfolio = UserPortfolio::where('id', $id)->firstOrFail();

        // Check if portfolio has thumbnail
        if ($portfolio->thumbnail) {
            deleteModelFile($portfolio->thumbnail);
        }

        // Loop through gallery
        foreach ($portfolio->gallery as $img) {
            
            // Delete file first
            deleteModelFile($img->image);

            // Delete this image
            $img->delete();

        }

        // Delete portfolio
        $portfolio->delete();

        // Success
        $this->dispatchBrowserEvent('alert',[
            "message" => __('messages.t_portfolio_deleted_successfully'),
        ]);
    }


    /**
     * Activate portfolio
     *
     * @param integer $id
     * @return void
     */
    public function activate($id)
    {
        // Get portfolio
        $portfolio         = UserPortfolio::where('id', $id)->where('status', 'pending')->firstOrFail();

        // Activate portfolio
        $portfolio->status = 'active';
        $portfolio->save();

        // Send notification to user
        $portfolio->user->notify( (new PortfolioPublished($portfolio))->locale(config('app.locale')) );

        // Send notification
        notification([
            'text'    => 't_ur_portfolio_title_has_been_published',
            'action'  => url('projects', $portfolio->slug),
            'user_id' => $portfolio->user_id,
            'params'  => ['title' => $portfolio->title]
        ]);

        // Success
        $this->dispatchBrowserEvent('alert',[
            "message" => __('messages.t_portfolio_published_successfully'),
        ]);
    }
    
}
