<?php

namespace App\Http\Controllers;
use App\Models\Organization;
use App\Models\Clients;
use App\Helpers\Logger;

use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function delete_people(Request $request){
        $request->validate([
            'id' => 'required|integer',
        ]);

        $id = $request->input('id');

        $user = Organization::find($id);
        $name = ucwords($user->name);
        $title = ucwords($user->title);

        $status = Organization::find($id)->delete();

        Logger::logAction('Deleted User', 'Deleted personnel ' . $name . ' with title: ' . $title);

        if($status) {
            return redirect('/c-people')->with('delete-success', 'Personnel deleted successfully.');
        } else {
            // Redirect using URI with an error message
            return redirect('/c-people')->with('delete-error', 'Failed to delete the personnel.');
        }
    }

    public function update_people(Request $request) {
        try {
            $validatedData = $request->validate([
                'id' => 'required|exists:cms.organizations,id',
                'name' => 'required|string|max:255',
                'title' => 'required|string|max:255',
                'category' => 'required|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $organization = Organization::find($validatedData['id']);;

            $fields = ['name', 'title', 'category'];
            $changes = [];

            $old_name = ucwords($organization->name);

            foreach ($fields as $field) {
                $old_value = ucwords($organization->$field);
                $new_value = ucwords($validatedData[$field]);

                if ($old_value !== $new_value) {
                    $changes[] = "{$field} from '{$old_value}' to '{$new_value}'";
                    $organization->$field = $new_value; // Update the field in the organization object
                }
            }

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('img/organization/'), $fileName);

                if (ucwords($organization->image) !== ucwords($fileName)) {
                    $changes[] = "image from '{$organization->image}' to '{$fileName}'";
                }

                $organization->image = $fileName;
            }

            $organization->name = $validatedData['name'];
            $organization->title = $validatedData['title'];
            $organization->category = $validatedData['category'];

            if (!empty($changes)) {
                $changeSummary = implode(', ', $changes);
                Logger::logAction(
                    'Updated Personnel Information',
                    "Updated personnel {$old_name}'s information: {$changeSummary}."
                );
            }

            $organization->save();

            return redirect('/c-people')->with('update-success', 'Personnel information updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('update-failed', "An error occured. Error: " . $e->getMessage());
        }
    }

    public function add_people(Request $request) {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'title' => 'required|string|max:255',
                'category' => 'required|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '_' . $image->getClientOriginalName();
                $imagePath = public_path('img/organization/');
                $image->move($imagePath, $imageName);

                $validatedData['image'] = $imageName;
            }

            // Create a new organization entry
            $organization = new Organization;
            $organization->name = $validatedData['name'];
            $organization->title = $validatedData['title'];
            $organization->category = $validatedData['category'];
            $organization->image = $validatedData['image'] ?? null; // Use existing image or null if none
            $organization->save();

            Logger::logAction(
                'Added New Personnel',
                "Added a new personnel with the following details:
                Name: " . ucwords($organization->name) . ",
                Title: " . ucwords($organization->title) . ",
                Category: " . ucwords($organization->category) . ",
                Image: " . ($organization->image ? $organization->image : 'No Image')
            );

            return redirect('/c-people')->with('add-success', 'Organization personnel added successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('add-failed', "An error occurred. Error: " . $e->getMessage());
        }
    }


    public function delete_client(Request $request) {
        $request->validate([
            'id' => 'required|integer',
        ]);

        $id = $request->input('id');

        // Retrieve the client's name before deletion
        $client = Clients::find($id);

        if (!$client) {
            return redirect('/c-clients')->with('delete-error', 'Client not found.');
        }

        $clientName = $client->name;
        $status = $client->delete();

        if ($status) {
            Logger::logAction(
                'Deleted Client',
                "Deleted client: " . ucwords($clientName) . " (ID: {$id})."
            );

            return redirect('/c-clients')->with('delete-success', 'Client deleted successfully.');
        } else {
            return redirect('/c-clients')->with('delete-error', 'Failed to delete the client.');
        }
    }


    public function update_client(Request $request) {
        try {
            $validatedData = $request->validate([
                'id' => 'required|exists:cms.clients,id',
                'name' => 'required|string|max:255',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $client = Clients::find($validatedData['id']);

            $oldName = $client->name;
            $oldImage = $client->image;

            $client->name = $validatedData['name'];

            $changes = [];

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('img/clients/'), $fileName);

                if ($oldImage !== $fileName) {
                    $changes[] = "image from '{$oldImage}' to '{$fileName}'";
                    $client->image = $fileName;
                }
            }

            if ($oldName !== $client->name) {
                $changes[] = "name from ". ucwords($oldName) ." to " . ucwords($client->name);
            }

            $client->save();

            if (!empty($changes)) {
                $changeSummary = implode(', ', $changes);
                Logger::logAction(
                    'Updated Client Information',
                    "Updated client (ID: {$validatedData['id']}): {$changeSummary}."
                );
            }

            return redirect('/c-clients')->with('update-success', 'Client information updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('update-failed', "An error occurred. Error: " . $e->getMessage());
        }
    }


    public function add_client(Request $request) {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '_' . $image->getClientOriginalName();
                $imagePath = public_path('img/clients/');
                $image->move($imagePath, $imageName);

                $validatedData['image'] = $imageName;
            }

            $client = new Clients;
            $client->name = $validatedData['name'];
            $client->image = $validatedData['image'] ?? null; // Use uploaded image or null if none
            $client->save();

            $logDetails = "Added new client: name " . ucwords($validatedData['name']);
            if (isset($validatedData['image'])) {
                $logDetails .= ", image '{$validatedData['image']}'";
            }

            Logger::logAction('Add Client', $logDetails);

            return redirect('/c-clients')->with('add-success', 'Client added successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('add-failed', "An error occurred. Error: " . $e->getMessage());
        }
    }

}
