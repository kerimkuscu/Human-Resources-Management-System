<?php

namespace App\Http\Controllers;

use App\Http\Requests\DocumentationFormRequest;
use App\Http\Resources\DocumentationResource;
use App\Models\Documentation;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class DocumentationController extends Controller
{
    /**
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        return DocumentationResource::collection(Documentation::all());
    }

    /**
     * @param $id
     *
     * @return DocumentationResource
     */
    public function show($id)
    {
        $model = Documentation::findOrFail($id);

        return new DocumentationResource($model);
    }

    /**
     * @param DocumentationFormRequest $request
     *
     * @return DocumentationResource
     */
    public function store(DocumentationFormRequest $request)
    {
        $data = Documentation::create($request->all());

        return new DocumentationResource($data);
    }

    /**
     * @param DocumentationFormRequest $request
     * @param int                      $id
     *
     * @return DocumentationResource
     */
    public function update(DocumentationFormRequest $request, $id)
    {
        $model = Documentation::findOrFail($id);

        $model->update($request->all());

        return new DocumentationResource($model);
    }

    /**
     * @param int $id
     *
     * @throws Exception
     */
    public function destroy($id)
    {
        $model = Documentation::findOrFail($id);

        $model->delete();
    }

    /**
     * @return JsonResponse
     */
    public function getTitles()
    {
        $data = ['file_name' => 'File Name',
            'file_type' => 'File Type', ];

        $data = collect($data)->map(function($item, $key) {
            return ['prop' => $key, 'label' => $item];
        })->values();

        return response()->json($data);
    }
}
