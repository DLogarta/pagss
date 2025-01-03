<?php

namespace App\Http\Controllers;
use App\Models\Organization;
use App\Models\Clients;

use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function delete_people(Request $request){
        $request->validate([
            'id' => 'required|integer',
        ]);

        $id = $request->input('id');

        $status = Organization::find($id)->delete();

        if($status) {
            return redirect('/c-people')->with('delete-success', 'Personel deleted successfully.');
        } else {
            // Redirect using URI with an error message
            return redirect('/c-people')->with('delete-error', 'Failed to delete the personel.');
        }
    }

    public function update_people(Request $request) {
        try {
            $validatedData = $request->validate([
                'id' => 'required|exists:organizations,id',
                'name' => 'required|string|max:255',
                'title' => 'required|string|max:255',
                'category' => 'required|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
    
            $organization = Organization::find($validatedData['id']);
    
            $organization->name = $validatedData['name'];
            $organization->title = $validatedData['title'];
            $organization->category = $validatedData['category'];
    
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('img/organization/'), $fileName);
                $organization->image = $fileName;
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
    
            $organization = new Organization;
            $organization->name = $validatedData['name'];
            $organization->title = $validatedData['title'];
            $organization->category = $validatedData['category'];
            $organization->image = $validatedData['image'] ?? null; // Use existing image or null if none
    
            $organization->save();
    
            return redirect('/c-people')->with('add-success', 'Organization personnel added successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('add-failed', "An error occured. Error: " . $e->getMessage());
        }
    }

    public function delete_client(Request $request){
        $request->validate([
            'id' => 'required|integer',
        ]);

        $id = $request->input('id');

        $status = Clients::find($id)->delete();

        if($status) {
            return redirect('/c-clients')->with('delete-success', 'Client deleted successfully.');
        } else {
            // Redirect using URI with an error message
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
    
            $client->name = $validatedData['name'];
    
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('img/clients/'), $fileName);
                $client->image = $fileName;
            }
    
            $client->save();
    
            return redirect('/c-clients')->with('update-success', 'Client information updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('update-failed', "An error occured. Error: " . $e->getMessage());
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
            $client->image = $validatedData['image'] ?? null; // Use existing image or null if none
    
            $client->save();
    
            return redirect('/c-clients')->with('add-success', 'Client added successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('add-failed', "An error occured. Error: " . $e->getMessage());
        }
    }
}
