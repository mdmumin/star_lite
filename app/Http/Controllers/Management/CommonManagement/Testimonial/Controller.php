<?php

namespace App\Http\Controllers\Management\CommonManagement\Testimonial;

use App\Http\Controllers\Controller as MainController;
use App\Models\Management\Testimonial;

use App\Http\Controllers\Management\CommonManagement\Testimonial\Actions\All;
use App\Http\Controllers\Management\CommonManagement\Testimonial\Actions\BulkImport;
use App\Http\Controllers\Management\CommonManagement\Testimonial\Actions\Destroy;
use App\Http\Controllers\Management\CommonManagement\Testimonial\Actions\Restore;
use App\Http\Controllers\Management\CommonManagement\Testimonial\Actions\Show;
use App\Http\Controllers\Management\CommonManagement\Testimonial\Actions\SoftDelete;
use App\Http\Controllers\Management\CommonManagement\Testimonial\Actions\Store;
use App\Http\Controllers\Management\CommonManagement\Testimonial\Actions\Update;

class Controller extends MainController
{
    public $model;

    public function __construct()
    {
        $this->model = Testimonial::class;
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
