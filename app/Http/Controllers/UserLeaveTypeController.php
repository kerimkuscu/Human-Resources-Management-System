<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLeaveTypeFormRequest;
use App\Http\Resources\UserLeaveTypeResource;
use App\Models\UserLeaveType;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class UserLeaveTypeController extends Controller
{
    /**
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        return UserLeaveTypeResource::collection(UserLeaveType::all());
    }

    /**
     * Return data grid title
     *
     * @return array
     */
    public function getTitles()
    {
        $data = [
            'leave_type'     => 'Leave Type',
            'leaves_per_day' => 'Leave Per Day',
        ];

        $data = collect($data)->map(function($item, $key) {
            return ['prop' => $key, 'label' => $item];
        })->values();


        return response()->json($data);
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
     * @param int                      $id
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
     * @throws \Exception
     */
    public function destroy($id)
    {
        $model = UserLeaveType::findOrFail($id);

        $model->delete();
    }
}
