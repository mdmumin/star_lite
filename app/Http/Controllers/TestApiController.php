<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class TestApiController extends Controller
{
    //
    public function users(){
        return User::limit(5)->get();
    }
}
