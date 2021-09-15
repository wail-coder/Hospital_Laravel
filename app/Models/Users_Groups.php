<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users_Groups extends Model
{

    public $table = 'users_groups';
    use HasFactory;

    protected $fillable = [
        'users_id',
        'groups_id',
        'created_at ',
        'updated_at ',
    ];
}
