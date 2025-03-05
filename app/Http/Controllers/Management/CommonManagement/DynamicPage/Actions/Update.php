<?php

namespace App\Http\Controllers\Management\CommonManagement\DynamicPage\Actions;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class Update
{
    public static function execute($model)
    {
        try {
            // Find the page by ID
            $page = $model::find(request()->id);

            if (!$page) {
                return api_response(
                    data: [],
                    code: 404,
                    message: 'Validation error',
                    errors: ['id' => ['Data not found by given ID ' . (request()->id ?? 'null')]],
                );
            }

            // Validation rules
            $rules = [
                'parent_id' => 'nullable|integer',
                'title' => 'nullable|string|max:255',
                'page_url' => 'nullable|string|max:255|unique:dynamic_pages,page_url,' . $page->id,
                'subtitle' => 'nullable|string|max:255',
                'description' => 'nullable|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'meta_title' => 'nullable|string|max:255',
                'meta_description' => 'nullable|string',
                'meta_keywords' => 'nullable|string',
                'meta_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'page_css' => 'nullable|string',
                'page_script' => 'nullable|string',
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

            // Update page attributes
            $page->parent_id = request()->parent_id ?? 0;
            $page->title = request()->title;
            $page->page_url = request()->page_url;
            $page->subtitle = request()->subtitle;
            $page->description = request()->description;
            $page->meta_title = request()->meta_title;
            $page->meta_description = request()->meta_description;
            $page->meta_keywords = request()->meta_keywords;
            $page->page_css = request()->page_css;
            $page->page_script = request()->page_script;
            $page->creator = Auth::user()->id ?? null;
            // Handle image upload
            if (request()->hasFile('image')) {
                if ($page->image && file_exists(public_path($page->image))) {
                    unlink(public_path($page->image));
                }

                $file = request()->file('image');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $filePath = 'upload/dynamic_pages/' . $fileName;

                Image::make($file)
                    ->fit(700, 500, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    })
                    ->save(public_path($filePath), 90);

                $page->image = $filePath;
            }

            // Handle meta image upload
            if (request()->hasFile('meta_image')) {
                if ($page->meta_image && file_exists(public_path($page->meta_image))) {
                    unlink(public_path($page->meta_image));
                }

                $metaFile = request()->file('meta_image');
                $metaFileName = time() . '_meta_' . $metaFile->getClientOriginalName();
                $metaFilePath = 'upload/dynamic_pages/' . $metaFileName;

                Image::make($metaFile)
                    ->fit(700, 500, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    })
                    ->save(public_path($metaFilePath), 90);

                $page->meta_image = $metaFilePath;
            }

            $page->save();

            return api_response(
                data: $page,
                code: 200,
                message: 'Dynamic page updated successfully',
                errors: [],
            );
        } catch (\Exception $e) {
            return api_response(
                data: [],
                code: 500,
                message: 'An error occurred while updating the dynamic page',
                errors: ['exception' => [$e->getMessage()]],
            );
        }
    }
}
