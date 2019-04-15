<?php

namespace App\Models;

use App\Traits\BelongsToUser;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\UserProfile
 *
 * @property int         $id
 * @property int         $user_id
 * @property string      $employee_no
 * @property string      $id_no
 * @property string|null $phone
 * @property string|null $work_phone
 * @property string|null $email
 * @property string      $started_at
 * @property string|null $left_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read User   $user
 * @method static Builder|UserProfile newModelQuery()
 * @method static Builder|UserProfile newQuery()
 * @method static Builder|UserProfile query()
 * @method static Builder|UserProfile whereCreatedAt($value)
 * @method static Builder|UserProfile whereEmail($value)
 * @method static Builder|UserProfile whereEmployeeNo($value)
 * @method static Builder|UserProfile whereId($value)
 * @method static Builder|UserProfile whereIdNo($value)
 * @method static Builder|UserProfile whereLeftAt($value)
 * @method static Builder|UserProfile wherePhone($value)
 * @method static Builder|UserProfile whereStartedAt($value)
 * @method static Builder|UserProfile whereUpdatedAt($value)
 * @method static Builder|UserProfile whereUserId($value)
 * @method static Builder|UserProfile whereWorkPhone($value)
 * @mixins \Eloquent
 * @mixin Eloquent
 */
class UserProfile extends Model
{
    use BelongsToUser;

    protected $guarded = [];
}
