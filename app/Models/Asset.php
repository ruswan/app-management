<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Asset
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $asset_categori_id
 * @property int $brand_id
 * @property int $condition_id
 * @property int|null $department_id
 * @property string|null $sn_number
 * @property string|null $mac_address
 * @property string|null $ip_address
 * @property string|null $code
 * @property string|null $location
 * @property Carbon|null $purchase_year
 * @property string|null $attachment
 * @property int $owner_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property AssetCategory $asset_category
 * @property Brand $brand
 * @property AssetCondition $asset_condition
 * @property Department|null $department
 * @property User $user
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|Asset newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Asset newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Asset onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Asset query()
 * @method static \Illuminate\Database\Eloquent\Builder|Asset whereAssetCategoriId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Asset whereAttachment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Asset whereBrandId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Asset whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Asset whereConditionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Asset whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Asset whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Asset whereDepartmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Asset whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Asset whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Asset whereIpAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Asset whereLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Asset whereMacAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Asset whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Asset whereOwnerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Asset wherePurchaseYear($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Asset whereSnNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Asset whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Asset withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Asset withoutTrashed()
 * @mixin \Eloquent
 */
class Asset extends Model
{
    use SoftDeletes;
    protected $table = 'assets';

    protected $casts = [
        'asset_categori_id' => 'int',
        'brand_id' => 'int',
        'condition_id' => 'int',
        'department_id' => 'int',
        'purchase_year' => 'datetime',
        'owner_id' => 'int'
    ];

    protected $fillable = [
        'name',
        'description',
        'asset_categori_id',
        'brand_id',
        'condition_id',
        'department_id',
        'sn_number',
        'mac_address',
        'ip_address',
        'code',
        'location',
        'purchase_year',
        'attachment',
        'owner_id'
    ];

    /**
     * Get the assetCategory that owns the Asset
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function assetCategory()
    {
        return $this->belongsTo(AssetCategory::class, 'asset_categori_id');
    }

    /**
     * Get the brand that owns the Asset
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    /**
     * Get the assetCondition that owns the Asset
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function assetCondition()
    {
        return $this->belongsTo(AssetCondition::class, 'condition_id');
    }

    /**
     * Get the department that owns the Asset
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    /**
     * Get the user that owns the Asset
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }
}
