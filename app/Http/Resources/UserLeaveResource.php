<?php

namespace App\Http\Resources;

use App\Models\UserLeave;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property-read UserLeave $resource
 */
class UserLeaveResource extends JsonResource
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
            'id'            => $model->id,
            'leave_type_id' => $model->leave_type_id,
            'started_at'    => $model->started_at->toDateString(),
            'ended_at'      => $model->ended_at->toDateString(),
            'description'   => $model->description,
            'approved_at'   => $model->approved_at,
            'approved_by'   => [
                'name'  => optional($model->approver)->name,
                'email' => optional($model->approver)->email,
            ],
            'user' => [
                'name'  => $model->user->name,
                'email' => $model->user->email,
            ],
        ];
    }
}
