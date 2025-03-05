<?php

namespace App\Http\Controllers\Management\CommonManagement\ContactMessage\Actions;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;


class Store
{

    public static function execute($model)
    {
        $validator = Validator::make(request()->all(), [
            'property_id' => 'nullable|integer|exists:properties,id',
            'name' => 'required',
            'email' => 'required|email',
            'profession' => 'nullable',
            'subject' => 'nullable',
            'contact_number' => 'required',
            'message' => 'required',
            'is_seen' => 'nullable',
            'is_replide' => 'nullable',
            'ip' => 'nullable',
            'location' => 'nullable',
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
        $contactMessage->property_id = request()->property_id;
        $contactMessage->name = request()->name;
        $contactMessage->email = request()->email;
        $contactMessage->profession = request()->profession;
        $contactMessage->subject = request()->subject;
        $contactMessage->contact_number = request()->contact_number;
        $contactMessage->message = request()->message;
        $contactMessage->is_seen = false;
        $contactMessage->is_replied = false;
        $contactMessage->ip = request()->ip();
        $contactMessage->location = request()->location;
        $contactMessage->status = request()->input('status', 1);
        $contactMessage->creator =  Auth::user()->id ?? null;
        $contactMessage->slug = request()->name . '-' . rand(10000, 99999);
        $contactMessage->save();

        return api_response(
            data: $contactMessage,
            code: 201,
            message: 'Contact Message created successfully',
            errors: [],
        );
    }
}
