<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class DeptGroupPhoto extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'images' => 'json'
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
