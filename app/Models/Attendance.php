<?php

namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Query\Builder;

/**
 * App\Models\Attendance
 *
 * @property mixed note
 * @property mixed time_out
 * @property mixed time_id
 * @property mixed employee_id
 * @property mixed id
 * @property mixed time_out_date
 * @property mixed time_in_date
 * @property mixed time_out_time_minute
 * @property mixed time_in_time_hour
 * @property mixed time_in_time_minute
 * @property mixed time_out_time_hour
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
