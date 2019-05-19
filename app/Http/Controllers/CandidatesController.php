<?php

namespace App\Http\Controllers;

use App\Http\Requests\CandidatesFormRequest;
use App\Http\Resources\CandidatesResource;
use App\Models\Candidates;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CandidatesController extends Controller
{
    /**
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        return CandidatesResource::collection(Candidates::all());
    }

    /**
     * @param int $id
     *
     * @return CandidatesResource
     */
    public function show($id)
    {
        $model = Candidates::findOrFail($id);

        return new CandidatesResource($model);
    }

    /**
     * @param CandidatesFormRequest $request
     *
     * @return CandidatesResource
     */
    public function store(CandidatesFormRequest $request)
    {
        $data = Candidates::create($request->all());

        return new CandidatesResource($data);
    }

    /**
     * @param CandidatesFormRequest $request
     * @param int                   $id
     *
     * @return CandidatesResource
     */
    public function update(CandidatesFormRequest $request, $id)
    {
        $model = Candidates::findOrFail($id);

        $model->update($request->all());

        return new CandidatesResource($model);
    }

    /**
     * @param int $id
     *
     * @throws Exception
     */
    public function destroy($id)
    {
        $model = Candidates::findOrFail($id);

        $model->delete();
    }

    /**
     * @return JsonResponse
     */
    public function getTitles()
    {
        $data = ['name'  => 'Name',
                 'phone'      => 'Phone Number',
                 'email'      => 'Email',
                 'job_title'  => 'Job Title',
                 'department' => 'Department', ];

        $data = collect($data)->map(function($item, $key) {
            return ['prop' => $key, 'label' => $item];
        })->values();

        return response()->json($data);
    }
}
