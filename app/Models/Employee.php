<?php

namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Carbon;

/**
 * App\Employee
 *
 * @property int         $id
 * @property string      $name
 * @property string      $nationality
 * @property Carbon|null $birthday
 * @property string      $gender
 * @property string      $marital_status
 * @property string      $driver_license
 * @property string      $employment_status
 * @property string      $job_title
 * @property string      $address
 * @property string      $city
 * @property string      $country
 * @property string      $province
 * @property int         $postal_code
 * @property int         $home_phone
 * @property int         $mobile_phone
 * @property int         $work_phone
 * @property int         $emergency_contact
 * @property string      $work_email
 * @property string      $private_email
 * @property Carbon|null $joined_date
 * @property string      $department
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Employee newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Employee newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Employee query()
 * @mixin Eloquent
 *
 * @property string|null $deleted_at
 *
 * @method static bool|null forceDelete()
 * @method static Builder|Employee onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereBirthday($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereDepartment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereDriverLicense($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereEmergencyContact($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereEmploymentStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereHomePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereJobTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereJoinedDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereMaritalStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereMobilePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereNationality($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee wherePostalCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee wherePrivateEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereProvince($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereWorkEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereWorkPhone($value)
 * @method static Builder|Employee withTrashed()
 * @method static Builder|Employee withoutTrashed()
 */
class Employee extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name',
                           'nationality',
                           'birthday',
                           'gender',
                           'marital_status',
                           'driver_license',
                           'employment_status',
                           'job_title',
                           'address',
                           'city',
                           'country',
                           'province',
                           'postal_code',
                           'home_phone',
                           'mobile_phone',
                           'work_phone',
                           'emergency_contact',
                           'work_email',
                           'private_email',
                           'joined_date',
                           'department', ];
}
