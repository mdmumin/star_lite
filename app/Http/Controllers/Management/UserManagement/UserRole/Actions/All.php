<?php

namespace App\Http\Controllers\Management\UserManagement\UserRole\Actions;

use App\Models\BlogManagement\BlogCategories;

class All{

  
    public static function execute($model)
    {

        $paginate = request()->paginate ?? 10;
        // dd(  $paginate,(int) request()->paginate );
        $orderBy = request()->orderBy ?? 'id';
        $orderByType = request()->orderByType ?? 'ASC';

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
