<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    protected $fillable = ['name'];
    public function hotels()
    {
        return $this->belongsToMany(Hotel::class, 'hotel_rooms')->withPivot('accommodation_id');
    }
    use HasFactory;
}
