<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class City
 * 
 * @property int $id
 * @property string $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Hotel[] $hotels
 *
 * @package App\Models
 */
class City extends Model
{
	protected $table = 'cities';

	protected $fillable = [
		'name'
	];

	public function hotels()
	{
		return $this->hasMany(Hotel::class);
	}
}
