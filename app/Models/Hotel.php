<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'address', 'city', 'nit'];

    public function rooms()
    {
        return $this->hasMany(HotelRoom::class);
    }

    public function roomTypes()
    {
        return $this->belongsToMany(RoomType::class, 'hotel_rooms')->withPivot('accommodation_id');
    }
}
