<?php

namespace App\Http\Livewire\Admin\Settings;

use App\Models\Slider;
use App\Utils\Uploader\ImageUploader;
use Livewire\Component;
use Livewire\WithFileUploads;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class SlidersComponent extends Component
{
    use WithFileUploads, SEOToolsTrait;

    public $image;

    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        // Seo
        $this->seo()->setTitle( setSeoTitle(__('messages.t_sliders'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.settings.sliders')->extends('livewire.admin.layout.app')->section('content');
    }


    /**
     * Upload new slider
     *
     * @param mixed $file
     * @return void
     */
    public function updatedImage($file)
    {
        try {
            
            // Upload image
            $image_id = ImageUploader::make($file)
                                    ->folder('sliders')
                                    ->handle();

            // Save slider
            $slider           = new Slider();
            $slider->image_id = $image_id;
            $slider->save();

            // Clear cache
            sliders(true);

            // Success
            $this->dispatchBrowserEvent('alert',[
                "message" => __('messages.t_slider_uploaded_success'),
            ]);

        } catch (\Throwable $th) {

            // Error
            $this->dispatchBrowserEvent('alert',[
                "message" => $th->getMessage(),
                "type"    => "error"
            ]);

        }
    }


    /**
     * Delete slider
     *
     * @param string $id
     * @return void
     */
    public function removeSlider($id)
    {
        // Get image
        $slider = Slider::where('id', $id)->firstOrFail();

        // Delete image from local storage
        deleteModelFile($slider->image);

        // Delete slider
        $slider->delete();

        // Clear cache
        sliders(true);

        // Success
        $this->dispatchBrowserEvent('alert',[
            "message" => __('messages.t_slider_deleted_success'),
        ]);
    }
    
}
