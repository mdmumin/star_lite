<?php

namespace App\Http\Controllers\Management\BlogCategory;

use App\Http\Controllers\Controller as MainController;
use App\Models\BlogManagement\BlogCategories as BlogCategory;

use App\Http\Controllers\Management\BlogCategory\Actions\All;
use function App\Http\Controllers\Management\BlogCategory\Actions\BulkImport;
use function App\Http\Controllers\Management\BlogCategory\Actions\Destroy;
use function App\Http\Controllers\Management\BlogCategory\Actions\Show;
use function App\Http\Controllers\Management\BlogCategory\Actions\SoftDelete;
use function App\Http\Controllers\Management\BlogCategory\Actions\Store;
use function App\Http\Controllers\Management\BlogCategory\Actions\Update;

class Controller extends MainController
{
    public $model;

    public function __construct()
    {
        $this->model = BlogCategory::class;
    }

    public function all()
    {
        $data = All::execute($this->model);
        return $data;
    }

    public function show($id)
    {
        $data = Show($this->model, $id);
        return $data;
    }

    public function store()
    {
        $data = Store($this->model);
        return $data;
    }

    public function update()
    {
        $data = Update($this->model);
        return $data;
    }

    public function soft_delete()
    {
        $data = SoftDelete($this->model);
        return $data;
    }

    public function restore()
    {
        $data = Destroy($this->model);
        return $data;
    }

    public function destroy()
    {
        $data = Destroy($this->model);
        return $data;
    }

    public function bulk_import()
    {
        $data = BulkImport($this->model);
        return $data;
    }
}
