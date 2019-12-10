<?php

namespace App\Http\Controllers;

use App\Http\Requests\CandidatesFormRequest;
use App\Http\Resources\CandidatesResource;
use App\Models\Candidates;
use Exception;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class CandidatesController extends Controller
{
    /**
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        $data = Candidates::query()->paginate(request('per_page', 25));

        return JsonResource::collection($data);
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
     * @param int $id
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
}
