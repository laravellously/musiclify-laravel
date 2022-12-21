<?php

namespace App\Http\Validators\Admin\Settings;

use Illuminate\Support\Facades\Validator;

class PublishValidator
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
                'auto_approve_gigs'      => 'boolean',
                'auto_approve_portfolio' => 'boolean',
                'max_tags'               => 'required|integer',
                'is_video_enabled'       => 'boolean',
                'is_documents_enabled'   => 'boolean',
                'max_documents'          => 'required|integer',
                'max_document_size'      => 'required|integer',
                'max_images'             => 'required|integer',
                'max_image_size'         => 'required|integer',
            ];

            // Set errors messages
            $messages = [
                'auto_approve_gigs.boolean'      => __('messages.t_validator_boolean'),
                'auto_approve_portfolio.boolean' => __('messages.t_validator_boolean'),
                'max_tags.required'              => __('messages.t_validator_required'),
                'max_tags.integer'               => __('messages.t_validator_integer'),
                'is_video_enabled.boolean'       => __('messages.t_validator_boolean'),
                'is_documents_enabled.boolean'   => __('messages.t_validator_boolean'),
                'max_documents.required'         => __('messages.t_validator_required'),
                'max_documents.integer'          => __('messages.t_validator_integer'),
                'max_document_size.required'     => __('messages.t_validator_required'),
                'max_document_size.integer'      => __('messages.t_validator_integer'),
                'max_images.required'            => __('messages.t_validator_required'),
                'max_images.integer'             => __('messages.t_validator_integer'),
                'max_image_size.required'        => __('messages.t_validator_required'),
                'max_image_size.integer'         => __('messages.t_validator_integer')
            ];

            // Set data to validate
            $data     = [
                'auto_approve_gigs'      => $request->auto_approve_gigs,
                'auto_approve_portfolio' => $request->auto_approve_portfolio,
                'max_tags'               => $request->max_tags,
                'is_video_enabled'       => $request->is_video_enabled,
                'is_documents_enabled'   => $request->is_documents_enabled,
                'max_documents'          => $request->max_documents,
                'max_document_size'      => $request->max_document_size,
                'max_images'             => $request->max_images,
                'max_image_size'         => $request->max_image_size
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
