<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Hotel
 * 
 * @property int $id
 * @property int $city_id
 * @property string $name
 * @property string $address
 * @property string|null $img_url
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property City $city
 * @property Collection|HotelEmployee[] $hotel_employees
 * @property Collection|HotelRoom[] $hotel_rooms
 *
 * @package App\Models
 */
class Hotel extends Model
{
	protected $table = 'hotels';

	protected $casts = [
		'city_id' => 'int'
	];

	protected $fillable = [
		'city_id',
		'name',
		'address',
		'img_url'
	];

	public function city()
	{
		return $this->belongsTo(City::class);
	}

	public function hotel_employees()
	{
		return $this->hasMany(HotelEmployee::class);
	}

	public function hotel_rooms()
	{
		return $this->hasMany(HotelRoom::class);
	}
}
