<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Events\alarmEvent;

class notifications extends Model
{
    use HasFactory;

    protected $fillable = [
        'notifiable_type',
        'notifiable_id',
        'code',
        'room_id',
        'created_at',
        'updated_at',
    ];

    protected $dispatchesEvents = [

        'test' => alarmEvent::class,
        
    ];
}
