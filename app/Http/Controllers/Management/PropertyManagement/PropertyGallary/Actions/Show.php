<?php

namespace App\Http\Controllers\Management\PropertyManagement\PropertyGallary\Actions;

class Show{

  public static function execute($model, $id)
    {
        $data = $model::where('id', $id)->first();
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
        return api_response(data: $data, code: 200, message: 'data found', errors: []);
    }

}
