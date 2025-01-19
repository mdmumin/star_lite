<?php

namespace App\Http\Controllers\Management\CommonManagement\MissionVission\Actions;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;


class Store
{

    public static function execute($model)
    {
        $validator = Validator::make(request()->all(), [
            'type' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable',
            'status' => 'nullable|in:0,1'
        ], []);

        if ($validator->fails()) {
            return api_response(
                data: [],
                code: 422,
                message: 'validation error',
                errors: $validator->errors(),
            );
        }

        $mission_vission = new $model();
        $mission_vission->type = request()->type;

        if (request()->hasFile('image')) {
            $file = request()->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = 'upload/mission_vission/' . $fileName;

            $file->move(public_path('upload/mission_vission'), $fileName);
            Image::make(public_path($filePath))
                ->resize(700, 400)->save();

            $mission_vission->image = $filePath;
        }

        $mission_vission->description = request()->description;
        $mission_vission->creator = Auth::user()->id;
        $mission_vission->status = request()->status ?? 1;
        $mission_vission->slug = request()->type . '-' . rand(90000, 100000);
        $mission_vission->save();

        return api_response(
            data: $mission_vission,
            code: 201,
            message: 'Mission&Vission created successfully',
            errors: [],
        );
    }
}
