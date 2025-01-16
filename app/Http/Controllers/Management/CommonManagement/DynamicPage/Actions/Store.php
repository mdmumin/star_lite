<?php

namespace App\Http\Controllers\Management\CommonManagement\DynamicPage\Actions;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;


class Store
{

    public static function execute($model)
    {
        $validator = Validator::make(request()->all(), [
            'parent_id' => 'nullable',
            'title' => 'nullable',
            'page_url' => 'required',
            'subtitle' => 'nullable',
            'description' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'meta_title' => 'nullable',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
            'meta_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'page_css' => 'nullable|string',
            'page_script' => 'nullable|string',
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

        $page = new $model();
        $page->parent_id = request()->input('parent_id', 0);
        $page->title = request()->input('title');
        $page->page_url = request()->input('page_url');
        $page->subtitle = request()->input('subtitle');
        $page->description = request()->input('description');
        $page->meta_title = request()->input('meta_title');
        $page->meta_description = request()->input('meta_description');
        $page->meta_keywords = request()->input('meta_keywords');
        $page->page_css = request()->input('page_css');
        $page->page_script = request()->input('page_script');
        $page->status = request()->input('status', 1);
        $page->creator =  Auth::user()->id;
        $page->slug = request()->title . '-' . rand(10000, 99999);

        if (request()->hasFile('image')) {
            $file = request()->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = 'upload/dynamic_pages/' . $fileName;

            $file->move(public_path('upload/dynamic_pages'), $fileName);
            Image::make(public_path($filePath))
                ->resize(700, 400)->save();

            $page->image = $filePath;
        }

        if (request()->hasFile('meta_image')) {
            $metaFile = request()->file('meta_image');
            $metaFileName = time() . '_meta_' . $metaFile->getClientOriginalName();
            $metaFilePath = 'upload/dynamic_pages/' . $metaFileName;

            $metaFile->move(public_path('upload/dynamic_pages'), $metaFileName);
            Image::make(public_path($metaFilePath))
                ->resize(700, 400)->save();

            $page->meta_image = $metaFilePath;
        }

        $page->save();

        return api_response(
            data: $page,
            code: 201,
            message: 'Team member created successfully',
            errors: [],
        );
    }
}
