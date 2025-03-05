<?php

namespace App\Http\Controllers\Management\CommonManagement\ContactMessageReplies\Actions;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;


class Store
{

    public static function execute($model)
    {
        $validator = Validator::make(request()->all(), [
            'contact_message_id' => 'nullable',
            'subject' => 'nullable',
            'message' => 'nullable',
            'is_seen' => 'nullable',
        ], []);

        if ($validator->fails()) {
            return api_response(
                data: [],
                code: 422,
                message: 'validation error',
                errors: $validator->errors(),
            );
        }

        $contactMessage = new $model();
        $contactMessage->contact_message_id = request()->contact_message_id;
        $contactMessage->subject = request()->subject;
        $contactMessage->message = request()->message;
        $contactMessage->is_seen = false;
        $contactMessage->status = request()->input('status', 1);
        $contactMessage->creator =  Auth::user()->id ?? null;
        $contactMessage->slug = request()->subject . '-' . rand(10000, 99999);
        $contactMessage->save();

        return api_response(
            data: $contactMessage,
            code: 201,
            message: 'Contact Message created successfully',
            errors: [],
        );
    }
}
