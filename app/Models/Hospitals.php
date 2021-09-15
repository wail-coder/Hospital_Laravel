<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hospitals extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'location'
    ];

    public function buildings()
    {
        return $this->hasMany(Buildings::class);
    }
}
