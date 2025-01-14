<?php

namespace App\Http\Controllers\Management\BlogManagement\BlogLike;

use App\Http\Controllers\Controller as MainController;
use App\Models\BlogManagement\BlogLikes as BlogLike;

use App\Http\Controllers\Management\BlogManagement\BlogLike\Actions\All;
use App\Http\Controllers\Management\BlogManagement\BlogLike\Actions\Destroy;
use App\Http\Controllers\Management\BlogManagement\BlogLike\Actions\Show;
use App\Http\Controllers\Management\BlogManagement\BlogLike\Actions\Store;

class Controller extends MainController
{
    public $model;

    public function __construct()
    {
        $this->model = BlogLike::class;
    }

    public function all()
    {
        $data = All::execute($this->model);
        return $data;
    }

    public function show($id)
    {
        $data = Show::execute($this->model, $id);
        return $data;
    }

    public function store()
    {
        $data = Store::execute($this->model);
        return $data;
    }

    public function destroy()
    {
        $data = Destroy::execute($this->model);
        return $data;
    }
}
