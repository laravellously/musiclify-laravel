<?php

namespace App\Http\Middleware;

use App\Models\Language;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if application installed
        if (isInstalled()) {
            
            // Get locale
            $locale   = session()->has('locale') ? session()->get('locale') : settings('general')->default_language;
    
            // Get language
            $language = Language::where('is_active', true)->where('language_code', $locale)->first();
    
            // Check if language exists
            if ($language) {
                
                // Set app locale
                App::setLocale($language->language_code);
    
                // Set direction
                config()->set('direction', $language->force_rtl ? 'rtl' : 'ltr');
    
            } else {
    
                // Set default locale
                App::setLocale(settings('general')->default_language);
    
                // Set direction
                config()->set('direction', 'ltr');
    
            }
    
            // Continue
            return $next($request);

        } else {

            // Set direction
            config()->set('direction', 'ltr');

            // Continue
            return $next($request);

        }
    }
}
