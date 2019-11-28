<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeFormRequest;
use App\Http\Resources\EmployeeResource;
use App\Models\Employee;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class EmployeeController extends Controller
{
    /**
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        return EmployeeResource::collection(Employee::all());
    }

    /**
     * @param int $id
     *
     * @return EmployeeResource
     */
    public function show($id)
    {
        $model = Employee::findOrFail($id);

        return new EmployeeResource($model);
    }

    /**
     * @param EmployeeFormRequest $request
     *
     * @return EmployeeResource
     */
    public function store(EmployeeFormRequest $request)
    {
        $data = Employee::create($request->all());

        return new EmployeeResource($data);
    }

    /**
     * @param EmployeeFormRequest $request
     * @param int                 $id
     *
     * @return EmployeeResource
     */
    public function update(EmployeeFormRequest $request, $id)
    {
        $model = Employee::findOrFail($id);

        $model->update($request->all());

        return new EmployeeResource($model);
    }

    /**
     * @param int $id
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $model = Employee::findOrFail($id);

        $model->delete();
    }

    /**
     * @return JsonResponse
     */
    public function getTitles()
    {
        $data = ['name'         => 'Name',
            'birthday'          => 'Birthday',
            'gender'            => 'Gender',
            'employment_status' => 'Employment Status',
            'job_title'         => 'Job Title',
            'joined_date'       => 'Joined Date',
            'department'        => 'Department', ];

        $data = collect($data)->map(function($item, $key) {
            return ['prop' => $key, 'label' => $item];
        })->values();

        return response()->json($data);
    }
}
