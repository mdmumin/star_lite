<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\Backend\Admin\UserManagement\UserRole;
use App\Models\BlogManagement\Blogs;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];

        
    }

    public function user_role()
    {
        return $this->belongsTo(UserRole::class,'role_serial','role_serial');
    }
    public function creator()
    {
        return $this->belongsTo(User::class, 'creator', 'id');
    }
    public function scopeActive($query){
        return $query->where('status', 1);
    }
    public function blog_category_blog(){
        return $this->hasMany(Blogs::class,'creator','id');
    }

//     public function getCreatedAtAttribute($value)
//     {
        
//         return Carbon::parse($value)->format('d-m-Y H:i:s');
//     }
 }
