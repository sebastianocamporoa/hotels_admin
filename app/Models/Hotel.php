<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $fillable = ['name', 'address', 'city', 'nit'];
    public function roomTypes()
    {
        return $this->belongsToMany(RoomType::class, 'hotel_rooms')->withPivot('accommodation_id');
    }
    use HasFactory;
}
