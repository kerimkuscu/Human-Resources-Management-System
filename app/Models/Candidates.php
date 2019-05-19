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
