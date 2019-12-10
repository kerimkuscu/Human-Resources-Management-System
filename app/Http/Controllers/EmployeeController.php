<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeFormRequest;
use App\Http\Resources\EmployeeResource;
use App\Models\Employee;
use Exception;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeController extends Controller
{
    /**
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        $data = Employee::query()->paginate(request('per_page', 25));

        return JsonResource::collection($data);
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
     * @param int $id
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
     * @throws Exception
     */
    public function destroy($id)
    {
        $model = Employee::findOrFail($id);

        $model->delete();
    }
}
