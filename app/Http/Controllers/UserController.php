<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserFormRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Auth;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class UserController extends Controller
{
    /**
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        return UserResource::collection(User::all());
    }

    /**
     * @return UserResource
     */
    public function me()
    {
        $model = Auth::user();

        return new UserResource($model);
    }

    /**
     * @param int $id
     *
     * @return UserResource
     */
    public function show($id)
    {
        return new UserResource(User::findOrFail($id));
    }

    /**
     * @param UserFormRequest $request
     *
     * @return UserResource
     */
    public function store(UserFormRequest $request)
    {
        $data = $this->getUser()->leaves()->create($request->all());

        return new UserResource($data);
    }

    /**
     * @param UserFormRequest $request
     * @param int             $id
     *
     * @return UserResource
     */
    public function update(UserFormRequest $request, $id)
    {
        $model = User::findOrFail($id);

        $model->update($request->all());

        return new UserResource($model);
    }

    public function getTitles()
    {
        $data = ['name' => 'Name',
            'email'     => 'Email',
            'role_id'   => 'Role', ];

        $data = collect($data)->map(function($users, $key) {
            return ['prop' => $key, 'label' => $users];
        })->values();

        return response()->json($data);
    }
}
