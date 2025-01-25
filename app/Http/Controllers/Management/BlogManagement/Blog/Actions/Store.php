<?php

namespace App\Http\Controllers\Management\BlogManagement\Blog\Actions;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class Store
{

    public static function execute($model)
    {
        // dd(request()->all());
        $validator = Validator::make(request()->all(), [
            'title' => ['required'],
            'short_description' => ['required'],
            'full_description' => ['nullable'],
            'cover_image' => ['nullable'],
            'is_published' => ['boolean'],
            'publish_date' => ['nullable', 'date'],
            'slug' => ['nullable'],
            'seo_title' => ['nullable'],
            'seo_keyword' => ['nullable'],
            'seo_description' => ['nullable'],
            'status' => ['nullable', 'in:0,1'],
        ], []);

        if ($validator->fails()) {
            return api_response(
                data: [],
                code: 422,
                message: 'validation error',
                errors: $validator->errors(),
            );
        }

        $data = new $model();
        $data->title = request()->title;
        $data->creator = Auth::user()->id ?? null;
        $data->short_description = request()->short_description;
        $data->full_description = request()->full_description;
        $data->is_published = request()->is_published ?? false;
        $data->publish_date = request()->publish_date;
        $data->slug = request()->slug;
        $data->seo_title = request()->seo_title;
        $data->seo_keyword = request()->seo_keyword;
        $data->seo_description = request()->seo_description;
        $data->status = request()->status ?? 1;
        $data->slug = request()->title . '-' . rand(90000, 100000);

        if (request()->hasFile('cover_image')) {
            $file = request()->file('cover_image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = public_path('upload/blog/' . $fileName);

            $file->move(public_path('upload/blog'), $fileName);
            $coverImage = Image::make($filePath);
            $coverImage->resize(700, 400)->save($filePath);

            $data->cover_image = 'upload/blog/' . $fileName;
        }

        $data->save();

        return api_response(
            data: $data,
            code: 201,
            message: 'data created',
            errors: [],
        );
    }
}
