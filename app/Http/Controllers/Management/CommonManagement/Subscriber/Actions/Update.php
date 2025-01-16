<?php

namespace App\Http\Controllers\Management\CommonManagement\Subscriber\Actions;

use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class Update
{
    public static function execute($model)
    {
        try {
            // Find the page by ID
            $aboutUs = $model::find(request()->id);

            if (!$aboutUs) {
                return api_response(
                    data: [],
                    code: 404,
                    message: 'Validation error',
                    errors: ['id' => ['Data not found by given ID ' . (request()->id ?? 'null')]],
                );
            }

            // Validation rules
            $rules = [
                'email' => 'nullable',
                'whatsapp' => 'nullable',
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

            // Update aboutUs attributes
            $aboutUs->email = request()->email;
            $aboutUs->whatsapp = request()->whatsapp;
            $aboutUs->date = Carbon::now()->toDateString();
            $aboutUs->slug = request()->email . '-' . rand(10000, 99999);
            $aboutUs->status = request()->status ?? 1;
            $aboutUs->save();

            return api_response(
                data: $aboutUs,
                code: 200,
                message: 'A bout Us updated successfully',
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
