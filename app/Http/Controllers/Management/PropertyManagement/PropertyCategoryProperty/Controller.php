<?php

namespace App\Http\Controllers\Management\PropertyManagement\PropertyCategoryProperty;

use App\Http\Controllers\Controller as MainController;
use App\Models\Property\PropertiesPropertyCategorie;

use App\Http\Controllers\Management\PropertyManagement\PropertyCategoryProperty\Actions\All;
use App\Http\Controllers\Management\PropertyManagement\PropertyCategoryProperty\Actions\BulkImport;
use App\Http\Controllers\Management\PropertyManagement\PropertyCategoryProperty\Actions\Destroy;
use App\Http\Controllers\Management\PropertyManagement\PropertyCategoryProperty\Actions\Restore;
use App\Http\Controllers\Management\PropertyManagement\PropertyCategoryProperty\Actions\Show;
use App\Http\Controllers\Management\PropertyManagement\PropertyCategoryProperty\Actions\SoftDelete;
use App\Http\Controllers\Management\PropertyManagement\PropertyCategoryProperty\Actions\Store;
use App\Http\Controllers\Management\PropertyManagement\PropertyCategoryProperty\Actions\Update;

class Controller extends MainController
{
    public $model;

    public function __construct()
    {
        $this->model = PropertiesPropertyCategorie::class;
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
