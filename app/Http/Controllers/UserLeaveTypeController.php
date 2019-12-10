<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLeaveTypeFormRequest;
use App\Http\Resources\UserLeaveTypeResource;
use App\Models\UserLeaveType;
use Exception;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class UserLeaveTypeController extends Controller
{
    /**
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        $data = UserLeaveType::query()->paginate(request('per_page', 25));

        return JsonResource::collection($data);
    }

    /**
     * @param int $id
     *
     * @return UserLeaveTypeResource
     */
    public function show($id)
    {
        $model = UserLeaveType::findOrFail($id);

        return new UserLeaveTypeResource($model);
    }

    /**
     * @param UserLeaveTypeFormRequest $request
     *
     * @return UserLeaveTypeResource
     */
    public function store(UserLeaveTypeFormRequest $request)
    {
        $data = UserLeaveType::create($request->all());

        return new UserLeaveTypeResource($data);
    }

    /**
     * @param UserLeaveTypeFormRequest $request
     * @param int $id
     *
     * @return UserLeaveTypeResource
     */
    public function update(UserLeaveTypeFormRequest $request, $id)
    {
        $model = UserLeaveType::findOrFail($id);

        $model->update($request->all());

        return new UserLeaveTypeResource($model);
    }

    /**
     * @param int $id
     *
     * @throws Exception
     */
    public function destroy($id)
    {
        $model = UserLeaveType::findOrFail($id);

        $model->delete();
    }
}
