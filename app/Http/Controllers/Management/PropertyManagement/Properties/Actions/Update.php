<?php

namespace App\Http\Controllers\Management\PropertyManagement\Properties\Actions;

use App\Models\Property\PropertiesPropertyCategorie;
use App\Models\Property\PropertiesPropertyLabel;
use App\Models\Property\PropertiesPropertyTag;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class Update
{

    public static function execute($model)
    {
        $property = $model::find(request()->id);

        if (!$property) {
            return api_response(
                data: [],
                code: 404,
                message: 'validation error',
                errors: ['name' => ['Data not found by given id ' . (request()->id ? request()->id : 'null')]],
            );
        }

        $rules = [
            'title' => 'required|string|max:255',
            'short_description' => 'nullable|string',
            'full_description' => 'nullable|string',
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

        
        try {
            DB::beginTransaction();
            
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
                if ($property->cover_image && file_exists(public_path($property->cover_image))) {
                    unlink(public_path($property->cover_image));
                }
    
                $file = request()->file('cover_image');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $filePath = 'upload/property/properties/' . $fileName;
    
    
                Image::make($file)
                    ->fit(700, 500, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    })
                    ->save(public_path($filePath), 90);
    
                $property->cover_image = $filePath;
            }
            $property->creator = Auth::user()->id ?? null;
            $property->status = request()->status ?? 1;
            
            // Sync property categories
            if (request()->has('property_categories_id')) {
                $property_categories_id = explode(',', request()->property_categories_id);
                $property->property_category()->sync($property_categories_id);
            }

            // Sync property tags
            if (request()->has('property_tags_id')) {
                $property_tags_id = explode(',', request()->property_tags_id);
                $property->property_tag()->sync($property_tags_id);
            }

            // Sync property labels
            if (request()->has('property_labels_id')) {
                $property_labels_id = explode(',', request()->property_labels_id);
                $property->property_label()->sync($property_labels_id);
            }


            $property->update();



            DB::commit();

            return $property;
        } catch (Exception $e) {
            DB::rollback();
            return api_response(
                data: [],
                code: 500,
                message: 'Failed to Update property',
                errors: $e->getMessage(),
            );
        }
    }
}
