<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;
    protected $guarded = [];

    protected $hidden = [
        'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }

    public function isAdministrator()
    {

        return $this->role()->where('short_name', 'admin')->exists();
    }


    public function isEditor()
    {

        return $this->role()->where('short_name', 'editor')->exists();
    }

    protected function name()
    {

        return Attribute::make(
            get: fn ($value) => "hi"
        );
    }
}
