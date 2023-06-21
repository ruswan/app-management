<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ProjectUser
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
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectUser onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectUser query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectUser whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectUser whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectUser whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectUser whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectUser withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectUser withoutTrashed()
 * @mixin \Eloquent
 */
class ProjectUser extends Model
{
    use SoftDeletes;
    protected $table = 'project_user';

    protected $casts = [
        'project_id' => 'int',
        'user_id' => 'int'
    ];

    protected $fillable = [
        'project_id',
        'user_id'
    ];

    /**
     * Get the project that owns the ProjectUser
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function project()
    {
        return $this->belongsTo(Project::class);
    }


    /**
     * Get the user that owns the ProjectUser
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
