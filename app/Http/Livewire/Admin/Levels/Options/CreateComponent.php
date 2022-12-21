<?php

namespace App\Http\Livewire\Admin\Levels\Options;

use App\Http\Validators\Admin\Levels\CreateValidator;
use App\Models\Level;
use Livewire\Component;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class CreateComponent extends Component
{
    use SEOToolsTrait;
    
    public $title;
    public $account_type;
    public $seller_max_sales;
    public $seller_min_sales;
    public $buyer_max_purchases;
    public $buyer_min_purchases;
    public $color;

    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        // Seo
        $this->seo()->setTitle( setSeoTitle(__('messages.t_create_level'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.levels.options.create')->extends('livewire.admin.layout.app')->section('content');
    }


    /**
     * Create new user
     *
     * @return void
     */
    public function create()
    {
        try {

            // Validate form
            CreateValidator::validate($this);

            // Create new level
            $level                      = new Level;
            $level->uid                 = uid();
            $level->title               = $this->title;
            $level->account_type        = $this->account_type;
            $level->seller_sales_min    = $this->account_type === 'seller' ? $this->seller_min_sales : 0;
            $level->seller_sales_max    = $this->account_type === 'seller' ? $this->seller_max_sales : 0;
            $level->buyer_purchases_min = $this->account_type === 'buyer' ? $this->buyer_min_purchases : 0;
            $level->buyer_purchases_max = $this->account_type === 'buyer' ? $this->buyer_max_purchases : 0;
            $level->level_color         = $this->color;
            $level->save();

            // Reset form
            $this->reset();

            // Success
            $this->dispatchBrowserEvent('alert',[
                "message" => __('messages.t_level_created_successfully'),
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {

            // Validation error
            $this->dispatchBrowserEvent('alert',[
                "message" => __('messages.t_toast_form_validation_error'),
                "type"    => "error"
            ]);

            throw $e;

        } catch (\Throwable $th) {

            // Error
            $this->dispatchBrowserEvent('alert',[
                "message" => __('messages.t_toast_something_went_wrong'),
                "type"    => "error"
            ]);

            throw $th;

        }
    }
    
}
