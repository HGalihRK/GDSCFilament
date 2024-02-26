<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class HotelRoomReservation
 * 
 * @property int $id
 * @property int $hotel_room_id
 * @property int $guest_id
 * @property int $hotel_employee_id
 * @property Carbon $check_in
 * @property Carbon $check_out
 * @property string|null $note
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Guest $guest
 * @property HotelEmployee $hotel_employee
 * @property HotelRoom $hotel_room
 *
 * @package App\Models
 */
class HotelRoomReservation extends Model
{
	protected $table = 'hotel_room_reservations';

	protected $casts = [
		'hotel_room_id' => 'int',
		'guest_id' => 'int',
		'hotel_employee_id' => 'int',
		'check_in' => 'datetime',
		'check_out' => 'datetime'
	];

	protected $fillable = [
		'hotel_room_id',
		'guest_id',
		'hotel_employee_id',
		'check_in',
		'check_out',
		'note'
	];

	public function guest()
	{
		return $this->belongsTo(Guest::class);
	}

	public function hotel_employee()
	{
		return $this->belongsTo(HotelEmployee::class);
	}

	public function hotel_room()
	{
		return $this->belongsTo(HotelRoom::class);
	}
}
