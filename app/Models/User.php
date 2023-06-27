<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'username', 'password', 'email', 'phone_number', 'contact', 'group_id', 'image','role','name'
    ];

    protected $guarded = ['role'];

    public function tasks()
    {
        return $this->hasMany('App\Models\Tasks');
    }
    public function roles()
    {
        return $this->belongsToMany('App\Models\Role');
    }
    public function hasRole($role)
    {
        return $this->roles->contains('name', $role);
    }

    public function setImageAttribute($value)
    {
        $this->attributes['image'] = 'public/'.$value;
    }

    public function getImageUrl()
    {
        return asset('storage/' . $this->image);
    }

    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
