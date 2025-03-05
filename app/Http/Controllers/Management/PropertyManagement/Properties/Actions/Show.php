<?php

namespace App\Http\Controllers\Management\PropertyManagement\Properties\Actions;

class Show
{
    public static function execute($model, $id)
    {
        $with = [ 'user_creator','property_category', 'property_tag', 'property_label'];

        $data = $model::where('id', $id)->with($with)->first();
        if (!$data) {
            return api_response(
                [],
                404,
                'data not found',
                [
                    'data' => [
                        'data not found',
                        'data not associated with given id'
                    ]
                ]
            );
        }
        $data->property_category_ids = $data->property_category->pluck('id')->toArray();
        $data->property_tag_ids = $data->property_tag->pluck('id')->toArray();
        $data->property_label_ids = $data->property_label->pluck('id')->toArray();
        
        return api_response(data: $data, code: 200, message: 'data found', errors: []);
    }
}