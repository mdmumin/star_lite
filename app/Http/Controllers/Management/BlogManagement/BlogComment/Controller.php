<?php

namespace App\Http\Controllers\Management\BlogManagement\BlogComment;

use App\Http\Controllers\Controller as MainController;
use App\Models\BlogManagement\BlogComments as BlogComment;

use App\Http\Controllers\Management\BlogManagement\BlogComment\Actions\All;
use App\Http\Controllers\Management\BlogManagement\BlogComment\Actions\Destroy;
use App\Http\Controllers\Management\BlogManagement\BlogComment\Actions\Restore;
use App\Http\Controllers\Management\BlogManagement\BlogComment\Actions\Show;
use App\Http\Controllers\Management\BlogManagement\BlogComment\Actions\SoftDelete;
use App\Http\Controllers\Management\BlogManagement\BlogComment\Actions\Store;
use App\Http\Controllers\Management\BlogManagement\BlogComment\Actions\Update;

class Controller extends MainController
{
    public $model;

    public function __construct()
    {
        $this->model = BlogComment::class;
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
