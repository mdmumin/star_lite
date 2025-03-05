<?php

namespace App\Http\Controllers\Management\PropertyManagement\PropertyCategory;

use App\Http\Controllers\Controller as MainController;
use App\Models\Property\PropertyCategories;

use App\Http\Controllers\Management\PropertyManagement\PropertyCategory\Actions\All;
// use App\Http\Controllers\Management\PropertyManagement\PropertyCategory\Actions\AllData;
use App\Http\Controllers\Management\PropertyManagement\PropertyCategory\Actions\BulkImport;
use App\Http\Controllers\Management\PropertyManagement\PropertyCategory\Actions\Destroy;
use App\Http\Controllers\Management\PropertyManagement\PropertyCategory\Actions\Restore;
use App\Http\Controllers\Management\PropertyManagement\PropertyCategory\Actions\Show;
use App\Http\Controllers\Management\PropertyManagement\PropertyCategory\Actions\SoftDelete;
use App\Http\Controllers\Management\PropertyManagement\PropertyCategory\Actions\Store;
use App\Http\Controllers\Management\PropertyManagement\PropertyCategory\Actions\Update;

class Controller extends MainController
{
    public $model;

    public function __construct()
    {
        $this->model = PropertyCategories::class;
    }

    public function all()
    {
        $data = All::execute($this->model);
        return $data;
    }

    public function alldata()
    {
        return PropertyCategories::get();
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
