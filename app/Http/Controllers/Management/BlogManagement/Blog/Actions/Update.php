<?php

namespace App\Http\Controllers\Management\BlogManagement\Blog\Actions;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;


class Update{

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
            'short_description' => ['nullable'],
            'full_description' => ['nullable'],
            'cover_image' => ['nullable'],
            'is_published' => ['boolean'],
            'publish_date' => ['nullable', 'date'],
            'seo_title' => ['nullable'],
            'seo_keyword' => ['nullable'],
            'seo_description' => ['nullable'],
            'status' => ['nullable', 'in:0,1'],
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
        $data->creator = Auth::user()->id ?? null;
        $data->short_description = request()->short_description;
        $data->full_description = request()->full_description;
        if (request()->hasFile('cover_image')) {
            if ($data->cover_image && file_exists(public_path($data->cover_image))) {
                unlink(public_path($data->cover_image));
            }

            $file = request()->file('cover_image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = 'upload/blog/' . $fileName;


            Image::make($file)
                ->fit(700, 500, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })
                ->save(public_path($filePath), 90);

            $data->cover_image = $filePath;
        }
        $data->is_published = request()->is_published ?? false;
        $data->publish_date = request()->publish_date;
        $data->seo_title = request()->seo_title;
        $data->seo_keyword = request()->seo_keyword;
        $data->seo_description = request()->seo_description;
        $data->status = request()->status ?? 1;
        $data->update();
        
        return $data;
    }
}
