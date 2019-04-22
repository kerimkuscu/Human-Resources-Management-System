<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Query\Builder;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\DatabaseNotificationCollection;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use Tymon\JWTAuth\Contracts\JWTSubject;

/**
 * App\Models\User
 *
 * @property int                                                        $id
 * @property string                                                     $name
 * @property string                                                     $email
 * @property string|null                                                $email_verified_at
 * @property string                                                     $password
 * @property string|null                                                $api_token
 * @property string|null                                                $remember_token
 * @property Carbon|null                                                $created_at
 * @property Carbon|null                                                $updated_at
 * @property-read DatabaseNotificationCollection|DatabaseNotification[] $notifications
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereApiToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @mixins \Eloquent
 * @property string|null                                                $deleted_at
 * @property-read UserProfile                                           $profile
 * @method static bool|null forceDelete()
 * @method static Builder|User onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDeletedAt($value)
 * @method static Builder|User withTrashed()
 * @method static Builder|User withoutTrashed()
 * @property-read Collection|UserLeave[]                                $leaves
 * @mixin Eloquent
 * @property int|null                                                   $role_id
 * @property-read Collection|UserRole[]                                 $roles
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRoleId($value)
 * @method hasOne(string $class)
 * @method hasMany(string $class)
 */
class User extends Authenticatable implements JWTSubject
{
    use Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'role_id', 'password', 'api_token',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'api_token',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function(User $model) {
            $model->api_token = str_random(60);
        });
    }

    /**
     * Get the user profile
     *
     * @return HasOne
     */
    public function profile()
    {
        return $this->hasOne(UserProfile::class);
    }

    /**
     * Get the user leaves
     *
     * @return HasMany
     */
    public function leaves()
    {
        return $this->hasMany(UserLeave::class);
    }

    /**
     * Get the user roles
     *
     * @return HasMany
     */
    public function roles()
    {
        return $this->hasMany(UserRole::class);
    }

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
