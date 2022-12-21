<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SettingsPublishTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        
        \DB::table('settings_publish')->insert(array (
            0 => 
            array (
                'id' => 1,
                'auto_approve_gigs' => 0,
                'auto_approve_portfolio' => 0,
                'max_tags' => 5,
                'is_video_enabled' => 1,
                'is_documents_enabled' => 1,
                'max_documents' => 2,
                'max_document_size' => 10,
                'max_images' => 10,
                'max_image_size' => 5,
            ),
        ));
        
        
    }
}