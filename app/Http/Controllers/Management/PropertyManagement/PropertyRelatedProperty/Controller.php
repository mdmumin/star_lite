<?php

namespace App\Http\Controllers\Management\PropertyManagement\PropertyRelatedProperty;

use App\Http\Controllers\Controller as MainController;
use App\Models\Property\PropertyRelatedProperties;

use App\Http\Controllers\Management\PropertyManagement\PropertyRelatedProperty\Actions\All;
use App\Http\Controllers\Management\PropertyManagement\PropertyRelatedProperty\Actions\BulkImport;
use App\Http\Controllers\Management\PropertyManagement\PropertyRelatedProperty\Actions\Destroy;
use App\Http\Controllers\Management\PropertyManagement\PropertyRelatedProperty\Actions\Restore;
use App\Http\Controllers\Management\PropertyManagement\PropertyRelatedProperty\Actions\Show;
use App\Http\Controllers\Management\PropertyManagement\PropertyRelatedProperty\Actions\SoftDelete;
use App\Http\Controllers\Management\PropertyManagement\PropertyRelatedProperty\Actions\Store;
use App\Http\Controllers\Management\PropertyManagement\PropertyRelatedProperty\Actions\Update;

class Controller extends MainController
{
    public $model;

    public function __construct()
    {
        $this->model = PropertyRelatedProperties::class;
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
