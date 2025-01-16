<?php

namespace App\Http\Controllers\Management\CommonManagement\Faq;

use App\Http\Controllers\Controller as MainController;
use App\Models\Management\Faq;

use App\Http\Controllers\Management\CommonManagement\Faq\Actions\All;
use App\Http\Controllers\Management\CommonManagement\Faq\Actions\BulkImport;
use App\Http\Controllers\Management\CommonManagement\Faq\Actions\Destroy;
use App\Http\Controllers\Management\CommonManagement\Faq\Actions\Restore;
use App\Http\Controllers\Management\CommonManagement\Faq\Actions\Show;
use App\Http\Controllers\Management\CommonManagement\Faq\Actions\SoftDelete;
use App\Http\Controllers\Management\CommonManagement\Faq\Actions\Store;
use App\Http\Controllers\Management\CommonManagement\Faq\Actions\Update;

class Controller extends MainController
{
    public $model;

    public function __construct()
    {
        $this->model = Faq::class;
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
