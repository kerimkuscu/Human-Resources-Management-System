<?php

namespace App\Models;

use App\Traits\BelongsToUser;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

/**
 * App\UsersRoles
 *
 * @property int            $id
 * @property string         $users_role
 * @property Carbon|null    $created_at
 * @property Carbon|null    $updated_at
 * @method static bool|null forceDelete()
 * @method static Builder|UserRole newModelQuery()
 * @method static Builder|UserRole newQuery()
 * @method static \Illuminate\Database\Query\Builder|UserRole onlyTrashed()
 * @method static Builder|UserRole query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Query\Builder|UserRole withTrashed()
 * @method static UserRole withoutTrashed()
 * @mixins \Eloquent
 * @property string|null    $deleted_at
 * @method static Builder|UserRole whereCreatedAt($value)
 * @method static Builder|UserRole whereDeletedAt($value)
 * @method static Builder|UserRole whereId($value)
 * @method static Builder|UserRole whereUpdatedAt($value)
 * @method static Builder|UserRole whereUsersRole($value)
 * @mixin Eloquent
 * @property-read User|null $roles
 * @property-read User      $user
 */
class UserRole extends Model
{
    use BelongsToUser, SoftDeletes;

    /**
     * @var array
     */
    protected $fillable = ['users_role'];

    /**
     * @var array
     */
    protected $dates = ['started_at', 'ended_at'];

    public function roles()
    {
        return $this->belongsTo(User::class, 'role_id');
    }
}
