<?php

namespace App\Models\BlogManagement;

use Illuminate\Database\Eloquent\Model;

class BlogCategories extends Model
{
    protected $guarded = [];
    protected $appends = [
        'label',
        'value',
    ];
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

    public function getValueAttribute()
    {
        return $this->id;
    }
    public function getLabelAttribute()
    {
        return $this->title;
    }
}
