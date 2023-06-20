<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class DepartmentProject
 *
 * @property int $id
 * @property int $department_id
 * @property int $project_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property string $deleted_at
 * @property Department $department
 * @property Project $project
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|DepartmentProject newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DepartmentProject newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DepartmentProject onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|DepartmentProject query()
 * @method static \Illuminate\Database\Eloquent\Builder|DepartmentProject whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DepartmentProject whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DepartmentProject whereDepartmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DepartmentProject whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DepartmentProject whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DepartmentProject whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DepartmentProject withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|DepartmentProject withoutTrashed()
 * @mixin \Eloquent
 */
class DepartmentProject extends Model
{
    use SoftDeletes;
    protected $table = 'department_project';

    protected $casts = [
        'department_id' => 'int',
        'project_id' => 'int'
    ];

    protected $fillable = [
        'department_id',
        'project_id'
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
