<?php

namespace App\Http\Controllers\Management\BlogManagement\Blog\Actions;

use App\Models\BlogManagement\BlogCategories;

class All{

  
    public static function execute($model)
    {

        $paginate = (int) request()->paginate ?? 10;
        $orderBy = request()->orderBy ?? 'id';
        $orderByType = request()->orderByType ?? 'DESC';

        $status = 1;
        if (request()->has('status')) {
            $status = request()->status;
        }

        // $boogCategry = BlogCategories::get();


        $query = $model::where('status', $status)->orderBy($orderBy, $orderByType);

        if (request()->has('search_key')) {
            $key = request()->search_key;
            $query->where(function ($q) use ($key) {
                return $q->where('id', $key)
                    ->orWhere('title', $key)
                    ->orWhere('title', 'LIKE', '%' . $key . '%')
                    ->orWhere('created_at', 'LIKE', '%' . $key . '%')
                    ->orWhere('updated_at', 'LIKE', '%' . $key . '%')
                    ->orWhere('status', 'LIKE', '%' . $key . '%');
            });
        }

        $data = $query->paginate($paginate);

        // $data = [
        //     'data' => $data,
        //     'blogcategory' => $boogCategry
        // ];

        return api_response(data: $data, code: 200, message: 'data fetched', errors: []);;
    }
}
