<?php

namespace App\Http\Controllers;

use App\Models\UploadedFile;
use Illuminate\Http\Request;

class UploadController extends Controller
{
   // stores the upload
   public function store(Request $request)
   {
       // Validate the incoming file. Refuses anything bigger than 2048 kilobyes (=2MB)
       $request->validate([
           'avatar' => 'required|mimes:pdf,jpg,png|max:2048',
       ]);

       $file = $request->file('avatar');
       $fileName = $file->getClientOriginalName();
       $filePath = $file->store('uploads', 'public');

       // Store file information in the database
       $uploadedFile = new UploadedFile();
       $uploadedFile->filename = $fileName;
       $uploadedFile->original_name = $file->getClientOriginalName();
       $uploadedFile->file_path = $filePath;
       $uploadedFile->save();

    return response()->json(true);
   }

   // shows the uploads index
   public function index()
   {
       $uploadedFiles = UploadedFile::all();
       return view('uploads.index', compact('uploadedFiles'));
   }
}
