<?php

namespace App\Http\Controllers\Management\BlogManagement\BlogCategory\Actions;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class Update
{

    public static function execute($model)
    {
        $data = $model::find(request()->id);

        if (!$data) {
            return api_response(
                data: [],
                code: 404,
                message: 'validation error',
                errors: ['name' => ['Data not found by given id ' . (request()->id ? request()->id : 'null')]],
            );
        }

        $rules = [
            'title' => ['required'],
            'image' => ['nullable']
        ];

        $validator = Validator::make(request()->all(), $rules, []);

        if ($validator->fails()) {
            return api_response(
                data: [],
                code: 422,
                message: 'validation error',
                errors: $validator->errors(),
            );
        }

        $data->title = request()->title;
        if (request()->hasFile('image')) {

            if (!empty($user->image) && file_exists(public_path($data->image))) {
                unlink(public_path($data->image));
            }


            $file = request()->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = 'upload/blog/' . $fileName;


            Image::make($file)
                ->fit(700, 500, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })
                ->save(public_path($filePath), 100);
            $data->image = $filePath;
        }
        $data->creator = Auth::user()->id ?? null;
        $data->status = request()->status ?? 1;
        $data->update();
        
        return $data;
    }
}
