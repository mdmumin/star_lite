<?php

namespace App\Http\Controllers\Management\CommonManagement\AboutUs\Actions;

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
                'sub_title' => 'nullable',
                'short_description' => 'nullable',
                'description' => 'nullable',
                // 'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                // 'video_thumbnail_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                // 'video_url' => 'nullable',
                'quote_text' => 'nullable',
                'button_text' => 'nullable',
                // 'button_url' => 'nullable',
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
            $aboutUs->sub_title = request()->sub_title;
            $aboutUs->short_description = request()->short_description;
            $aboutUs->description = request()->description;

            // Handle image upload
            if (request()->hasFile('image')) {
                if ($aboutUs->image && file_exists(public_path($aboutUs->image))) {
                    unlink(public_path($aboutUs->image));
                }

                $file = request()->file('image');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $filePath = 'upload/about_us/' . $fileName;


                Image::make($file)
                    ->fit(700, 500, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    })
                    ->save(public_path($filePath), 90);

                $aboutUs->image = $filePath;
            }

            // Handle video thumbnail image upload

            if (request()->hasFile('video_thumbnail_image')) {
                if ($aboutUs->video_thumbnail_image && file_exists(public_path($aboutUs->video_thumbnail_image))) {
                    unlink(public_path($aboutUs->video_thumbnail_image));
                }

                $file = request()->file('video_thumbnail_image');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $filePath = 'upload/about_us/' . $fileName;


                Image::make($file)
                    ->fit(700, 500, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    })
                    ->save(public_path($filePath), 90);

                $aboutUs->video_thumbnail_image = $filePath;
            }

            $aboutUs->video_url = request()->video_url;
            $aboutUs->quote_text = request()->quote_text;
            $aboutUs->button_text = request()->button_text;
            $aboutUs->button_url = request()->button_url;
            $aboutUs->creator = Auth::user()->id ?? null;
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
                message: 'An error occurred while updating the about Us',
                errors: ['exception' => [$e->getMessage()]],
            );
        }
    }
}
