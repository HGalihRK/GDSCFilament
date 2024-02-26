<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Guest
 * 
 * @property int $id
 * @property string $name
 * @property string $phone
 * @property string $nik
 * @property Carbon $dob
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|HotelRoomReservation[] $hotel_room_reservations
 *
 * @package App\Models
 */
class Guest extends Model
{
	protected $table = 'guests';

	protected $casts = [
		'dob' => 'datetime'
	];

	protected $fillable = [
		'name',
		'phone',
		'nik',
		'dob'
	];

	public function hotel_room_reservations()
	{
		return $this->hasMany(HotelRoomReservation::class);
	}
}
