<?php

namespace App\Http\Livewire\Installation;

use Livewire\Component;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use Artisan;
use Config;
use DB;
use Honey;

class DatabaseComponent extends Component
{

    use SEOToolsTrait;

    public $host;
    public $port;
    public $database;
    public $username;
    public $password;

    /**
     * Init component
     *
     * @return void
     */
    public function mount()
    {
        // Fill default data
        $this->fill([
            'host' => 'localhost',
            'port' => 3306
        ]);
    }

    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        // SEO
        $this->seo()->setTitle("Installation | Database");

        return view('livewire.installation.database')->extends('livewire.installation.layout')->section('content');
    }


    /**
     * Go to next step
     *
     * @return void
     */
    public function next()
    {
        try {
            
            // Clear database cache
            DB::purge();

            // Set database details
            Config::write('database.connections.mysql.host', $this->host);
            Config::write('database.connections.mysql.database', $this->database);
            Config::write('database.connections.mysql.port', $this->port);
            Config::write('database.connections.mysql.username', $this->username);

            // Set password if exists
            if ($this->password) {
                
                Config::write('database.connections.mysql.password', $this->password);

            }

            // Clear config
            Artisan::call('config:clear');

            // Connect to database
            DB::connection()->getPDO();

            // Check connection
            if(DB::connection()->getDatabaseName()) {
                
                // Run migration
                Artisan::call('migrate', [ '--force' => true ]);

                // After that we need to run seeder
                Artisan::call('db:seed', [ '--force' => true ]);

                // Edit session.php
                Config::write('session.driver', 'database');

                // Connected, create new admin account
                return redirect('install/administrator');

            } else {
                
                // Not connected
                $this->dispatchBrowserEvent('alert',[
                    "message" => 'We are unable to connect to this database. Please try again',
                    "type"    => "error"
                ]);

            }


        } catch (\Throwable $th) {
            
            // Not connected
            $this->dispatchBrowserEvent('alert',[
                "message" => $th->getMessage(),
                "type"    => "error"
            ]);

        }
    }
    
}
