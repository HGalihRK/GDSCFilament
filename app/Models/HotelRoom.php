<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class HotelRoom
 * 
 * @property int $id
 * @property int $hotel_id
 * @property string $name
 * @property int $occupancy
 * @property int $price
 * @property string|null $note
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Hotel $hotel
 * @property Collection|HotelRoomReservation[] $hotel_room_reservations
 *
 * @package App\Models
 */
class HotelRoom extends Model
{
	protected $table = 'hotel_rooms';

	protected $casts = [
		'hotel_id' => 'int',
		'occupancy' => 'int',
		'price' => 'int'
	];

	protected $fillable = [
		'hotel_id',
		'name',
		'occupancy',
		'price',
		'note'
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
