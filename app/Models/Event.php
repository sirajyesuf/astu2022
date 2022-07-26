<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Request;

class Event extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'images' => 'array'

    ];

    public function day()
    {
        return $this->belongsTo(Day::class);
    }

    protected function order(): Attribute
    {
        if (request()->is('admin/events')) {

            return Attribute::make(
                get: fn ($value) => $value + 1,
            );
        }


        return Attribute::make(
            get: fn ($value) => $value,
        );
    }
}
