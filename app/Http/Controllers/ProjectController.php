<?php

namespace App\Http\Controllers;
use App\Project;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * NEW PROJECT IMPLEMENTATION STARTS
     */
    public function index()
    {
        return Project::all();
    }

     /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return $project;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $project = Project::create($request->all());

        return response()->json($project, 201);
    }

      /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $project->update($request->all());

        return response()->json($project, 200);
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function delete(Project $project)
    {
        $project->delete();

        // return response()->json(null, 204);
        session()->flash('message.alert', 'success');
        session()->flash('message.content', "Project Successfully Deleted");
        return back();
    }
}