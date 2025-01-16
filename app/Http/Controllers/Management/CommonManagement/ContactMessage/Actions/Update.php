<?php

namespace App\Http\Controllers\Management\CommonManagement\ContactMessage\Actions;

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
                'property_id' => 'nullable|integer|exists:properties,id',
                'name' => 'required',
                'email' => ['required', 'email', 'max:100', 'unique:teams,email,' . $contactMessage->id],
                'profession' => 'nullable',
                'subject' => 'nullable',
                'contact_number' => 'required',
                'message' => 'required',
                'is_seen' => 'nullable',
                'is_replide' => 'nullable',
                'ip' => 'nullable',
                'location' => 'nullable',
                'status' => 'nullable|in:0,1',
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
