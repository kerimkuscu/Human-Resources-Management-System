<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRoleFormRequest;
use App\Http\Resources\UsersRoleResource;
use App\Models\UserRole;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class UserRoleController extends Controller
{
    /**
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        return UsersRoleResource::collection(UserRole::all());
    }

    /**
     * @return JsonResponse
     */
    public function getTitles()
    {
        $data = ['users_role' => 'Role Name', ];

        $data = collect($data)->map(function($item, $key) {
            return ['prop' => $key, 'label' => $item];
        })->values();

        return response()->json($data);
    }

    /**
     * @param UserRoleFormRequest $request
     *
     * @return UsersRoleResource
     */
    public function store(UserRoleFormRequest $request)
    {
        $data = UserRole::create($request->all());

        return new UsersRoleResource($data);
    }

    /**
     * @param int $id
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $model = UserRole::findOrFail($id);

        $model->delete();
    }
}
