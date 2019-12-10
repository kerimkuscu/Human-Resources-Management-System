<?php

namespace App\Http\Controllers;

use App\Models\UserRole;
use Exception;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class UserRoleController extends Controller
{
    /**
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        $data = UserRole::query()->paginate(request('per_page', 25));

        return JsonResource::collection($data);
    }

    /**
     * @param int $id
     *
     * @throws Exception
     */
    public function destroy($id)
    {
        $model = UserRole::findOrFail($id);

        $model->delete();
    }
}
