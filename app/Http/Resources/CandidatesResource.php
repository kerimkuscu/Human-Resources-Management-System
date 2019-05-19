<?php

namespace App\Http\Resources;

use App\Models\Candidates;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property-read Candidates $resource
 */
class CandidatesResource extends JsonResource
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
            'id'          => $model->id,
            'name'        => $model->name,
            'gender'      => $model->gender,
            'city'        => $model->city,
            'country'     => $model->country,
            'phone'       => $model->phone,
            'email'       => $model->email,
            'job_title'   => $model->job_title,
            'department'  => $model->department,
            'description' => $model->description,
        ];
    }
}
