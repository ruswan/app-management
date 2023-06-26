<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class AssetCondition
 *
 * @property int $id
 * @property string $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|AssetCondition newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AssetCondition newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AssetCondition onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|AssetCondition query()
 * @method static \Illuminate\Database\Eloquent\Builder|AssetCondition whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssetCondition whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssetCondition whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssetCondition whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssetCondition whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssetCondition withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|AssetCondition withoutTrashed()
 * @mixin \Eloquent
 */
class AssetCondition extends Model
{
	use SoftDeletes;
	protected $table = 'asset_conditions';

	protected $fillable = [
		'name'
	];
}
