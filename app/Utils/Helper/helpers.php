<?php

use App\Models\Advertisement;
use App\Models\BlogSettings;
use App\Models\CashfreeSettings;
use App\Models\FileManager;
use App\Models\FlutterwaveSettings;
use App\Models\JazzcashSettings;
use App\Models\Language;
use App\Models\MercadopagoSettings;
use App\Models\MollieSettings;
use App\Models\NewsletterSettings;
use App\Models\Notification;
use App\Models\OfflinePaymentSettings;
use App\Models\PaymobSettings;
use App\Models\PayPalSettings;
use App\Models\PaystackSettings;
use App\Models\PaytabsSettings;
use App\Models\PaytrSettings;
use App\Models\ProjectSettings;
use App\Models\RazorpaySettings;
use App\Models\SettingsAppearance;
use App\Models\SettingsAuth;
use App\Models\SettingsCommission;
use App\Models\SettingsCurrency;
use App\Models\SettingsFooter;
use App\Models\SettingsGeneral;
use App\Models\SettingsMedia;
use App\Models\SettingsPublish;
use App\Models\SettingsSecurity;
use App\Models\SettingsSeo;
use App\Models\SettingsWithdrawal;
use App\Models\Slider;
use App\Models\StripeSettings;
use App\Models\VNPaySettings;
use App\Models\XenditSettings;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;

/**
 * Generate unique string
 *
 * @param integer $length
 * @return string
 */
function uid($length = 20)
{
    $bytes  = random_bytes($length);
    $random = bin2hex($bytes);
    return strtoupper(substr($random, 0, $length));
}

/**
 * Format date
 *
 * @param string $timestamp
 * @param string $format
 * @return string
 */
function format_date($timestamp, $format = 'ago')
{
    // Check format type is ago
    if ($format === 'ago') {
        
        return Carbon::createFromTimeStamp(strtotime($timestamp), config('app.timezone'))->diffForHumans();

    } else {

        return Carbon::create($timestamp)->setTimezone(config('app.timezone'))->format($format);

    }
}

/**
 * Make file size readable
 *
 * @param integer $size
 * @param integer $precision
 * @return string
 */
function format_bytes($size, $precision = 2)
{
    if ($size > 0) {
        $size = (int) $size;
        $base = log($size) / log(1024);
        $suffixes = array(' bytes', ' KB', ' MB', ' GB', ' TB');

        return round(pow(1024, $base - floor($base)), $precision) . $suffixes[floor($base)];
    } else {
        return $size;
    }
}

function src($file)
{
    // Check if file set
    if ($file) {
        
        // Get file path
        $path = public_path('storage/' . $file->file_folder . '/' . $file->uid . "." . $file->file_extension);

        // Check if file exists
        if (File::exists($path)) {
            
            // File exists, return url
            return url('public/storage/' . $file->file_folder . '/' . $file->uid . "." . $file->file_extension);

        }

        // File not found
        return url('public/storage/default/default-placeholder.jpg');

    }

    // No file set
    return url('public/storage/default/default-placeholder.jpg');
}


/**
 * Get admin url
 *
 * @param string $to
 * @param string $params
 * @return string
 */
function admin_url($to = null, $params = null)
{
    // Get dashboard prefix
    $prefix = config('global.dashboard_prefix');

    // Return url
    return !is_null($to) ? url("$prefix/$to", $params) : url("$prefix");
}

/**
 * Delete a file from a relation model
 *
 * @param object $file
 * @return void
 */
function deleteModelFile($file)
{
    try {
        
        // Check if file set
        if ($file) {
            
            // Get file path
            $path = public_path('storage/' . $file->file_folder . '/' . $file->uid . '.' . $file->file_extension);
    
            // Check if file exists
            if (File::exists($path)) {
                File::delete($path);
            }
    
            // Now delete it from database
            $file->delete();
    
        }

    } catch (\Throwable $th) {

        return;

    }
}

/**
 * Get settings from cache
 *
 * @param string $settings
 * @return object
 */
function settings($settings, $updateCache = false)
{
    // Check what settings you want
    switch ($settings) {

        case 'currency':

            // Check if want to update cache
            if ($updateCache) {
                
                // Remove it from cache
                Cache::forget('settings_currency');

            } else {

                // Return data
                return Cache::rememberForever('settings_currency', function () {
                    return SettingsCurrency::first();
                });

            }

        break;

        case 'publish':

            // Check if want to update cache
            if ($updateCache) {
                
                // Remove it from cache
                Cache::forget('settings_publish');

            } else {

                // Return data
                return Cache::rememberForever('settings_publish', function () {
                    return SettingsPublish::first();
                });

            }

        break;

        case 'commission':

            // Check if want to update cache
            if ($updateCache) {
                
                // Remove it from cache
                Cache::forget('settings_commission');

            } else {

                // Return data
                return Cache::rememberForever('settings_commission', function () {
                    return SettingsCommission::first();
                });

            }

        break;

        case 'media':

            // Check if want to update cache
            if ($updateCache) {
                
                // Remove it from cache
                Cache::forget('settings_media');

            } else {

                // Return data
                return Cache::rememberForever('settings_media', function () {
                    return SettingsMedia::first();
                });

            }

        break;

        case 'withdrawal':

            // Check if want to update cache
            if ($updateCache) {
                
                // Remove it from cache
                Cache::forget('settings_withdrawal');

            } else {

                // Return data
                return Cache::rememberForever('settings_withdrawal', function () {
                    return SettingsWithdrawal::first();
                });

            }

        break;

        case 'auth':

            // Check if want to update cache
            if ($updateCache) {
                
                // Remove it from cache
                Cache::forget('settings_auth');

            } else {

                // Return data
                return Cache::rememberForever('settings_auth', function () {
                    return SettingsAuth::first();
                });

            }

        break;

        case 'footer':

            // Check if want to update cache
            if ($updateCache) {
                
                // Remove it from cache
                Cache::forget('settings_footer');

            } else {

                // Return data
                return Cache::rememberForever('settings_footer', function () {
                    return SettingsFooter::first();
                });

            }

        break;

        case 'general':

            // Check if want to update cache
            if ($updateCache) {
                
                // Remove it from cache
                Cache::forget('settings_general');

            } else {

                // Return data
                return Cache::rememberForever('settings_general', function () {
                    return SettingsGeneral::first();
                });

            }

        break;

        case 'security':

            // Check if want to update cache
            if ($updateCache) {
                
                // Remove it from cache
                Cache::forget('settings_security');

            } else {

                // Return data
                return Cache::rememberForever('settings_security', function () {
                    return SettingsSecurity::first();
                });

            }

        break;

        case 'seo':

            // Check if want to update cache
            if ($updateCache) {
                
                // Remove it from cache
                Cache::forget('settings_seo');

            } else {

                // Return data
                return Cache::rememberForever('settings_seo', function () {
                    return SettingsSeo::first();
                });

            }

        break;

        case 'newsletter':

            // Check if want to update cache
            if ($updateCache) {
                
                // Remove it from cache
                Cache::forget('settings_newsletter');

            } else {

                // Return data
                return Cache::rememberForever('settings_newsletter', function () {
                    return NewsletterSettings::first();
                });

            }

        break;

        // Blog settings
        case 'blog':

            // Check if want to update cache
            if ($updateCache) {
                
                // Remove it from cache
                Cache::forget('settings_blog');

            } else {

                // Return data
                return Cache::rememberForever('settings_blog', function () {
                    return BlogSettings::first();
                });

            }

        // Appearance settings
        case 'appearance':

            // Check if want to update cache
            if ($updateCache) {
                
                // Remove it from cache
                Cache::forget('settings_appearance');

            } else {

                // Return data
                return Cache::rememberForever('settings_appearance', function () {
                    return SettingsAppearance::first();
                });

            }

        break;

        // Offline payment settings
        case 'offline_payment':

            // Check if want to update cache
            if ($updateCache) {
                
                // Remove it from cache
                Cache::forget('settings_offline_payment');

            } else {

                // Return data
                return Cache::rememberForever('settings_offline_payment', function () {
                    return OfflinePaymentSettings::first();
                });

            }

        break;

        // Paystack payment settings
        case 'paystack':

            // Check if want to update cache
            if ($updateCache) {
                
                // Remove it from cache
                Cache::forget('settings_paystack');

            } else {

                // Return data
                return Cache::rememberForever('settings_paystack', function () {
                    return PaystackSettings::first();
                });

            }

        break;

        // Cashfree payment settings
        case 'cashfree':

            // Check if want to update cache
            if ($updateCache) {
                
                // Remove it from cache
                Cache::forget('settings_cashfree');

            } else {

                // Return data
                return Cache::rememberForever('settings_cashfree', function () {
                    return CashfreeSettings::first();
                });

            }

        break;

        // Xendit payment settings
        case 'xendit':

            // Check if want to update cache
            if ($updateCache) {
                
                // Remove it from cache
                Cache::forget('settings_xendit');

            } else {

                // Return data
                return Cache::rememberForever('settings_xendit', function () {
                    return XenditSettings::first();
                });

            }

        break;

        // Projects settings
        case 'projects':

            // Check if want to update cache
            if ($updateCache) {
                
                // Remove it from cache
                Cache::forget('settings_projects');

            } else {

                // Return data
                return Cache::rememberForever('settings_projects', function () {
                    return ProjectSettings::first();
                });

            }

        break;

        // Flutterwave settings
        case 'flutterwave':

            // Check if want to update cache
            if ($updateCache) {
                
                // Remove it from cache
                Cache::forget('settings_flutterwave');

            } else {

                // Return data
                return Cache::rememberForever('settings_flutterwave', function () {
                    return FlutterwaveSettings::first();
                });

            }

        break;

        // Vnpay settings
        case 'vnpay':

            // Check if want to update cache
            if ($updateCache) {
                
                // Remove it from cache
                Cache::forget('settings_vnpay');

            } else {

                // Return data
                return Cache::rememberForever('settings_vnpay', function () {
                    return VNPaySettings::first();
                });

            }

        break;

        // Paymob settings
        case 'paymob':

            // Check if want to update cache
            if ($updateCache) {
                
                // Remove it from cache
                Cache::forget('settings_paymob');

            } else {

                // Return data
                return Cache::rememberForever('settings_paymob', function () {
                    return PaymobSettings::first();
                });

            }

        break;

        // Mercadopago settings
        case 'mercadopago':

            // Check if want to update cache
            if ($updateCache) {
                
                // Remove it from cache
                Cache::forget('settings_mercadopago');

            } else {

                // Return data
                return Cache::rememberForever('settings_mercadopago', function () {
                    return MercadopagoSettings::first();
                });

            }

        break;

        // Paytabs settings
        case 'paytabs':

            // Check if want to update cache
            if ($updateCache) {
                
                // Remove it from cache
                Cache::forget('settings_paytabs');

            } else {

                // Return data
                return Cache::rememberForever('settings_paytabs', function () {
                    return PaytabsSettings::first();
                });

            }

        break;

        // Razorpay settings
        case 'razorpay':

            // Check if want to update cache
            if ($updateCache) {
                
                // Remove it from cache
                Cache::forget('settings_razorpay');

            } else {

                // Return data
                return Cache::rememberForever('settings_razorpay', function () {
                    return RazorpaySettings::first();
                });

            }

        break;

        // Jazzcash settings
        case 'jazzcash':

            // Check if want to update cache
            if ($updateCache) {
                
                // Remove it from cache
                Cache::forget('settings_jazzcash');

            } else {

                // Return data
                return Cache::rememberForever('settings_jazzcash', function () {
                    return JazzcashSettings::first();
                });

            }

        break;

        // Mollie settings
        case 'mollie':

            // Check if want to update cache
            if ($updateCache) {
                
                // Remove it from cache
                Cache::forget('settings_mollie');

            } else {

                // Return data
                return Cache::rememberForever('settings_mollie', function () {
                    return MollieSettings::first();
                });

            }

        break;

        // Paytr settings
        case 'paytr':

            // Check if want to update cache
            if ($updateCache) {
                
                // Remove it from cache
                Cache::forget('settings_paytr');

            } else {

                // Return data
                return Cache::rememberForever('settings_paytr', function () {
                    return PaytrSettings::first();
                });

            }

        break;

        // Paypal settings
        case 'paypal':

            // Check if want to update cache
            if ($updateCache) {
                
                // Remove it from cache
                Cache::forget('settings_paypal');

            } else {

                // Return data
                return Cache::rememberForever('settings_paypal', function () {
                    return PayPalSettings::first();
                });

            }

        break;

        // Stripe settings
        case 'stripe':

            // Check if want to update cache
            if ($updateCache) {
                
                // Remove it from cache
                Cache::forget('settings_stripe');

            } else {

                // Return data
                return Cache::rememberForever('settings_stripe', function () {
                    return StripeSettings::first();
                });

            }

        break;
        
        default:
            # code...
            break;
    }
}


/**
 * Get youtube id from url
 *
 * @param string $link
 * @return void
 */
function youtubeId($link)
{
    try {
        
        // Validate link
        if (preg_match("#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v\/)[^&\n]+(?=\?)|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#", $link, $matches)) {
            return isset($matches[0]) ? $matches[0] : null;
        }

        // Not found
        return null;

    } catch (\Throwable $th) {
        // throw $th;
        return null;
    }
}

/**
 * Get delivery time translate
 *
 * @param integer $time
 * @return string
 */
function delivery_time_trans($time)
{
    switch ((int) $time) {
        case 1:
            return __('messages.t_1_day');
            break;
        case 2:
            return __('messages.t_2_days');
            break;
        case 3:
            return __('messages.t_3_days');
            break;
        case 4:
            return __('messages.t_4_days');
            break;
        case 5:
            return __('messages.t_5_days');
            break;
        case 6:
            return __('messages.t_6_days');
            break;
        case 7:
            return __('messages.t_1_week');
            break;
        case 14:
            return __('messages.t_2_weeks');
            break;
        case 21:
            return __('messages.t_3_weeks');
            break;
        case 30:
            return __('messages.t_1_month');
            break;
    }
}


/**
 * Get accepted mime types for requirements (files)
 *
 * @return string
 */
function acceptableRequirementsMimeTypes()
{
    try {
        
        // Get allowed requirement files extensions
        $allowed_extensions = settings('media')->requirements_file_allowed_extensions;

        // Separate extensions by comma
        $extensions         = explode(',', $allowed_extensions);

        // Set empty mime types array
        $accepted           = [];

        // Set mime object
        $mimes              = new \Mimey\MimeTypes;


        // Loop through allowed extensions
        foreach ($extensions as $ext) {
            
            // Get extension mime type
            $mime_type = $mimes->getMimeType($ext);

            // Add mime type to list
            array_push($accepted, $mime_type);

        }

        // Convert this accepted array to string
        return implode(', ', $accepted);

    } catch (\Throwable $th) {
        throw $th;
    }
}

/**
 * Get first letter of a domain
 *
 * @param string $url
 * @return string
 */
function getWebsiteFirstLetter($domain)
{
    try {
        
        // Remove www from domain
        $withoutWWW    = str_replace("www.", "", $domain);

        // Remove domain
        $withoutDomain = explode('.', $withoutWWW);

        // Get first letter
        $firstLetter   = strtoupper(substr($withoutDomain[0], 0, 1));

        // Return firt letter
        return $firstLetter;

    } catch (\Throwable $th) {
        // Something went wrong
        // Return default letter
        return "A";

    }
}

/**
 * Encrypt data
 *
 * We don't want to use default laravel encryption
 * @param string $data
 * @return string
 */
function safeEncrypt($data)
{
    $output         = false;
  
    $encrypt_method = 'AES-256-CBC';
    $secret_key     = 'WU9AHAl#Ra--WWre';
    $secret_iv      = 'M43Sy96JuvJ5N6jY';
  
    // hash
    $key            = hash('sha256', $secret_key);
  
    // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
    $iv             = substr(hash('sha256', $secret_iv), 0, 16);
  
    $output         = openssl_encrypt($data, $encrypt_method, $key, 0, $iv);
    $output         = base64_encode($output);

    return $output;

}


/**
 * decrypted encrypted data
 *
 * @param string $encrypted
 * @return string
 */
function safeDecrypt($encrypted)
{
    $output         = false;
  
    $encrypt_method = 'AES-256-CBC';
    $secret_key     = 'WU9AHAl#Ra--WWre';
    $secret_iv      = 'M43Sy96JuvJ5N6jY';
  
    // hash
    $key            = hash('sha256', $secret_key);
  
    // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
    $iv             = substr(hash('sha256', $secret_iv), 0, 16);
  
    $output         = openssl_decrypt(base64_decode($encrypted), $encrypt_method, $key, 0, $iv);

    return $output;
}


/**
 * Get supported languages
 *
 * @param boolean $clear_cache
 * @return object
 */
function supported_languages($clear_cache = false)
{
    // Check if want to clear cache
    if ($clear_cache) {
        
        // Clear old cache
        Cache::forget('supported_languages');

        // Return data
        return Cache::rememberForever('supported_languages', function () {
            return Language::where('is_active', true)->orderBy('name', 'asc')->get();
        });

    } else {

        // Return data
        return Cache::rememberForever('supported_languages', function () {
            return Language::where('is_active', true)->orderBy('name', 'asc')->get();
        });

    }
}

/**
 * Clean text
 *
 * @param string $text
 * @return string
 */
function clean($text)
{
    try {
        
        return \Purify::clean($text);

    } catch (\Throwable $th) {
        return $text;
    }
}

/**
 * Retrieve size
 *
 * @param integer $size
 * @param integer $precision
 * @return string
 */
function human_filesize($size, $precision = 2) {
    $units = array('B','KB','MB','GB','TB','PB','EB','ZB','YB');
    $step  = 1024;
    $i     = 0;
    while (($size / $step) > 0.9) {
        $size = $size / $step;
        $i++;
    }
    return round($size, $precision). ' ' .$units[$i];
}


/**
 * Set seo title
 *
 * @param string $title
 * @param boolean $isDashboard
 * @return string
 */
function setSeoTitle($title, $isDashboard = false)
{
    // Set site title
    $site_title = settings('general')->title;

    // Set title separator
    $separator  = settings('general')->separator;

    // Check if want title for dashboard
    if ($isDashboard) {
        
        // Return title
        return $title . " $separator " . __('messages.t_dashboard');

    }

    // Return titlte for main pages
    return $title . " $separator " . $site_title;
}


/**
 * Save notification
 *
 * @param array $data
 * @return object
 */
function notification(array $data)
{
    // Save notification
    $notification          = new Notification();
    $notification->uid     = uid();
    $notification->user_id = $data['user_id'];
    $notification->text    = $data['text'];
    $notification->action  = $data['action'];
    $notification->params  = isset($data['params']) ? $data['params'] : null;
    $notification->save();

    // Return notification
    return $notification;
}


/**
 * Get advertisements
 *
 * @param string $name
 * @param boolean $updateCache
 * @return void
 */
function advertisements($name = null, $updateCache = false)
{
    // Check if want to update cache
    if ($updateCache) {
        
        // Clear old cache
        Cache::forget('advertisements');

        // Save ads
        Cache::rememberForever('advertisements', function () {
            return Advertisement::first();
        });

    } else {

        // Get ads
        $ads = Cache::rememberForever('advertisements', function () {
            return Advertisement::first();
        });

        // Return ad
        return $ads->$name;

    }
}

/**
 * Check if application installed
 *
 * @return boolean
 */
function isInstalled()
{
    try {

        // Connect db
        DB::connection()->getPDO();

        // Check if there is a connection
        if (!DB::connection()->getDatabaseName()) {
            return false;
        }

        // Get installation route file path
        $path = base_path('routes/install.php');

        // Check if file exists
        if (File::exists($path)) {

            // Installation not finished yet
            return false;

        }

        // Application is live
        return true;

    } catch (\Exception $e) {
        
        // Not connected
        return false;

    }
}

/**
 * Convert HEX to HSL
 *
 * @param string $RGB
 * @param integer $ladj
 * @return array
 */
function hex2hsl($RGB, $ladj = 0) 
{
    //have we got an RGB array or a string of hex RGB values (assume it is valid!)
    if (!is_array($RGB)) {
        $hexstr = ltrim($RGB, '#');
        if (strlen($hexstr) == 3) {
            $hexstr = $hexstr[0] . $hexstr[0] . $hexstr[1] . $hexstr[1] . $hexstr[2] . $hexstr[2];
        }
        $R = hexdec($hexstr[0] . $hexstr[1]);
        $G = hexdec($hexstr[2] . $hexstr[3]);
        $B = hexdec($hexstr[4] . $hexstr[5]);
        $RGB = array($R,$G,$B);
    }

    // scale the RGB values to 0 to 1 (percentages)
    $r   = $RGB[0]/255;
    $g   = $RGB[1]/255;
    $b   = $RGB[2]/255;
    $max = max( $r, $g, $b );
    $min = min( $r, $g, $b );

    // lightness calculation. 0 to 1 value, scale to 0 to 100% at end
    $l   = ( $max + $min ) / 2;
            
    // saturation calculation. Also 0 to 1, scale to percent at end.
    $d   = $max - $min;
    if( $d == 0 ){

        // achromatic (grey) so hue and saturation both zero
        $h = $s = 0; 

    } else {

        $s = $d / ( 1 - abs( (2 * $l) - 1 ) );
        // hue (if not grey) This is being calculated directly in degrees (0 to 360)
        switch( $max ){
            case $r:
                $h = 60 * fmod( ( ( $g - $b ) / $d ), 6 );
                if ($b > $g) { //will have given a negative value for $h
                    $h += 360;
                }
                break;
            case $g:
                $h = 60 * ( ( $b - $r ) / $d + 2 );
                break;
            case $b:
                $h = 60 * ( ( $r - $g ) / $d + 4 );
                break;
        }

    }

    // make any lightness adjustment required
    if ($ladj > 0) {
        $l += (1 - $l) * $ladj/100;
    } elseif ($ladj < 0) {
        $l += $l * $ladj/100;
    }

    //put the values in an array and scale the saturation and lightness to be percentages
    $hsl = array( round( $h), round( $s*100), round( $l*100) );
    
    // Return array
    return $hsl;
}


/**
 * Format currency
 *
 * @param string $amount
 * @return string
 */
function _price($amount)
{
    try {
        
        // Get currency settings
        $currency = settings('currency');

        return money($amount, $currency->code, true);

    } catch (\Throwable $th) {
        
        // Something went wrong
        return $amount;

    }
}


/**
 * Get home sliders
 *
 * @param boolean $updateCache
 * @return object
 */
function sliders($updateCache = false)
{
    try {
        
        // Get sliders
        if ($updateCache) {
                
            // Remove it from cache
            Cache::forget('home_sliders');

        } else {

            // Return data
            return Cache::rememberForever('home_sliders', function () {
                return Slider::all();
            });

        }

    } catch (\Throwable $th) {
        return [];
    }
}

/**
 * Get country flag image
 *
 * @param string $code
 * @return string
 */
function countryFlag($code)
{
    return url('public/vendor/blade-flags/country-' . strtolower($code) . '.svg');
}