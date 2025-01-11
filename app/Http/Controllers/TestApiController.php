<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\BlogManagement\BlogCategories as BlogCategory;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class TestApiController extends Controller
{
    public $model;

    public function __construct()
    {
        $this->model = BlogCategory::class;
    }

    public function all()
    {
        $paginate = (int) request()->paginate ?? 10;
        $orderBy = request()->orderBy ?? 'id';
        $orderByType = request()->orderByType ?? 'DESC';

        $status = 1;
        if (request()->has('status')) {
            $status = request()->status;
        }

        $query = $this->model::where('status', $status)->orderBy($orderBy, $orderByType);

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

        return api_response(data: $data, code: 200, message: 'data fetched', errors: []);
    }

    public function show($id)
    {
        $data = $this->model::where('id', $id)->first();
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

    public function store()
    {
        $validator = Validator::make(request()->all(), [
            'title' => ['required'],
        ], []);

        if ($validator->fails()) {
            return api_response(
                data: [],
                code: 422,
                message: 'validation error',
                errors: $validator->errors(),
            );
        }

        $data = new $this->model();
        $data->title = request()->title;
        $data->save();

        return api_response(
            data: $data,
            code: 201,
            message: 'data created',
            errors: [],
        );
    }

    public function update()
    {
        $data = $this->model::find(request()->id);

        if (!$data) {
            return api_response(
                data: [],
                code: 404,
                message: 'validation error',
                errors: ['name' => ['Data not found by given id ' . (request()->id ? request()->id : 'null')]],
            );
        }

        $rules = [
            'id' => ['required'],
            'title' => ['required'],
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

        $data->title = request()->title;
        $data->save();

        return api_response(
            data: $data,
            code: 201,
            message: 'data updated',
            errors: [],
        );
    }

    public function soft_delete()
    {
        $data = $this->model::find(request()->id);

        if (!$data) {
            return api_response(
                data: [],
                code: 404,
                message: 'validation error',
                errors: ['name' => ['Data not found by given id ' . (request()->id ? request()->id : 'null')]],
            );
        }

        $data->status = 0;
        $data->save();

        return api_response(
            data: $data,
            code: 201,
            message: 'data deactivated',
            errors: [],
        );
    }

    public function restore()
    {
        $data = $this->model::find(request()->id);

        if (!$data) {
            return api_response(
                data: [],
                code: 404,
                message: 'validation error',
                errors: ['name' => ['Data not found by given id ' . (request()->id ? request()->id : 'null')]],
            );
        }

        $data->status = 1;
        $data->save();

        return api_response(
            data: $data,
            code: 201,
            message: 'Data restored',
            errors: [],
        );
    }

    public function destroy()
    {
        $data = $this->model::find(request()->id);

        if (!$data) {
            return api_response(
                data: [],
                code: 404,
                message: 'Data not found',
                errors: ['name' => ['Data not found by given id ' . (request()->id ? request()->id : 'null')]],
            );
        }

        if ($data) {
            $data->delete();
            return api_response(
                data: [],
                code: 201,
                message: 'Data deleted permanently',
                errors: [],
            );
        }
    }


    public function bulk_import()
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
            $check = $this->model::where('id', $item->id)->first();
            if (!$check) {
                try {
                    $this->model::create((array) $item);
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
