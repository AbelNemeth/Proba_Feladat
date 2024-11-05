<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $projects = Project::with('contacts')->get(); // If you have a relationship with contacts

        // Pass the projects to the view
        return view('home', ['projects' => $projects]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $project = Project::create([
            'id' => $request->id,
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status,
        ]);

        $project->contacts()->attach($request->contacts);

        return redirect()->route('projects.edit')->with('success', 'Project added successfully.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();

        // Optionally, you can add a success message and redirect
        return redirect()->route('home.index')->with('success', 'Project deleted successfully.');
    }
}
