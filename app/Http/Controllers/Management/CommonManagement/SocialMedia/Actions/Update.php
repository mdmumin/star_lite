<?php

namespace App\Http\Controllers\Management\CommonManagement\SocialMedia\Actions;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class Update
{
    public static function execute($model)
    {
        try {
            // Find the team member by ID
            $glance = $model::find(request()->id);

            if (!$glance) {
                return api_response(
                    data: [],
                    code: 404,
                    message: 'Validation error',
                    errors: ['id' => ['Data not found by given ID ' . (request()->id ?? 'null')]],
                );
            }


            $rules = [
                'title' => 'nullable',
                'icon' => 'nullable',
                'url' => 'nullable',
                'status' => 'nullable|in:0,1'
            ];

            $validator = Validator::make(request()->all(), $rules);

            if ($validator->fails()) {
                return api_response(
                    data: [],
                    code: 422,
                    message: 'Validation error',
                    errors: $validator->errors(),
                );
            }

            $glance->title = request()->title;
            $glance->icon = request()->icon;
            $glance->url = request()->url;
            $glance->creator = $glance->creator ?? Auth::user()->id;
            $glance->status = request()->status ?? 1;
            $glance->slug = request()->title . '-' . rand(10000, 99999);
            $glance->save();

            return api_response(
                data: $glance,
                code: 200,
                message: 'Social Media updated successfully',
                errors: [],
            );

        } catch (\Exception $e) {
            return api_response(
                data: [],
                code: 500,
                message: 'An error occurred while updating the Social Media',
                errors: ['exception' => [$e->getMessage()]],
            );
        }
    }
}
