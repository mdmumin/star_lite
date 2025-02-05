<?php

namespace App\Models\BlogManagement;

use Illuminate\Database\Eloquent\Model;

class BlogCategoryBlog extends Model
{
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

    public function blog(){
        return $this->belongsTo(Blogs::class,'blog_id');
    }

    public function blog_category(){
        return $this->belongsTo(BlogCategories::class,'blog_category_id');
    }


    


}
