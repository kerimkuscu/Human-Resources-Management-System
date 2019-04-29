<?php

namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

/**
 * App\Models\Project
 *
 * @property int         $id
 * @property string      $project_name
 * @property string      $details
 * @property string      $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @method static Builder|Project newModelQuery()
 * @method static Builder|Project newQuery()
 * @method static Builder|Project query()
 * @method static Builder|Project whereCreatedAt($value)
 * @method static Builder|Project whereDetails($value)
 * @method static Builder|Project whereId($value)
 * @method static Builder|Project whereProjectName($value)
 * @method static Builder|Project whereStatus($value)
 * @method static Builder|Project whereUpdatedAt($value)
 * @method belongsTo(string $class, string $string)
 * @mixin Eloquent
 */
class Project extends Model
{

    use HasMediaTrait;

    /**
     * @var array
     */
    protected $fillable = ['project_name',
        'details',
        'status', ];

    /**
     * @return HasMany
     */
    public function documentation()
    {
        return $this->hasMany(Documentation::class);
    }
}
