<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class AssetCategory
 *
 * @property int $id
 * @property string $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|AssetCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AssetCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AssetCategory onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|AssetCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|AssetCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssetCategory whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssetCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssetCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssetCategory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssetCategory withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|AssetCategory withoutTrashed()
 * @mixin \Eloquent
 */
class AssetCategory extends Model
{
	use SoftDeletes;
	protected $table = 'asset_categories';

	protected $fillable = [
		'name'
	];
}
