<?php

namespace App\Http\Controllers;

use App\Jobs\FileUploadJob;
use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    public function index()
    {
        return view('file_upload');
    }

    public function upload(Request $request)
    {
        // Validate the uploaded file
        $request->validate([
            'file' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048', // 2MB max
        ]);

        // Store the file temporarily
        $filePath = $request->file('file')->store('temp', 'public');

        // Dispatch the job with the file path
        FileUploadJob::dispatch($filePath);

        // Redirect back with a success message
        return redirect()->route('file.upload.form')->with('success', 'File is being processed.');
    }
}
