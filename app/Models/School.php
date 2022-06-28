<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function departments()
    {
        return $this->hasMany(Department::class);
    }

    public function students()
    {
        return $this->hasManyThrough(Student::class, Department::class);
    }
    public function groupPhotos()
    {
        return $this->hasManyThrough(DeptGroupPhoto::class, Department::class);
    }

    public function images()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
