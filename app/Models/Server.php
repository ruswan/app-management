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
 * Class Server
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property string|null $ip_address
 * @property bool $is_internal
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property Collection|Project[] $projects
 * @package App\Models
 * @property-read int|null $projects_count
 * @method static \Illuminate\Database\Eloquent\Builder|Server newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Server newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Server onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Server query()
 * @method static \Illuminate\Database\Eloquent\Builder|Server whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Server whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Server whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Server whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Server whereIpAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Server whereIsInternal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Server whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Server whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Server withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Server withoutTrashed()
 * @mixin \Eloquent
 */
class Server extends Model
{
    use SoftDeletes;
    protected $table = 'servers';

    protected $casts = [
        'is_internal' => 'bool'
    ];

    protected $fillable = [
        'name',
        'description',
        'ip_address',
        'is_internal'
    ];

    /**
     * The projects that belong to the Server
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function projects()
    {
        return $this->belongsToMany(Project::class)
            ->withPivot('id', 'deleted_at')
            ->withTimestamps();
    }
}
