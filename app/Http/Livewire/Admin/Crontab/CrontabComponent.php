<?php

namespace App\Http\Livewire\Admin\Crontab;

use Livewire\Component;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use File;
use Symfony\Component\Process\PhpExecutableFinder;

class CrontabComponent extends Component
{
    use SEOToolsTrait;

    public $is_generated;
    public $queue_command;
    public $schedule_command;

    /**
     * Init component
     *
     * @return void
     */
    public function mount()
    {
        // Check if already generated files
        if (File::exists(base_path('scripts/queue.sh')) && File::exists(base_path('scripts/schedule.sh'))) {
            
            // Already generated 
            $this->is_generated     = true;

            // Set commands
            $this->queue_command    = "/bin/sh " . base_path('scripts/queue.sh');
            $this->schedule_command = "/bin/sh " . base_path('scripts/schedule.sh');

        } else {

            // Not generated yet
            $this->is_generated = false;

        } 
    }


    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        // Seo
        $this->seo()->setTitle( setSeoTitle(__('messages.t_task_scheduling'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.crontab.crontab')->extends('livewire.admin.layout.app')->section('content');
    }


    /**
     * Generate cron jobs commands
     *
     * @return void
     */
    public function generate()
    {
        try {
            
            // Check if scripts folder exists
            if (File::exists(base_path('scripts'))) {
                
                // Delete folder
                File::delete(base_path('scripts'));

            }

            // Fetch path
            $php_finder   = new PhpExecutableFinder();

            // Find php binary path
            $php_binary   = $php_finder->find();

            // Get scripts path
            $scripts_path = base_path('scripts');

            // Get path to artisan
            $artisan_path = base_path('artisan');

            // Create path if not exists
            if(!File::isDirectory($scripts_path)) {

                File::makeDirectory($scripts_path, 0755, true, true); 

            }

            // Set queue shell code
            $queue_sh    = "#!/bin/sh
$php_binary $artisan_path queue:work --stop-when-empty >> /dev/null 2>&1";

            // Set schedule shell code
            $schedule_sh = "#!/bin/sh
$php_binary $artisan_path queue:run >> /dev/null 2>&1";

            // Put content
            File::put(base_path('scripts/queue.sh'), $queue_sh);  
            File::put(base_path('scripts/schedule.sh'), $schedule_sh);  

            // Set generated to true
            $this->is_generated = true;

            // Set commands
            $this->queue_command    = "/bin/sh " . base_path('scripts/queue.sh');
            $this->schedule_command = "/bin/sh " . base_path('scripts/schedule.sh');

            // Success
            $this->dispatchBrowserEvent('alert',[
                "message" => __('messages.t_toast_operation_success'),
            ]);

        } catch (\Throwable $th) {

            // Error
            throw $th;
        }
    }
    
}
