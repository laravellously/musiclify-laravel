<?php

namespace App\Http\Validators\Admin\Settings;

use Illuminate\Support\Facades\Validator;

class AppearanceValidator
{
    
    /**
     * Validate form
     *
     * @param object $request
     * @return void
     */
    static function validate($request)
    {
        try {

            // Set rules
            $rules    = [
                'primary_color'          => 'required|regex:/^#[a-f0-9]{6}$/i',
                'is_dark_mode'           => 'boolean',
                'font_link'              => 'required',
                'font_family'            => 'required|max:60',
                'logo_desktop_height'    => 'required|numeric',
                'is_sliders'             => 'boolean',
                'is_featured_categories' => 'boolean',
                'is_best_sellers'        => 'boolean',
            ];

            // Set errors messages
            $messages = [
                'primary_color.required'         => __('messages.t_validator_required'),
                'primary_color.regex'            => __('messages.t_validator_hex_color'),
                'is_dark_mode.boolean'           => __('messages.t_validator_boolean'),
                'font_link.required'             => __('messages.t_validator_required'),
                'font_family.required'           => __('messages.t_validator_required'),
                'font_family.max'                => __('messages.t_validator_max', ['max' => 60]),
                'logo_desktop_height.required'   => __('messages.t_validator_required'),
                'logo_desktop_height.numeric'    => __('messages.t_validator_numeric'),
                'is_sliders.boolean'             => __('messages.t_validator_boolean'),
                'is_featured_categories.boolean' => __('messages.t_validator_boolean'),
                'is_best_sellers.boolean'        => __('messages.t_validator_boolean')

            ];

            // Set data to validate
            $data     = [
                'primary_color'          => $request->primary_color,
                'is_dark_mode'           => $request->is_dark_mode,
                'font_link'              => $request->font_link,
                'font_family'            => $request->font_family,
                'logo_desktop_height'    => $request->logo_desktop_height,
                'is_sliders'             => $request->is_sliders,
                'is_featured_categories' => $request->is_featured_categories,
                'is_best_sellers'        => $request->is_best_sellers,
            ];

            // Validate data
            Validator::make($data, $rules, $messages)->validate();

            // Reset validation
            $request->resetValidation();

        } catch (\Throwable $th) {
            throw $th;
        }
    }

}
