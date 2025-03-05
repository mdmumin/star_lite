<?php

namespace App\Models\Management;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    /** @use HasFactory<\Database\Factories\Frontend\BannerFactory> */
    use HasFactory;

    protected $guarded = [];
    protected static function booted()
    {
        static::created(function ($data) {
            $random_no = random_int(100, 999) . $data->id . time();
            $slug = $random_no;
            $data->slug = \Illuminate\Support\Str::slug($slug); //use Illuminate\Support\Str;
            $data->save();

            if (\Illuminate\Support\Facades\Auth::check()) {
                $data->creator = \Illuminate\Support\Facades\Auth::user()->id;
                $data->save();
            }
        });
    }

    public function scopeActive($q)
    {
        return $q->where('status', '1');
    }

    public function scopeDective($q)
    {
        return $q->where('status', '0');
    }
    public function user_creator(){
        return $this->belongsTo(User::class,'creator','id');
    }
}
