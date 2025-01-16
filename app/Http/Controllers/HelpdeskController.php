<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Helpdesk;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReportCreatedMail;

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

    public function add_report(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'id_number' => 'required|string|max:255',
                'phone' => 'required|string|max:11',
                'email' => 'required|string|max:255',
                'subject' => 'required|string|max:255',
                'description' => 'required|string|max:5535',
                'priority_level' => 'required|in:Low,Medium,High,Critical',
                'uploaded_images' => 'required|json',
            ]);

            $uploadedImages = json_decode($validatedData['uploaded_images'], true);

            $report = new Helpdesk();
            $report->name = $validatedData['name'];
            $report->id_number = $validatedData['id_number'];
            $report->phone = $validatedData['phone'];
            $report->email = $validatedData['email'];
            $report->subject = $validatedData['subject'];
            $report->description = $validatedData['description'];
            $report->priority_level = $validatedData['priority_level'];
            $report->attachments = json_encode($uploadedImages);

            $report->save();

            Mail::to($report->email)->send(new ReportCreatedMail(
                $report->id,
                $report->name,
                $report->id_number,
                $report->email,
                $report->phone,
                $report->subject,
                $report->priority_level,
                $report->description
            ));

            return redirect('/report')->with('success', 'Report filed successfully. Please wait for a call from the IT department to confirm your identity and address your issue.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', "An error occurred. Error: " . $e->getMessage());
        }

    }
}
