<?php

namespace App\Http\Controllers\Management\BlogManagement\BlogView;

use App\Http\Controllers\Controller as MainController;
use App\Models\BlogManagement\BlogViews as BlogView;

use App\Http\Controllers\Management\BlogManagement\BlogView\Actions\All;
use App\Http\Controllers\Management\BlogManagement\BlogView\Actions\Destroy;
use App\Http\Controllers\Management\BlogManagement\BlogView\Actions\Restore;
use App\Http\Controllers\Management\BlogManagement\BlogView\Actions\Show;
use App\Http\Controllers\Management\BlogManagement\BlogView\Actions\SoftDelete;
use App\Http\Controllers\Management\BlogManagement\BlogView\Actions\Store;


class Controller extends MainController
{
    public $model;

    public function __construct()
    {
        $this->model = BlogView::class;
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

    public function soft_delete()
    {
        $data = SoftDelete::execute($this->model);
        return $data;
    }

    public function restore()
    {
        $data = Restore::execute($this->model);
        return $data;
    }

    public function destroy()
    {
        $data = Destroy::execute($this->model);
        return $data;
    }
}
