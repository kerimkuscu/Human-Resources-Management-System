<?php

namespace App\Http\Controllers;

use App\Http\Requests\AttendanceFormRequest;
use App\Http\Resources\AttendanceResource;
use App\Models\Attendance;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class AttendanceController extends Controller
{
    /**
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        return AttendanceResource::collection(Attendance::all());
    }

    /**
     * @param $id
     *
     * @return AttendanceResource
     */
    public function show($id)
    {
        $model = Attendance::findOrFail($id);

        return new AttendanceResource($model);
    }

    /**
     * @param AttendanceFormRequest $request
     *
     * @return AttendanceResource
     */
    public function store(AttendanceFormRequest $request)
    {
        $data = Attendance::create($request->all());

        return new AttendanceResource($data);
    }

    /**
     * @param AttendanceFormRequest $request
     * @param int                   $id
     *
     * @return AttendanceResource
     */
    public function update(AttendanceFormRequest $request, $id)
    {
        $model = Attendance::findOrFail($id);

        $model->update($request->all());

        return new AttendanceResource($model);
    }

    /**
     * @param int $id
     *
     * @throws Exception
     */
    public function destroy($id)
    {
        $model = Attendance::findOrFail($id);

        $model->delete();
    }

    /**
     * @return JsonResponse
     */
    public function getTitles()
    {
        $data = ['employee_id' => 'Employee', ];

        $data = collect($data)->map(function($item, $key) {
            return ['prop' => $key, 'label' => $item];
        })->values();

        return response()->json($data);
    }
}
