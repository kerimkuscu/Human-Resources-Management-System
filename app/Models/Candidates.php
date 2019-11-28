<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Candidates
 *
 * @property int         $id
 * @property string      $name
 * @property string      $gender
 * @property string      $city
 * @property string      $country
 * @property int         $phone
 * @property string      $email
 * @property string      $job_title
 * @property string      $department
 * @property string      $description
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @method static Builder|Candidates newModelQuery()
 * @method static Builder|Candidates newQuery()
 * @method static Builder|Candidates query()
 * @mixin Eloquent
 *
 * @method static Builder|Candidates whereCity($value)
 * @method static Builder|Candidates whereCountry($value)
 * @method static Builder|Candidates whereCreatedAt($value)
 * @method static Builder|Candidates whereDepartment($value)
 * @method static Builder|Candidates whereDescription($value)
 * @method static Builder|Candidates whereEmail($value)
 * @method static Builder|Candidates whereGender($value)
 * @method static Builder|Candidates whereId($value)
 * @method static Builder|Candidates whereJobTitle($value)
 * @method static Builder|Candidates whereName($value)
 * @method static Builder|Candidates wherePhone($value)
 * @method static Builder|Candidates whereUpdatedAt($value)
 */
class Candidates extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name',
                           'gender',
                           'city',
                           'country',
                           'phone',
                           'email',
                           'job_title',
                           'department',
                           'description', ];
}
