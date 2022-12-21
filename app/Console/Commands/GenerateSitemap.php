<?php

namespace App\Console\Commands;

use App\Models\Gig;
use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate a sitemap';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        if (settings('seo')->is_sitemap) {
            
            Sitemap::create()
                    ->add(Gig::active()->get())
                    ->writeToFile(base_path('sitemap.xml'));
        }
    }
}
