<?php

namespace App\Http\Controllers\Management\BlogManagement\BlogCategory\Actions;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;


class Store{
    
    public static function execute($model)
    {
        $validator = Validator::make(request()->all(), [
            'title' => ['required'],
            'image' => ['nullable'],
        ], []);
    
        if ($validator->fails()) {
            return api_response(
                data: [],
                code: 422,
                message: 'validation error',
                errors: $validator->errors(),
            );
        }
    
        $data = new $model();
        $data->title = request()->title;
        $data->creator = Auth::user()->id;
        $data->slug = request()->title .'-'.rand(90000,100000);
        $data->status = request()->status ?? 1;


        if (request()->hasFile('image')) {
            $file = request()->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('upload/blog'), $fileName);
            $image = Image::make(public_path('upload/blog/' . $fileName));
            $image->resize(300, 200);
            $image->save(public_path('upload/blog/' . $fileName));
            $data->image = 'upload/blog/' . $fileName;
            $data->save();
        }

        $data->save();
    
        return api_response(
            data: $data,
            code: 201,
            message: 'data created',
            errors: [],
        );
    }
}
