<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Contact;

class EditController extends Controller
{
    public function index()
    {
         // Get the next available project ID
         $nextId = Project::max('id') + 1;

         // Retrieve all pre-made contacts
         $contacts = Contact::all();
 
         return view('edit', compact('nextId', 'contacts'));
    }
    public function addProject(Request $request)
    {
        //assuming all given data is correct for time constraints
        return redirect()->route('edit.index')->with('success', 'Record added successfully.');
    }
}
