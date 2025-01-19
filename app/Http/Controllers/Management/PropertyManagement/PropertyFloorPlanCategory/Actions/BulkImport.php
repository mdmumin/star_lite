<?php

namespace App\Http\Controllers\Management\PropertyManagement\PropertyFloorPlanCategory\Actions;

use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class BulkImport{
    public static function execute($model)
    {
        $validator = Validator::make(request()->all(), [
            'data' => ['required', 'array'],
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }
    
        foreach (request()->data as $item) {
            $item['created_at'] = $item['created_at'] ? Carbon::parse($item['created_at']) : Carbon::now()->toDateTimeString();
            $item['updated_at'] = $item['updated_at'] ? Carbon::parse($item['updated_at']) : Carbon::now()->toDateTimeString();
            $item = (object) $item;
            $check = $model::where('id', $item->id)->first();
            if (!$check) {
                try {
                    $model::create((array) $item);
                } catch (\Throwable $th) {
                    return api_response(
                        data: [],
                        code: 422,
                        message: 'validation error',
                        errors: [
                            'error' => [$th->getMessage()],
                        ],
                    );
                }
            }
        }
    
        return api_response(
            data: [],
            code: 201,
            message: 'Data imported',
            errors: [],
        );
    }

}

