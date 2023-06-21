<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Filament\Models\Contracts\FilamentUser;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Collection|ProjectTeam[] $project_teams
 * @property Collection|Project[] $responsibleProjects
 * @package App\Models
 * @property-read int|null $project_teams_count
 * @property-read int|null $responsibleProjects_count
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class User extends Authenticatable implements FilamentUser, MustVerifyEmail
{
    use SoftDeletes;

    protected $table = 'users';

    protected $casts = [
        'email_verified_at' => 'datetime'
    ];

    protected $hidden = [
        'password',
        'remember_token'
    ];

    protected $fillable = [
        'name',
        'email',
        'email_verified_at',
        'password',
        'remember_token'
    ];

    /**
     * Get all of the projectUsers for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function projectUsers()
    {
        return $this->belongsToMany(Project::class)
            ->withPivot('id', 'deleted_at')
            ->withTimestamps();
    }

    /**
     * Get all of the responsibleProjects for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function responsibleProjects()
    {
        return $this->hasMany(Project::class, 'responsible_id');
    }

    /**
     * The projects that belong to the Department
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function projects()
    {
        return $this->belongsToMany(Project::class)
            ->withPivot('id', 'deleted_at')
            ->withTimestamps();
    }

    /**
     * Batasi hanya user yang statusnya aktif yang bisa mengakses
     * @return bool
     */
    public function canAccessFilament(): bool
    {
        return true;
    }
}
