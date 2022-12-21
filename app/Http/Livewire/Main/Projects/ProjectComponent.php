<?php

namespace App\Http\Livewire\Main\Projects;

use App\Models\UserPortfolio;
use Livewire\Component;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class ProjectComponent extends Component
{
    use SEOToolsTrait;
    
    public $project;

    /**
     * Init component
     *
     * @return void
     */
    public function mount($slug)
    {
        // Get project
        $project = UserPortfolio::where('slug', $slug)->first();

        // Check if project exists
        if (!$project) {
            abort(404);
        }

        // Check project status
        if ($project->status === 'pending') {
            
            // Check if user online
            if (auth()->check()) {
                
                // Check if connect user is project owner
                if (auth()->id() === $project->user_id) {
                    
                    // Set project
                    $this->project = $project;

                } else {

                    // Project not active yet
                    return abort(404);

                }

            } else {

                // Not connected 
                return abort(404);

            }

        } else {

            // Project already active
            $this->project = $project;

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
        $title       = $this->project->title . " $separator " . settings('general')->title;
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

        return view('livewire.main.projects.project')->extends('livewire.main.layout.app')->section('content');
    }
    
}