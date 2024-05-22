<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\File;
use Illuminate\Support\Facades\Storage;

class FileUploadController extends Controller
{
    public function __invoke(Request $request): \Illuminate\Http\JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'file' => 'required|file|mimes:pdf|max:10240',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $file = $request->file('file');

        if ($file->getClientOriginalExtension() !== 'pdf') {
            return response()->json(['error' => 'The file must be a PDF.'], 422);
        }

        $content = file_get_contents($file->getPathname());
        if (!str_contains($content, 'Proposal')) {
            return response()->json(['error' => 'The file must contain the word "Proposal".'], 422);
        }

        $fileName = $file->getClientOriginalName();
        $fileSize = $file->getSize();

        $existingFile = File::where('name', $fileName)->where('size', $fileSize)->first();

        if ($existingFile) {
            $existingFile->updated_at = now();
            $existingFile->save();
        } else {
            $path = $file->storeAs('files', $fileName);
            File::create([
                'name' => $fileName,
                'size' => $fileSize,
            ]);
        }

        return response()->json(['success' => 'File uploaded successfully.']);
    }
}
