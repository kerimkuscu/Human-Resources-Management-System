<?php

namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Carbon;

/**
 * App\Models\Attendance
 *
 * @property mixed         note
 * @property mixed         time_out
 * @property mixed         time_id
 * @property mixed         employee_id
 * @property mixed         id
 * @property mixed         time_out_date
 * @property mixed         time_in_date
 * @property mixed         time_out_time_minute
 * @property mixed         time_in_time_hour
 * @property mixed         time_in_time_minute
 * @property mixed         time_out_time_hour
 *
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|Attendance newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Attendance newQuery()
 * @method static Builder|Attendance onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Attendance query()
 * @method static bool|null restore()
 * @method static Builder|Attendance withTrashed()
 * @method static Builder|Attendance withoutTrashed()
 * @mixin Eloquent
 *
 * @property string|null   $deleted_at
 * @property Carbon|null   $created_at
 * @property Carbon|null   $updated_at
 * @property-read Employee $employee
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Attendance whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Attendance whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Attendance whereEmployeeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Attendance whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Attendance whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Attendance whereTimeInDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Attendance whereTimeInTimeHour($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Attendance whereTimeInTimeMinute($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Attendance whereTimeOutDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Attendance whereTimeOutTimeHour($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Attendance whereTimeOutTimeMinute($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Attendance whereUpdatedAt($value)
 * @method hasOne(string $class)
 */
class Attendance extends Model
{
    use SoftDeletes;

    /**
     * @var array
     */
    protected $fillable = ['employee_id',
        'time_in_date',
        'time_in_time_hour',
        'time_in_time_minute',
        'time_out_date',
        'time_out_time_hour',
        'time_out_time_minute',
        'note', ];

    /**
     * Get the employee
     *
     * @return HasOne
     */
    public function employee()
    {
        return $this->hasOne(Employee::class);
    }
}
