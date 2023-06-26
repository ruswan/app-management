<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class AssetType
 *
 * @property int $id
 * @property string $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|AssetType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AssetType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AssetType onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|AssetType query()
 * @method static \Illuminate\Database\Eloquent\Builder|AssetType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssetType whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssetType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssetType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssetType whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssetType withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|AssetType withoutTrashed()
 * @mixin \Eloquent
 */
class AssetType extends Model
{
	use SoftDeletes;
	protected $table = 'asset_types';

	protected $fillable = [
		'name'
	];
}
