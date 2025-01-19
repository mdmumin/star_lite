<?php

namespace App\Http\Controllers\Management\PropertyManagement\Properties\Actions;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;


class Store
{

    public static function execute($model)
    {
        $validator = Validator::make(request()->all(), [
            'title' => 'required|string|max:255',
            'short_description' => 'nullable|string',
            'full_description' => 'nullable|string',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'publish_date' => 'nullable|date',
            'seo_title' => 'nullable|string|max:255',
            'seo_keyword' => 'nullable|string|max:255',
            'seo_description' => 'nullable|string',
            'total_plot' => 'nullable|integer',
            'total_flat' => 'nullable|integer',
            'total_plot_sold' => 'nullable|integer',
            'total_flat_sold' => 'nullable|integer',
            'available_text' => 'nullable|string',
            'is_published' => 'nullable|boolean',
            'is_closed' => 'nullable|boolean',
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

        $property = new $model();
        $property->title = request()->input('title');
        $property->short_description = request()->input('short_description');
        $property->full_description = request()->input('full_description');
        $property->is_published = request()->input('is_published', false);
        $property->publish_date = request()->input('publish_date');
        $property->seo_title = request()->input('seo_title');
        $property->seo_keyword = request()->input('seo_keyword');
        $property->seo_description = request()->input('seo_description');
        $property->is_closed = request()->input('is_closed', false);
        $property->total_plot = request()->input('total_plot');
        $property->total_flat = request()->input('total_flat');
        $property->total_plot_sold = request()->input('total_plot_sold');
        $property->total_flat_sold = request()->input('total_flat_sold');
        $property->available_text = request()->input('available_text');
        // Handle cover_image upload
        if (request()->hasFile('cover_image')) {
            $file = request()->file('cover_image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = public_path('upload/property/properties/' . $fileName);

            // Save and resize the cover_image
            $file->move(public_path('upload/property/properties'), $fileName);
            $cover_image = Image::make($filePath);
            $cover_image->resize(700, 400)->save($filePath);

            $property->cover_image = 'upload/property/properties/' . $fileName;
        }

        $property->creator = Auth::user()->id;
        $property->slug = request()->title . '-' . rand(90000, 100000);
        $property->status = request()->status ?? 1;
        $property->save();

        return api_response(
            data: $property,
            code: 201,
            message: 'data created',
            errors: [],
        );
    }
}
