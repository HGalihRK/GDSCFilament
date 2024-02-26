<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class HotelEmployee
 * 
 * @property int $id
 * @property int $hotel_id
 * @property string $name
 * @property string $phone
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Hotel $hotel
 * @property Collection|HotelRoomReservation[] $hotel_room_reservations
 *
 * @package App\Models
 */
class HotelEmployee extends Model
{
	protected $table = 'hotel_employees';

	protected $casts = [
		'hotel_id' => 'int'
	];

	protected $fillable = [
		'hotel_id',
		'name',
		'phone'
	];

	public function hotel()
	{
		return $this->belongsTo(Hotel::class);
	}

	public function hotel_room_reservations()
	{
		return $this->hasMany(HotelRoomReservation::class);
	}
}
