<?php

namespace App\Http\Livewire\Installation;

use Livewire\Component;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class RequirementsComponent extends Component
{

    use SEOToolsTrait;

    public $is_php_version;
    public $extension_bcmath;
    public $extension_ctype;
    public $extension_curl;
    public $extension_dom;
    public $extension_fileinfo;
    public $extension_json;
    public $extension_mbstring;
    public $extension_openssl;
    public $extension_pcre;
    public $extension_pdo;
    public $extension_tokenizer;
    public $extension_xml;
    public $max_input_time;
    public $max_execution_time;
    public $post_max_size;
    public $upload_max_filesize;
    public $memory_limit;
    /**
     * Init component
     *
     * @return void
     */
    public function mount()
    {

        // Check php version
        $this->is_php_version      = version_compare(phpversion(), '8.1.0', '>=');

        // Check extensions
        $this->extension_bcmath    = extension_loaded('bcmath');
        $this->extension_ctype     = extension_loaded('ctype');
        $this->extension_curl      = extension_loaded('curl');
        $this->extension_dom       = extension_loaded('dom');
        $this->extension_fileinfo  = extension_loaded('fileinfo');
        $this->extension_json      = extension_loaded('json');
        $this->extension_mbstring  = extension_loaded('mbstring');
        $this->extension_openssl   = extension_loaded('openssl');
        $this->extension_pcre      = extension_loaded('pcre');
        $this->extension_pdo       = extension_loaded('PDO');
        $this->extension_tokenizer = extension_loaded('tokenizer');
        $this->extension_xml       = extension_loaded('xml');

        // Check uploading settings
        $this->max_input_time      = ini_get('max_input_time');
        $this->max_execution_time  = ini_get('max_execution_time');
        $this->post_max_size       = ini_get('post_max_size');
        $this->upload_max_filesize = ini_get('upload_max_filesize');
        $this->memory_limit        = ini_get('memory_limit');

    }

    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        // SEO
        $this->seo()->setTitle("Installation | Requirements");

        return view('livewire.installation.requirements')->extends('livewire.installation.layout')->section('content');
    }


    /**
     * Go to next step
     *
     * @return void
     */
    public function next()
    {
        // Redirect to next step
        return redirect('install/database');
    }
    
}
