<?php

namespace App\Http\Controllers\Management\PropertyManagement\Properties\Actions;

use App\Models\Property\PropertiesPropertyCategorie;
use App\Models\Property\PropertiesPropertyLabel;
use App\Models\Property\PropertiesPropertyTag;
use Illuminate\Support\Facades\DB;

class Destroy{
    
    public static function execute($model){
        try {
            DB::beginTransaction(); // Start transaction
        
            $data = $model::find(request()->id);
        
            if (!$data) {
                return api_response(
                    data: [],
                    code: 404,
                    message: 'Data not found',
                    errors: ['name' => ['Data not found by given id ' . (request()->id ? request()->id : 'null')]],
                );
            }
        
            // Delete related records
            PropertiesPropertyCategorie::where("properties_id", request()->id)->delete();
            PropertiesPropertyTag::where("properties_id", request()->id)->delete();
            PropertiesPropertyLabel::where("properties_id", request()->id)->delete();
        
            $data->delete(); // Delete main record
        
            DB::commit(); // Commit transaction
        
            return api_response(
                data: [],
                code: 201,
                message: 'Data deleted permanently',
                errors: [],
            );
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback if any error occurs
        
            return api_response(
                data: [],
                code: 500,
                message: 'Failed to delete data',
                errors: ['error' => [$e->getMessage()]],
            );
        }
    }

}
