<?php

namespace App\Http\Controllers\Management\CommonManagement\MissionVission\Actions;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class Update
{
    public static function execute($model)
    {
        try {
            // Find the team member by ID
            $mission_vission = $model::find(request()->id);

            if (!$mission_vission) {
                return api_response(
                    data: [],
                    code: 404,
                    message: 'Validation error',
                    errors: ['id' => ['Data not found by given ID ' . (request()->id ?? 'null')]],
                );
            }


            $rules = [
                'type' => 'required',
                // 'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
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

            $mission_vission->type = request()->type;
            // Handle image upload
            if (request()->hasFile('image')) {
                if ($mission_vission->image && file_exists(public_path($mission_vission->image))) {
                    unlink(public_path($mission_vission->image));
                }

                $file = request()->file('image');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $filePath = 'upload/mission_vission/' . $fileName;

                Image::make($file)
                    ->fit(700, 500, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    })
                    ->save(public_path($filePath), 90);

                $mission_vission->image = $filePath;
            }

            $mission_vission->description = request()->description;
            $mission_vission->creator = Auth::user()->id ?? null;
            $mission_vission->slug = request()->type . '-' . rand(10000, 99999);

            $mission_vission->save();

            return api_response(
                data: $mission_vission,
                code: 200,
                message: 'Mission Vission updated successfully',
                errors: [],
            );
        } catch (\Exception $e) {
            return api_response(
                data: [],
                code: 500,
                message: 'An error occurred while updating the Mission&Vission',
                errors: ['exception' => [$e->getMessage()]],
            );
        }
    }
}
