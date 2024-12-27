<?php

namespace App\Models\Management;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    /** @use HasFactory<\Database\Factories\Frontend\BannerFactory> */
    use HasFactory;

    protected $guarded = [];

}
