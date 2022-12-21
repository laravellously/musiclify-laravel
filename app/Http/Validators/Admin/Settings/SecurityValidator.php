<?php

namespace App\Http\Validators\Admin\Settings;

use Illuminate\Support\Facades\Validator;

class SecurityValidator
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
                'is_recaptcha'  => 'boolean'
            ];

            // Set errors messages
            $messages = [
                'is_recaptcha.boolean' => __('messages.t_validator_boolean'),
            ];

            // Set data to validate
            $data     = [
                'is_recaptcha' => $request->is_recaptcha
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
