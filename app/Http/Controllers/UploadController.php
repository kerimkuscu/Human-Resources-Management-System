<?php

namespace App\Http\Controllers;

use App\Enums\FileFormat;
use App\Models\Project;
use File;

class UploadController extends Controller
{
    public function store(Project $project)
    {
        $media = $project
            ->addMediaFromRequest('file')
            ->toMediaCollection('images');

        $extension = File::extension($media->file_name);

        return response()->json([
            'id'     => $media->id,
            'name'   => $media->file_name,
            'format' => FileFormat::label(FileFormat::getFormat($extension)),
            'size'   => file_size($media->size),
            'result' => true,
        ]);
    }
}
