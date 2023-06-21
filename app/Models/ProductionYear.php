<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ProductionYear
 *
 * @property int $id
 * @property string $year
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property Collection|Project[] $projects
 * @package App\Models
 * @property-read int|null $projects_count
 * @method static \Illuminate\Database\Eloquent\Builder|ProductionYear newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductionYear newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductionYear onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductionYear query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductionYear whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductionYear whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductionYear whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductionYear whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductionYear whereYear($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductionYear withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductionYear withoutTrashed()
 * @mixin \Eloquent
 */
class ProductionYear extends Model
{
    use SoftDeletes;
    protected $table = 'production_years';

    protected $fillable = [
        'year'
    ];

    /**
     * Get all of the projects for the ProductionYear
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
