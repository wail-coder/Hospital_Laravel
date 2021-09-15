<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buildings extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'hospitals_id',
        'number',
    ];

    public function hospitals()
    {
        return $this->hasOne(Hospitals::class);
    }
}
