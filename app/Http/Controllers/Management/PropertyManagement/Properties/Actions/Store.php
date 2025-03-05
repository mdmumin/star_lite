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


class Store
{

    public static function execute($model)
    {


        // dd(request()->property_categories_id);


     
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
            'is_closed' => 'nullable|boolean'
        ], []);

        if ($validator->fails()) {
            return api_response(
                data: [],
                code: 422,
                message: 'validation error',
                errors: $validator->errors(),
            );
        }
        DB::beginTransaction();

        try {
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

            $property->creator = Auth::user()->id ?? null;
            $property->slug = request()->title . '-' . rand(90000, 100000);
            $property->status = request()->status ?? 1;
            $property->save();
            // Save property category property
            // $propertyCategoryProperty = new PropertiesPropertyCategorie();
            // $propertyCategoryProperty->properties_id = $property->id;
            // $propertyCategoryProperty->property_categories_id = request()->property_categories_id;
            // $propertyCategoryProperty->save();
            $property_categories_id= explode(',',request()->property_categories_id);
            $property->property_category()->attach($property_categories_id);


            // Save property tag property
            // $propertyTagProperty = new PropertiesPropertyTag();
            // $propertyTagProperty->properties_id = $property->id;
            // $propertyTagProperty->property_tags_id = request()->property_tags_id;
            // $propertyTagProperty->save();
            $property_tags_id= explode(',',request()->property_tags_id);
            $property->property_tag()->attach($property_tags_id);

            // Save property label property
            // $propertyLabelProperty = new PropertiesPropertyLabel();
            // $propertyLabelProperty->properties_id = $property->id;
            // $propertyLabelProperty->property_labels_id = request()->property_labels_id;
            // $propertyLabelProperty->save();
            // $property->property_label()->attach(request()->property_labels_id);

            $property_labels_id= explode(',',request()->property_labels_id);
            $property->property_label()->attach($property_labels_id);

            DB::commit();
            return api_response(
                data: $property,
                code: 201,
                message: 'Data created successfully',
                errors: [],
            );
        } catch (Exception $e) {
            DB::rollback();
            return api_response(
                data: [],
                code: 500,
                message: 'Failed to create property',
                errors: $e->getMessage(),
            );
        }
    }
}
