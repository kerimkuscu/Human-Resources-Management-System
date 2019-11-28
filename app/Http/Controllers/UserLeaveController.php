<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLeaveFormRequest;
use App\Http\Resources\UserLeaveResource;
use App\Models\UserLeave;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Response;

class UserLeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection|Response
     */
    public function index()
    {
        $data = UserLeave::query()->paginate(request('per_page', 25));

        return JsonResource::collection($data);
    }

    /**
     * @param int $id
     *
     * @return UserLeaveResource
     */
    public function show($id)
    {
        $model = UserLeave::findOrFail($id);

        return new UserLeaveResource($model);
    }

    /**
     * @param UserLeaveFormRequest $request
     *
     * @return UserLeaveResource
     */
    public function store(UserLeaveFormRequest $request)
    {
        $data = $this->getUser()->leaves()->create($request->all());

        return new UserLeaveResource($data);
    }

    /**
     * @param UserLeaveFormRequest $request
     * @param int                  $id
     *
     * @return UserLeaveResource
     */
    public function update(UserLeaveFormRequest $request, $id)
    {
        $model = UserLeave::findOrFail($id);

        $model->update($request->all());

        return new UserLeaveResource($model);
    }
}
