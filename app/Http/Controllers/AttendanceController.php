<?php

namespace App\Http\Controllers;

use App\Http\Requests\AttendanceFormRequest;
use App\Http\Resources\AttendanceResource;
use App\Models\Attendance;
use Exception;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class AttendanceController extends Controller
{
    /**
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        $data = Attendance::query()->paginate(request('per_page', 25));

        return JsonResource::collection($data);
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
     * @param int $id
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
}
