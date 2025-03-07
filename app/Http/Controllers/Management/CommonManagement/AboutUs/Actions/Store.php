<?php

namespace App\Http\Controllers\Management\CommonManagement\AboutUs\Actions;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;


class Store
{

    public static function execute($model)
    {
        $validator = Validator::make(request()->all(), [
            'title' => 'nullable',
            'sub_title' => 'nullable',
            'short_description' => 'nullable',
            'description' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            // 'video_thumbnail_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'video_url' => 'nullable',
            'quote_text' => 'nullable',
            'button_text' => 'nullable',
            'button_url' => 'nullable',
            'status' => 'nullable|in:0,1',
        ], []);

        if ($validator->fails()) {
            return api_response(
                data: [],
                code: 422,
                message: 'validation error',
                errors: $validator->errors(),
            );
        }

        $aboutUs = new $model();
        $aboutUs->title = request()->title;
        $aboutUs->sub_title = request()->sub_title;
        $aboutUs->short_description = request()->short_description;
        $aboutUs->description = request()->description;

        // Handle image upload
        if (request()->hasFile('image')) {
            $file = request()->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = public_path('upload/about_us/' . $fileName);

            $file->move(public_path('upload/about_us'), $fileName);
            $image = Image::make($filePath);
            $image->resize(700, 400)->save($filePath);

            $aboutUs->image = 'upload/about_us/' . $fileName;
        }

        // Handle video thumbnail image upload
        if (request()->hasFile('video_thumbnail_image')) {
            $file = request()->file('video_thumbnail_image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = public_path('upload/about_us/' . $fileName);

            $file->move(public_path('upload/about_us'), $fileName);
            $video_thumbnail_image = Image::make($filePath);
            $video_thumbnail_image->resize(700, 400)->save($filePath);

            $aboutUs->video_thumbnail_image = 'upload/about_us/' . $fileName;
        }

        $aboutUs->video_url = request()->video_url;
        $aboutUs->quote_text = request()->quote_text;
        $aboutUs->button_text = request()->button_text;
        $aboutUs->button_url = request()->button_url;
        $aboutUs->creator = Auth::user()->id ?? null;
        $aboutUs->status = request()->status ?? 1;
        $aboutUs->slug = request()->title . '-' . rand(10000, 90000);
        $aboutUs->save();

        return api_response(
            data: $aboutUs,
            code: 201,
            message: 'About Us record created successfully',
            errors: [],
        );
    }
}
