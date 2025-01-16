<?php

namespace App\Http\Controllers\Management\PropertyManagement\PropertyTag;

use App\Http\Controllers\Controller as MainController;
use App\Models\Property\PropertyTags;

use App\Http\Controllers\Management\PropertyManagement\PropertyTag\Actions\All;
use App\Http\Controllers\Management\PropertyManagement\PropertyTag\Actions\BulkImport;
use App\Http\Controllers\Management\PropertyManagement\PropertyTag\Actions\Destroy;
use App\Http\Controllers\Management\PropertyManagement\PropertyTag\Actions\Restore;
use App\Http\Controllers\Management\PropertyManagement\PropertyTag\Actions\Show;
use App\Http\Controllers\Management\PropertyManagement\PropertyTag\Actions\SoftDelete;
use App\Http\Controllers\Management\PropertyManagement\PropertyTag\Actions\Store;
use App\Http\Controllers\Management\PropertyManagement\PropertyTag\Actions\Update;

class Controller extends MainController
{
    public $model;

    public function __construct()
    {
        $this->model = PropertyTags::class;
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
