<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserFormRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;
use Tymon\JWTAuth\Contracts\Providers\Auth;

class UserController extends Controller
{
    /**
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        $data = User::query()->paginate(request('per_page', 25));

        return JsonResource::collection($data);
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
}
