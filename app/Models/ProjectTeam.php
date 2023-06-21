<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ProjectTeam
 *
 * @property int $id
 * @property int $project_id
 * @property int $user_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property Project $project
 * @property User $user
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectTeam newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectTeam newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectTeam onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectTeam query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectTeam whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectTeam whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectTeam whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectTeam whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectTeam whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectTeam whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectTeam withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectTeam withoutTrashed()
 * @mixin \Eloquent
 */
class ProjectTeam extends Model
{
    use SoftDeletes;
    protected $table = 'project_team';

    protected $casts = [
        'project_id' => 'int',
        'user_id' => 'int'
    ];

    protected $fillable = [
        'project_id',
        'user_id'
    ];

    /**
     * Get the project that owns the ProjectTeam
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function project()
    {
        return $this->belongsTo(Project::class);
    }


    /**
     * Get the user that owns the ProjectTeam
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
