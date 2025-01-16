<?php

namespace App\Http\Controllers\Management\CommonManagement\Subscriber;

use App\Http\Controllers\Controller as MainController;
use App\Models\Management\Subscriber;

use App\Http\Controllers\Management\CommonManagement\Subscriber\Actions\All;
use App\Http\Controllers\Management\CommonManagement\Subscriber\Actions\BulkImport;
use App\Http\Controllers\Management\CommonManagement\Subscriber\Actions\Destroy;
use App\Http\Controllers\Management\CommonManagement\Subscriber\Actions\Restore;
use App\Http\Controllers\Management\CommonManagement\Subscriber\Actions\Show;
use App\Http\Controllers\Management\CommonManagement\Subscriber\Actions\SoftDelete;
use App\Http\Controllers\Management\CommonManagement\Subscriber\Actions\Store;
use App\Http\Controllers\Management\CommonManagement\Subscriber\Actions\Update;

class Controller extends MainController
{
    public $model;

    public function __construct()
    {
        $this->model = Subscriber::class;
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
