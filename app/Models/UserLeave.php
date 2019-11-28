<?php

namespace App\Models;

use App\Traits\BelongsToUser;
use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * App\Models\UserLeave
 *
 * @property int            $id
 * @property int            $user_id
 * @property int            $leave_type_id
 * @property Carbon         $started_at
 * @property Carbon         $ended_at
 * @property string         $description
 * @property int|null       $approved_by
 * @property string|null    $approved_at
 * @property Carbon|null    $created_at
 * @property Carbon|null    $updated_at
 * @property-read User      $user
 * @property-read UserLeaveType $user_leave_type
 *
 * @method static Builder|UserLeave newModelQuery()
 * @method static Builder|UserLeave newQuery()
 * @method static Builder|UserLeave query()
 * @method static Builder|UserLeave whereApprovedAt($value)
 * @method static Builder|UserLeave whereApprovedBy($value)
 * @method static Builder|UserLeave whereCreatedAt($value)
 * @method static Builder|UserLeave whereDescription($value)
 * @method static Builder|UserLeave whereEndedAt($value)
 * @method static Builder|UserLeave whereId($value)
 * @method static Builder|UserLeave whereLeaveTypeId($value)
 * @method static Builder|UserLeave whereStartedAt($value)
 * @method static Builder|UserLeave whereUpdatedAt($value)
 * @method static Builder|UserLeave whereUserId($value)
 * @method belongsTo(string $class, string $string)
 * @mixins \Eloquent
 *
 * @property-read User|null $approver
 * @mixin Eloquent
 */
class UserLeave extends Model
{
    use BelongsToUser;

    protected $guarded = [];

    protected $dates = ['started_at', 'ended_at'];

    /**
     * Get the user the model belongs to
     *
     * @return BelongsTo
     */
    public function approver()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }
}
