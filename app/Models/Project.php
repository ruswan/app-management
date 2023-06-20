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
 * @property int $production_year
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 *
 * @property User $user
 * @property Collection|Department[] $departments
 * @property Collection|ProjectTeam[] $project_teams
 *
 * @package App\Models
 */
class Project extends Model
{
    use SoftDeletes;
    protected $table = 'projects';

    protected $casts = [
        'responsible_id' => 'int',
        'production_year' => 'int'
    ];

    protected $fillable = [
        'responsible_id',
        'name',
        'production_year'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'responsible_id');
    }

    public function departments()
    {
        return $this->belongsToMany(Department::class)
                    ->withPivot('id', 'deleted_at')
                    ->withTimestamps();
    }

    public function project_teams()
    {
        return $this->hasMany(ProjectTeam::class);
    }
}
