<?php

namespace App\Http\Livewire\Installation;

use Livewire\Component;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use Symfony\Component\Process\PhpExecutableFinder;

class CrontabComponent extends Component
{

    use SEOToolsTrait;

    public $pathToPhp;

    public function mount()
    {
        // Fetch path
        $finder = new PhpExecutableFinder();

        // Set path to php binary
        $this->pathToPhp = $finder->find();
    }

    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        // SEO
        $this->seo()->setTitle("Installation | Cron jobs");

        return view('livewire.installation.crontab')->extends('livewire.installation.layout')->section('content');
    }


    /**
     * Go to next step
     *
     * @return void
     */
    public function next()
    {
        // Redirect to next step
        return redirect('install/finish');
    }
    
}
