<?php

namespace App\Http\Controllers\Management\CommonManagement\ContactMessageReplies\Actions;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class Update
{
    public static function execute($model)
    {
        try {
            // Find the page by ID
            $contactMessage = $model::find(request()->id);

            if (!$contactMessage) {
                return api_response(
                    data: [],
                    code: 404,
                    message: 'Validation error',
                    errors: ['id' => ['Data not found by given ID ' . (request()->id ?? 'null')]],
                );
            }

            // Validation rules
            $rules = [
                'contact_message_id' => 'nullable',
                'subject' => 'nullable',
                'message' => 'nullable',
                'is_seen' => 'nullable',
            ];

            // Validate the request data
            $validator = Validator::make(request()->all(), $rules);

            if ($validator->fails()) {
                return api_response(
                    data: [],
                    code: 422,
                    message: 'Validation error',
                    errors: $validator->errors(),
                );
            }

            // Update contactMessage attributes
            $$contactMessage->contact_message_id = request()->contact_message_id;
            $contactMessage->subject = request()->subject;
            $contactMessage->message = request()->message;
            $contactMessage->is_seen = false;
            $contactMessage->status = request()->input('status', 1);
            $contactMessage->creator =  Auth::user()->id;
            $contactMessage->slug = request()->name . '-' . rand(10000, 99999);
            $contactMessage->save();

            return api_response(
                data: $contactMessage,
                code: 200,
                message: 'Contact Message updated successfully',
                errors: [],
            );
        } catch (\Exception $e) {
            return api_response(
                data: [],
                code: 500,
                message: 'An error occurred while updating the about Us',
                errors: ['exception' => [$e->getMessage()]],
            );
        }
    }
}
