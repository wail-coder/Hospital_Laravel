<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Groups_Buildings_Floors_Rooms extends Model
{
    public $table = 'groups_buildings_floors_rooms';
    use HasFactory;

    protected $fillable = [
        'groups_id',
        'buildings_id',
        'floors_id',
        'rooms_id',
        'created_at',
        'updated_at',
    ];
}
