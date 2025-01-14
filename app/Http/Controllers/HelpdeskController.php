<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelpdeskController extends Controller
{
    public function add_img(Request $request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = $file->getClientOriginalName();
            $file->move(public_path('img/helpdesk'), $filename);
            return response()->json(['success' => $filename]);
        }
        return response()->json(['error' => 'No file uploaded'], 400);
    }

    public function remove_img(Request $request)
    {
        $filename = $request->input('filename');
        $filePath = public_path('img/helpdesk') . '/' . $filename;

        if (file_exists($filePath)) {
            unlink($filePath);
            return response()->json(['success' => 'File deleted successfully']);
        }
        return response()->json(['error' => 'File not found'], 404);
    }
}
