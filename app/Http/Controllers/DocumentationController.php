<?php

namespace App\Http\Controllers;

use App\Enums\FileFormat;
use App\Http\Requests\DocumentationFormRequest;
use App\Http\Resources\DocumentationResource;
use App\Models\Documentation;
use Exception;
use File;
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
     * @param Documentation $request
     *
     * @return DocumentationResource
     */
    public function store(Documentation $request)
    {
//        $data = Documentation::create($request->all());
//
//        return new DocumentationResource($data);

        $media = $request
            ->addMediaFromRequest('file')
            ->toMediaCollection('documentations');

        $extension = File::extension($media->file_name);

        return response()->json([
            'id'     => $media->id,
            'name'   => $media->file_name,
            'format' => FileFormat::label(FileFormat::getFormat($extension)),
            'size'   => file_size($media->size),
            'result' => true,
        ]);
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
            'file_type'      => 'File Type', ];

        $data = collect($data)->map(function($item, $key) {
            return ['prop' => $key, 'label' => $item];
        })->values();

        return response()->json($data);
    }
}
