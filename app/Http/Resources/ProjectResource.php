<?php

namespace App\Http\Resources;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property-read Project $resource
 */
class ProjectResource extends JsonResource
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
            'id'           => $model->id,
            'project_name' => $model->project_name,
            'details'      => $model->details,
            'status'       => $model->status,
        ];
    }
}
