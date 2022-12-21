<?php

namespace App\Http\Validators\Admin\Newsletter;

use Illuminate\Support\Facades\Validator;

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
                'is_enabled'  => 'boolean'
            ];

            // Set errors messages
            $messages = [
                'is_enabled.boolean' => __('messages.t_validator_boolean'),
            ];

            // Set data to validate
            $data     = [
                'is_enabled' => $request->is_enabled
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
