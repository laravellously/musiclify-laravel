<?php

namespace App\Http\Livewire\Main\Includes;

use App\Models\Language;
use App\Models\Page;
use Livewire\Component;
use Cookie;

class Footer extends Component
{

    public $default_language_name;
    public $default_language_code;
    public $default_country_code;

    /**
     * Init component
     *
     * @return void
     */
    public function mount()
    {
        // Get language from session
        $locale   = session()->has('locale') ? session()->get('locale') : settings('general')->default_language;

        // Get default language
        $language = Language::where('language_code', $locale)->first();

        // Check if language exists
        if ($language) {
            
            // Set default language
            $this->default_language_name = $language->name;
            $this->default_language_code = $language->language_code;
            $this->default_country_code  = $language->country_code;

        } else {

            // Not found, set default
            $this->default_language_name = "English";
            $this->default_language_code = "en";
            $this->default_country_code  = "us";

        }
    }
    
    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        return view('livewire.main.includes.footer', [
            'pages' => $this->pages
        ]);
    }


    /**
     * Get pages
     *
     * @return object
     */
    public function getPagesProperty()
    {
        return Page::orderBy('title', 'asc')->get();
    }


    /**
     * Change locale
     *
     * @param string $locale
     * @return void
     */
    public function setLocale($locale)
    {
        // Get language
        $language = Language::where('language_code', $locale)->where('is_active', true)->first();

        // Check if language exists
        if (!$language) {
            
            // Not found
            $this->dispatchBrowserEvent('alert',[
                "message" => __('messages.t_selected_lang_does_not_found'),
                "type"    => "error"
            ]);

            return;

        }

        // Set default language
        session()->put('locale', $language->language_code);

        // Refresh the page
        $this->dispatchBrowserEvent('refresh');
    }


    /**
     * Toggle dark mode
     *
     * @return void
     */
    public function toggleDarkMode()
    {
        // Check if dark mode enabled
        if (isInstalled() && settings('appearance')->is_dark_mode) {

            // Get dark mode status
            $dark_mode = Cookie::get('dark_mode', null);
    
            // Check if dark mode enabled
            if ($dark_mode === 'enabled') {
                
                // Disable dark mode
                Cookie::queue('dark_mode', 'disabled', 10080); // 7 days = 10080 min
    
            } else if ($dark_mode === 'disabled') {
    
                // Enable dark mode
                Cookie::queue('dark_mode', 'enabled', 10080); // 7 days = 10080 min
    
            } else {

                // Enable dark mode
                Cookie::queue('dark_mode', 'enabled', 10080); // 7 days = 10080 min

            }

            // Refresh the page
            $this->dispatchBrowserEvent('refresh');

        }
    }
    
}
