<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Helpdesk;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReportCreatedMail;
use App\Mail\HelpdeskActionMail;
use App\Helpers\Logger;

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
                'location' => 'required|string|max:255',
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
            $report->location = $validatedData['location'];

            $report->save();

            Mail::to($report->email)->send(new ReportCreatedMail(
                $report->id,
                $report->name,
                $report->id_number,
                $report->email,
                $report->phone,
                $report->subject,
                $report->priority_level,
                $report->description,
                $report->location
            ));

            return redirect('/report')->with('success', 'Report filed successfully. Please wait for a call from the IT department to confirm your identity and address your issue.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', "An error occurred. Error: " . $e->getMessage());
        }

    }

    public function update_report(Request $request)
    {
        try {
            $button_pressed = $request->input('action');

            $validatedData = $request->validate([
                'id' => 'required|string|max:8',
                'reason' => 'max:255',
            ]);

            $report = Helpdesk::find($validatedData['id']);

            if (!$report) {
                return redirect('it-helpdesk')->with('error', 'Report not found.');
            }

            $user = session('user');
            $email = $report->email; // Assuming the report has an `email` field.

            switch ($button_pressed) {
                case 'respond':
                    $report->status = "Ongoing";
                    $report->assigned_to = $user->id;
                    $report->save();

                    $logDetails = ucwords($user->name) . " responded to Ticket # {$validatedData['id']}";
                    Logger::logAction('Responded to Report', $logDetails);

                    Mail::to($email)->send(new HelpdeskActionMail(
                        $report->id,
                        $report->name,
                        $report->employee_id,
                        $report->email,
                        $report->phone,
                        $report->topic,
                        $report->priority_level,
                        $report->description,
                        'respond',
                        $user->name
                    ));

                    return redirect('it-helpdesk')->with('success', 'Report responded.');
                    break;

                case 'mark_fake':
                    $report->status = "Fake";
                    $report->assigned_to = $user->id;
                    $report->save();

                    $logDetails = ucwords($user->name) . " marked Ticket # {$validatedData['id']} as fake";
                    Logger::logAction('Mark Report as Fake', $logDetails);

                    Mail::to($email)->send(new HelpdeskActionMail(
                        $report->id,
                        $report->name,
                        $report->employee_id,
                        $report->email,
                        $report->phone,
                        $report->topic,
                        $report->priority_level,
                        $report->description,
                        'make_fake'
                    ));

                    return redirect('it-helpdesk')->with('success', 'Report has been marked as Fake.');
                    break;

                case 'done':
                    $report->status = "Resolved";
                    $report->assigned_to = $user->id;
                    $report->save();

                    $logDetails = ucwords($user->name) . " marked Ticket # {$validatedData['id']} as Resolved";
                    Logger::logAction('Mark Report as Resolved', $logDetails);

                    Mail::to($email)->send(new HelpdeskActionMail(
                        $report->id,
                        $report->name,
                        $report->employee_id,
                        $report->email,
                        $report->phone,
                        $report->topic,
                        $report->priority_level,
                        $report->description,
                        'done'
                    ));

                    return redirect('it-helpdesk')->with('success', 'Report has been marked as Resolved.');
                    break;

                case 'delete':
                    $report->status = "Archived";
                    $report->reason = $validatedData['reason'];
                    $report->save();

                    $logDetails = ucwords($user->name) . " archived Ticket # {$validatedData['id']}";
                    Logger::logAction('Archive Report', $logDetails);

                    Mail::to($email)->send(new HelpdeskActionMail(
                        $report->id,
                        $report->name,
                        $report->employee_id,
                        $report->email,
                        $report->phone,
                        $report->topic,
                        $report->priority_level,
                        $report->description,
                        'delete',
                        null,
                        $report->reason,
                    ));

                    return redirect('it-helpdesk')->with('success', 'Report has been archived.');
                    break;

                case 'undo':
                    $report->status = "Pending";
                    $report->assigned_to = null;
                    $report->save();

                    $logDetails = ucwords($user->name) . " reverted Ticket # {$validatedData['id']} to Pending";
                    Logger::logAction('Revert Report to Pending', $logDetails);

                    Mail::to($email)->send(new HelpdeskActionMail(
                        $report->id,
                        $report->name,
                        $report->employee_id,
                        $report->email,
                        $report->phone,
                        $report->topic,
                        $report->priority_level,
                        $report->description,
                        'undo'
                    ));

                    return redirect('it-helpdesk')->with('success', 'Report has been reverted to Pending.');
                    break;

                default:
                    return redirect('it-helpdesk')->with('error', 'Unknown action.');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', "An error occurred. Error: " . $e->getMessage());
        }
    }
}
