<?php

namespace App\Http\Controllers\Management\PropertyManagement\PropertyFloorPlanKeyValue;

use App\Http\Controllers\Controller as MainController;
use App\Models\Property\PropertyFloorPlanKeyValues;

use App\Http\Controllers\Management\PropertyManagement\PropertyFloorPlanKeyValue\Actions\All;
use App\Http\Controllers\Management\PropertyManagement\PropertyFloorPlanKeyValue\Actions\BulkImport;
use App\Http\Controllers\Management\PropertyManagement\PropertyFloorPlanKeyValue\Actions\Destroy;
use App\Http\Controllers\Management\PropertyManagement\PropertyFloorPlanKeyValue\Actions\Restore;
use App\Http\Controllers\Management\PropertyManagement\PropertyFloorPlanKeyValue\Actions\Show;
use App\Http\Controllers\Management\PropertyManagement\PropertyFloorPlanKeyValue\Actions\SoftDelete;
use App\Http\Controllers\Management\PropertyManagement\PropertyFloorPlanKeyValue\Actions\Store;
use App\Http\Controllers\Management\PropertyManagement\PropertyFloorPlanKeyValue\Actions\Update;

class Controller extends MainController
{
    public $model;

    public function __construct()
    {
        $this->model = PropertyFloorPlanKeyValues::class;
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
