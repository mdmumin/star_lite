<?php

namespace App\Http\Controllers\Management\CommonManagement\Subscriber\Actions;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;



class Store
{

    public static function execute($model)
    {
        $validator = Validator::make(request()->all(), [
            'email' => 'nullable',
            'whatsapp' => 'nullable',
            'status' => 'nullable|in:0,1',
        ], []);

        if ($validator->fails()) {
            return api_response(
                data: [],
                code: 422,
                message: 'validation error',
                errors: $validator->errors(),
            );
        }

        $aboutUs = new $model();
        $aboutUs->email = request()->email;
        $aboutUs->whatsapp = request()->whatsapp;
        $aboutUs->date = Carbon::now()->toDateString();
        $aboutUs->status = request()->input('status', 1);
        $aboutUs->creator =  Auth::user()->id;
        $aboutUs->slug = request()->email . '-' . rand(10000, 99999);
        $aboutUs->save();

        return api_response(
            data: $aboutUs,
            code: 201,
            message: 'About Us record created successfully',
            errors: [],
        );
    }
}
