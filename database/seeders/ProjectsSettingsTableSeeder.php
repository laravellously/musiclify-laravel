<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProjectsSettingsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        
        \DB::table('projects_settings')->insert(array (
            0 => 
            array (
                'id'                         => 1,
                'is_enabled'                 => 0,
                'auto_approve_projects'      => 1,
                'is_free_posting'            => 1,
                'is_premium_posting'         => 1,
                'commission_type'            => 'percentage',
                'commission_from_freelancer' => '2.3',
                'commission_from_publisher'  => '2.2',
            ),
        ));
        
        
    }
}