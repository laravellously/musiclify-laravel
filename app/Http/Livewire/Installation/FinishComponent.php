<?php

namespace App\Http\Livewire\Installation;

use Artisan;
use Config;
use File;
use Livewire\Component;

class FinishComponent extends Component
{

    /**
     * Finish installation
     *
     * @return void
     */
    public function mount()
    {
        // Generate application key
        $key = random_bytes(32);

        // Set key
        Config::write('app.key', "base64:" . base64_encode($key));

        // Clear cache
        Artisan::call('config:clear');

        // Delete install routes file
        File::delete(base_path('routes/install.php'));

        // Delete resources views
        File::deleteDirectory(resource_path('views\livewire\installation'));

        // Delete this folder
        File::deleteDirectory(app_path('Http\Livewire\Installation'));

        // Delete update folder
        File::deleteDirectory(app_path('Http\Livewire\Update'));

        // Delete update file
        if (File::exists(base_path('updating'))) {
            File::delete(base_path('updating'));
        }

        // Redirect to login
        return redirect(config('global.dashboard_prefix') . '/login');

    }
    
}
