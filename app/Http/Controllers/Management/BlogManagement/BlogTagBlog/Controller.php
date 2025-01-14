<?php

namespace App\Http\Controllers\Management\BlogManagement\BlogTagBlog;

use App\Http\Controllers\Controller as MainController;
use App\Models\BlogManagement\BlogTagBlog as BlogTagBlog;

use App\Http\Controllers\Management\BlogManagement\BlogTagBlog\Actions\All;
use App\Http\Controllers\Management\BlogManagement\BlogTagBlog\Actions\Destroy;
use App\Http\Controllers\Management\BlogManagement\BlogTagBlog\Actions\Show;
use App\Http\Controllers\Management\BlogManagement\BlogTagBlog\Actions\Store;
use App\Http\Controllers\Management\BlogManagement\BlogTagBlog\Actions\Update;

class Controller extends MainController
{
    public $model;

    public function __construct()
    {
        $this->model = BlogTagBlog::class;
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

    public function update()
    {
        $data = Update::execute($this->model);
        return $data;
    }

    public function destroy()
    {
        $data = Destroy::execute($this->model);
        return $data;
    }
}
