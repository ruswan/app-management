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
 *
 * @property Project $project
 * @property User $user
 *
 * @package App\Models
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

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
