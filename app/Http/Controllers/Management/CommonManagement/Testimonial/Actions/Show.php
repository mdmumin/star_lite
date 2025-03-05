<?php

namespace App\Http\Controllers\Management\CommonManagement\Testimonial\Actions;

class Show{

  public static function execute($model, $id)
    {
        $with = ['user_creator'];
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
        return api_response(data: $data, code: 200, message: 'data found', errors: []);
    }

}
