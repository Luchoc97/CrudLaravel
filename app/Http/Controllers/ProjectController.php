<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{

    public function index()
    {
        $projects = Project::where(
            'user_id',
            auth()->id()
        )->get();

        return view(
            'projects.index',
            compact('projects')
        );
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {
        Project::create([
            'user_id'=>auth()->id(),
            'title'=>$request->title,
            'description'=>$request->description,
            'status'=>$request->status,
            'technology'=>$request->technology
        ]);

        return redirect()
            ->route('projects.index');
    }
    
    public function edit(Project $project)
    {
        return view(
            'projects.edit',
            compact('project')
        );
    }

    public function update(
        Request $request,
        Project $project
    )
    {
        $project->update([

            'title'=>$request->title,

            'description'=>$request->description,

            'status'=>$request->status,

            'technology'=>$request->technology

        ]);

        return redirect()
            ->route('projects.index');
    }

    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()
            ->route('projects.index');
    }
}