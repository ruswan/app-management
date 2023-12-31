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
 * Class Project
 *
 * @property int $id
 * @property int $responsible_id
 * @property string $name
 * @property string $url
 * @property int $production_year
 * @property bool $is_active
 * @property int $project_type_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property User $user
 * @property Collection|Department[] $departments
 * @property Collection|ProjectTeam[] $users
 * @package App\Models
 * @property-read int|null $departments_count
 * @property-read int|null $project_teams_count
 * @method static \Illuminate\Database\Eloquent\Builder|Project newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Project newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Project onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Project query()
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereProductionYear($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereResponsibleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereProjctTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Project withoutTrashed()
 * @mixin \Eloquent
 */
class Project extends Model
{
    use SoftDeletes;
    protected $table = 'projects';

    protected $casts = [
        'responsible_id' => 'int',
        'production_year_id' => 'int',
        'is_active' => 'bool',
    ];

    protected $fillable = [
        'responsible_id',
        'name',
        'url',
        'description',
        'production_year_id',
        'is_active',
        'project_type_id',
    ];

    /**
     * Get the user that owns the Project
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'responsible_id');
    }

    /**
     * The departments that belong to the Project
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function departments()
    {
        return $this->belongsToMany(Department::class)
            ->withPivot('id', 'deleted_at')
            ->withTimestamps();
    }


    /**
     * The users that belong to the Project
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(User::class)
            ->withPivot('id', 'deleted_at')
            ->withTimestamps();
    }

    /**
     * The servers that belong to the Project
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function servers()
    {
        return $this->belongsToMany(Server::class)
            ->withPivot('id', 'deleted_at')
            ->withTimestamps();
    }

    /**
     * Get all of the modules for the Project
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function modules()
    {
        return $this->hasMany(Module::class);
    }

    /**
     * Get the productionYear that owns the Project
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function productionYear()
    {
        return $this->belongsTo(ProductionYear::class);
    }

    /**
     * Get the projectType that owns the Project
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function projectType()
    {
        return $this->belongsTo(ProjectType::class, 'project_type_id');
    }
}
