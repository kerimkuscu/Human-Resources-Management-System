<?php

namespace App\Http\Resources;

use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property-read Attendance $resource
 */
class AttendanceResource extends JsonResource
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
            'id'                   => $model->id,
            'employee_id'          => $model->employee_id,
            'time_in_date'         => $model->time_in_date,
            'time_in_time_hour'    => $model->time_in_time_hour,
            'time_in_time_minute'  => $model->time_in_time_minute,
            'time_out_date'        => $model->time_out_date,
            'time_out_time_hour'   => $model->time_out_time_hour,
            'time_out_time_minute' => $model->time_out_time_minute,
            'note'                 => $model->note,
        ];
    }
}
