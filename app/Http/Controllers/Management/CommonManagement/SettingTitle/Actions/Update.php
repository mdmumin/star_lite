<?php

namespace App\Http\Controllers\Management\CommonManagement\SettingTitle\Actions;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

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
                'title' => 'nullable',
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
            $aboutUs->title = request()->title;
            $aboutUs->slug = request()->title . '-' . rand(10000, 99999);
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
                message: 'An error occurred while updating the Setting Title',
                errors: ['exception' => [$e->getMessage()]],
            );
        }
    }
}
