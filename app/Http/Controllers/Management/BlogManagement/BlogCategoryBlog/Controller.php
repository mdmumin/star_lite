<?php

namespace App\Http\Controllers\Management\BlogManagement\BlogCategoryBlog;

use App\Http\Controllers\Controller as MainController;
use App\Models\BlogManagement\BlogCategoryBlog as BlogCategoryBlog;

use App\Http\Controllers\Management\BlogManagement\BlogCategoryBlog\Actions\All;
use App\Http\Controllers\Management\BlogManagement\BlogCategoryBlog\Actions\Destroy;
use App\Http\Controllers\Management\BlogManagement\BlogCategoryBlog\Actions\Show;
use App\Http\Controllers\Management\BlogManagement\BlogCategoryBlog\Actions\Store;
use App\Http\Controllers\Management\BlogManagement\BlogCategoryBlog\Actions\Update;

class Controller extends MainController
{
    public $model;

    public function __construct()
    {
        $this->model = BlogCategoryBlog::class;
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
