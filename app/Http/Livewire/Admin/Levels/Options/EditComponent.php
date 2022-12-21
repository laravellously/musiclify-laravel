<?php

namespace App\Http\Livewire\Admin\Levels\Options;

use App\Http\Validators\Admin\Levels\EditValidator;
use App\Models\Level;
use Livewire\Component;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class EditComponent extends Component
{
    use SEOToolsTrait;
    
    public $title;
    public $account_type;
    public $seller_max_sales;
    public $seller_min_sales;
    public $buyer_max_purchases;
    public $buyer_min_purchases;
    public $color;
    public $level;

    /**
     * Init component
     *
     * @param string $id
     * @return void
     */
    public function mount($id)
    {
        // Get level
        $level = Level::where('uid', $id)->firstOrFail();

        // Fill form
        $this->fill([
            'title'               => $level->title,
            'account_type'        => $level->account_type,
            'seller_max_sales'    => $level->seller_sales_max,
            'seller_min_sales'    => $level->seller_sales_min,
            'buyer_max_purchases' => $level->buyer_purchases_max,
            'buyer_min_purchases' => $level->buyer_purchases_min,
            'color'               => $level->level_color,
        ]);

        // Set level
        $this->level = $level;
    }


    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        // Seo
        $this->seo()->setTitle( setSeoTitle(__('messages.t_edit_level'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.levels.options.edit')->extends('livewire.admin.layout.app')->section('content');
    }


    /**
     * Update level
     *
     * @return void
     */
    public function update()
    {
        try {

            // Validate form
            EditValidator::validate($this);

            // Update level
            $this->level->title               = $this->title;
            $this->level->account_type        = $this->account_type;
            $this->level->seller_sales_min    = $this->account_type === 'seller' ? $this->seller_min_sales : 0;
            $this->level->seller_sales_max    = $this->account_type === 'seller' ? $this->seller_max_sales : 0;
            $this->level->buyer_purchases_min = $this->account_type === 'buyer' ? $this->buyer_min_purchases : 0;
            $this->level->buyer_purchases_max = $this->account_type === 'buyer' ? $this->buyer_max_purchases : 0;
            $this->level->level_color         = $this->color;
            $this->level->save();

            // Success
            $this->dispatchBrowserEvent('alert',[
                "message" => __('messages.t_level_updated_successfully'),
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
