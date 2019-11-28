<?php

namespace App\Models;

use App\Traits\BelongsToUser;
use Eloquent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Carbon;

/**
 * App\Models\UserLeaveType
 *
 * @property int         $id
 * @property string      $leave_type
 * @property int         $leaves_per_day
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @method static UserLeaveType newModelQuery()
 * @method static UserLeaveType newQuery()
 * @method static UserLeaveType query()
 * @mixins \Eloquent
 *
 * @property string|null $deleted_at
 * @property-read User   $user
 *
 * @method static bool|null forceDelete()
 * @method static Builder|UserLeaveType onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|UserLeaveType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserLeaveType whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserLeaveType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserLeaveType whereLeaveAccrueEnabled($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserLeaveType whereLeaveCarriedForward($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserLeaveType whereLeaveType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserLeaveType whereLeavesPerDay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserLeaveType whereUpdatedAt($value)
 * @method static Builder|UserLeaveType withTrashed()
 * @method static Builder|UserLeaveType withoutTrashed()
 * @method static findOrFail(int $id)
 * @mixin Eloquent
 */
class UserLeaveType extends Model
{
    use SoftDeletes, BelongsToUser;

    /**
     * @var array
     */
    protected $fillable = ['leave_type', 'leaves_per_day'];

    /**
     * @var array
     */
    protected $dates = ['started_at', 'ended_at'];
}
