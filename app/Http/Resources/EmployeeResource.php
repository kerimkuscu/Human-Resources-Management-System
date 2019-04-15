<?php

namespace App\Http\Resources;

use App\Models\Employee;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property-read Employee $resource
 */
class EmployeeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function toArray($request)
    {
        $model = $this->resource;

        return [
            'id'                => $model->id,
            'name'              => $model->name,
            'nationality'       => $model->nationality,
            'birthday'          => $model->birthday,
            'gender'            => $model->gender,
            'marital_status'    => $model->marital_status,
            'driver_license'    => $model->driver_license,
            'employment_status' => $model->employment_status,
            'job_title'         => $model->job_title,
            'address'           => $model->address,
            'city'              => $model->city,
            'country'           => $model->country,
            'province'          => $model->province,
            'postal_code'       => $model->postal_code,
            'home_phone'        => $model->home_phone,
            'mobile_phone'      => $model->mobile_phone,
            'work_phone'        => $model->work_phone,
            'emergency_contact' => $model->emergency_contact,
            'work_email'        => $model->work_email,
            'private_email'     => $model->private_email,
            'joined_date'       => $model->joined_date,
            'department'        => $model->department,
        ];
    }
}
