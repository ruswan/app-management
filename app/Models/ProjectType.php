<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ProjectType
 *
 * @property int $id
 * @property string $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectType onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectType query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectType whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectType whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectType withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectType withoutTrashed()
 * @mixin \Eloquent
 */
class ProjectType extends Model
{
	use SoftDeletes;
	protected $table = 'project_types';

	protected $fillable = [
		'name'
	];

    /**
     * Get all of the projects for the ProjectType
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
