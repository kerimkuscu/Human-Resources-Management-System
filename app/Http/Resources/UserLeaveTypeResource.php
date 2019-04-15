<?php

namespace App\Http\Resources;

use App\Models\UserLeaveType;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property-read UserLeaveType $resource
 */
class UserLeaveTypeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     *
     * @return array
     */
    public function toArray($request)
    {
        $model = $this->resource;

        return [
            'id'                    => $model->id,
            'leave_type'            => $model->leave_type,
            'leave_accrue_enabled'  => $model->leave_accrue_enabled,
            'leave_carried_forward' => $model->leave_carried_forward,
            'leaves_per_day'        => $model->leaves_per_day,
            'titles'                => $model->titles,
        ];
    }
}
