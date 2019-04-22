<?php

namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Carbon;

/**
 * App\Models\Documentation
 *
 * @property int         $id
 * @property string      $file_name
 * @property string      $file_type
 * @property int         $size
 * @property int         $format
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Documentation newModelQuery()
 * @method static Builder|Documentation newQuery()
 * @method static Builder|Documentation query()
 * @method static Builder|Documentation whereCreatedAt($value)
 * @method static Builder|Documentation whereFileName($value)
 * @method static Builder|Documentation whereFileType($value)
 * @method static Builder|Documentation whereFormat($value)
 * @method static Builder|Documentation whereId($value)
 * @method static Builder|Documentation whereSize($value)
 * @method static Builder|Documentation whereUpdatedAt($value)
 * @method hasOne(string $class)
 * @mixin Eloquent
 */
class Documentation extends Model
{
    /**
     * Get the project
     *
     * @return HasOne
     */
    public function profile()
    {
        return $this->hasOne(Project::class);
    }
}
