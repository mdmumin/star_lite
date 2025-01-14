<?php

namespace App\Http\Controllers\Management\BlogManagement\BlogTag;

use App\Http\Controllers\Controller as MainController;
use App\Models\BlogManagement\BlogTags as BlogTag;

use App\Http\Controllers\Management\BlogManagement\BlogTag\Actions\All;
use App\Http\Controllers\Management\BlogManagement\BlogTag\Actions\BulkImport;
use App\Http\Controllers\Management\BlogManagement\BlogTag\Actions\Destroy;
use App\Http\Controllers\Management\BlogManagement\BlogTag\Actions\Restore;
use App\Http\Controllers\Management\BlogManagement\BlogTag\Actions\Show;
use App\Http\Controllers\Management\BlogManagement\BlogTag\Actions\SoftDelete;
use App\Http\Controllers\Management\BlogManagement\BlogTag\Actions\Store;
use App\Http\Controllers\Management\BlogManagement\BlogTag\Actions\Update;

class Controller extends MainController
{
    public $model;

    public function __construct()
    {
        $this->model = BlogTag::class;
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

    public function bulk_import()
    {
        $data = BulkImport::execute($this->model);
        return $data;
    }
}
