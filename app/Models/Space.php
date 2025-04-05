<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Space extends Model
{
    protected $fillable = [
        'host_id', 'title', 'description', 'street_address', 'city', 'state',
        'postal_code', 'country', 'latitude', 'longitude', 'capacity',
        'hourly_rate', 'min_booking_duration', 'max_booking_duration', 'is_active', 'is_deleted',
    ];

    public function host()
    {
        return $this->belongsTo(User::class, 'host_id', 'user_id');
    }

    public function amenities()
    {
        return $this->belongsToMany(Amenity::class, 'space_amenities', 'space_id', 'amenity_id');
    }

    public function images()
    {
        return $this->hasMany(SpaceImage::class, 'space_id', 'space_id');
    }

    public function availability()
    {
        return $this->hasMany(SpaceAvailability::class, 'space_id', 'space_id');
    }

    public function availabilityExceptions()
    {
        return $this->hasMany(AvailabilityException::class, 'space_id', 'space_id');
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class, 'space_id', 'space_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'space_id', 'space_id');
    }
}