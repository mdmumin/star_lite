<?php

namespace App\Http\Controllers\Management\CommonManagement\OurGoal\Actions;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class Update
{
    public static function execute($model)
    {
        try {
            // Find the page by ID
            $ourGoal = $model::find(request()->id);

            if (!$ourGoal) {
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
                'sub_title' => 'nullable',
                'short_description' => 'nullable',
                'description' => 'nullable',
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

            // Update ourGoal attributes
            $ourGoal->title = request()->title;
            $ourGoal->icon = request()->icon;
            $ourGoal->sub_title = request()->sub_title;
            $ourGoal->short_description = request()->short_description;
            $ourGoal->description = request()->description;
            $ourGoal->creator = Auth::user()->id ?? null;
            $ourGoal->save();

            return api_response(
                data: $ourGoal,
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
