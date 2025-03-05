<?php

namespace App\Http\Controllers\Management\CommonManagement\AboutUsPoint\Actions;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class Update
{
    public static function execute($model)
    {
        try {
            // Find the team member by ID
            $aboutUsPoint = $model::find(request()->id);

            if (!$aboutUsPoint) {
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
                'description' => 'nullable',
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

            $aboutUsPoint->title = request()->title;
            $aboutUsPoint->icon = request()->icon;
            $aboutUsPoint->description = request()->description;
            $aboutUsPoint->creator = Auth::user()->id ?? null;
            $aboutUsPoint->status = request()->status ?? 1;
            $aboutUsPoint->slug = request()->title . '-' . rand(10000, 99999);
            $aboutUsPoint->save();

            return api_response(
                data: $aboutUsPoint,
                code: 200,
                message: 'About Us Point updated successfully',
                errors: [],
            );

        } catch (\Exception $e) {
            return api_response(
                data: [],
                code: 500,
                message: 'An error occurred while updating the Glance',
                errors: ['exception' => [$e->getMessage()]],
            );
        }
    }
}
