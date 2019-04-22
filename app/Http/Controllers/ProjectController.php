<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectFormRequest;
use App\Http\Resources\ProjectResource;
use App\Models\Project;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ProjectController extends Controller
{
    /**
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        return ProjectResource::collection(Project::all());
    }

    /**
     * @param $id
     *
     * @return ProjectResource
     */
    public function show($id)
    {
        $model = Project::findOrFail($id);

        return new ProjectResource($model);
    }

    /**
     * @param ProjectFormRequest $request
     *
     * @return ProjectResource
     */
    public function store(ProjectFormRequest $request)
    {
        $data = Project::create($request->all());

        return new ProjectResource($data);
    }

    /**
     * @param ProjectFormRequest $request
     * @param int                $id
     *
     * @return ProjectResource
     */
    public function update(ProjectFormRequest $request, $id)
    {
        $model = Project::findOrFail($id);

        $model->update($request->all());

        return new ProjectResource($model);
    }

    /**
     * @param int $id
     *
     * @throws Exception
     */
    public function destroy($id)
    {
        $model = Project::findOrFail($id);

        $model->delete();
    }

    /**
     * @return JsonResponse
     */
    public function getTitles()
    {
        $data = ['project_name' => 'Project Name',
            'status'       => 'Status', ];

        $data = collect($data)->map(function($item, $key) {
            return ['prop' => $key, 'label' => $item];
        })->values();

        return response()->json($data);
    }
}
