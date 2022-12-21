<?php

namespace App\Http\Validators\Admin\Languages;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class EditValidator
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
                'name'          => ['required', 'max:60', Rule::unique('languages')->ignore($request->language->id)],
                'country_code'  => 'required|max:2',
                'is_active'     => 'boolean',
                'force_rtl'     => 'boolean'
            ];

            // Set errors messages
            $messages = [
                'name.required'          => __('messages.t_validator_required'),
                'name.max'               => __('messages.t_validator_max', ['max' => 60]),
                'name.unique'            => __('messages.t_validator_unique'),
                'country_code.required'  => __('messages.t_validator_required'),
                'country_code.max'       => __('messages.t_validator_max', ['max' => 2]),
                'is_active.boolean'      => __('messages.t_validator_boolean'),
                'force_rtl.boolean'      => __('messages.t_validator_boolean')
            ];

            // Set data to validate
            $data     = [
                'name'          => $request->name,
                'country_code'  => $request->country_code,
                'is_active'     => $request->is_active,
                'force_rtl'     => $request->force_rtl
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
