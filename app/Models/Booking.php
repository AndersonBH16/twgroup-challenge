<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = ['date', 'time', 'state', 'user_id', 'room_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relación con el modelo Room
    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
