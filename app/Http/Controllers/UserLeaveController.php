<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLeaveFormRequest;
use App\Http\Resources\UserLeaveResource;
use App\Models\UserLeave;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class UserLeaveController extends Controller
{
    /**
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        //        return UserLeaveResource::collection($this->getUser()->leaves);

        return UserLeaveResource::collection(UserLeave::all());
    }

    /**
     * @return JsonResponse
     */
    public function getTitles()
    {
        $data = ['user.name' => 'Name',
             'description'   => 'Description',
             'started_at'    => 'Start Date',
             'ended_at'      => 'End Date',
             'approved_by'   => 'Approved By',
             'approved_at'   => 'Approved At',
            ];

        $data = collect($data)->map(function($item, $key) {
            return ['prop' => $key, 'label' => $item];
        })->values();


        return response()->json($data);
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
