<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::where('id', '>', 0)
            ->orderBy('name', 'ASC')
            ->paginate(20);

        return view('projects.index', [
            'projects' => $projects
        ]);
    }

    public function internalIndex()
    {
        $projects = Project::where('id', '>', 0)
            ->where('type', 'internal')
            ->orderBy('name', 'ASC')
            ->paginate(20);

        return view('projects.internal.internalIndex', [
            'projects' => $projects
        ]);
    }

    public function externalIndex()
    {
        $projects = Project::where('id', '>', 0)
            ->where('type', 'external')
            ->orderBy('name', 'ASC')
            ->paginate(20);

        return view('projects.external.externalIndex', [
            'projects' => $projects
        ]);
    }

    public function pipelineIndex()
    {
        $projects = Project::where('id', '>', 0)
            ->where('type', 'pipeline')
            ->orderBy('name', 'ASC')
            ->paginate(20);

        return view('projects.pipeline.pipelineIndex', [
            'projects' => $projects
        ]);
    }

    public function archivedIndex()
    {
        $projects = Project::where('id', '>', 0)
            ->where('archived', 1)
            ->orderBy('name', 'ASC')
            ->paginate(20);

        return view('projects.archived.archivedIndex', [
            'projects' => $projects
        ]);
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request, Project $project)
    {
    }

    public function edit($id)
    {
        if (auth()->user()->isAdmin !== 1) {
            abort(403);
        }

        $project = Project::findOrFail($id);

        $arr['project'] = $project;

        //dd($arr);
        return view('projects.edit')->with($arr);
    }

    public function update(Request $request, $id)
    {
    }

    public function show($id)
    {

        $project = Project::findOrFail($id);

        return view('projects.show', compact('project'));
    }

    public function destroy($id)
    {

        Project::destroy($id);

        return redirect('/')->with('success', 'Project successfully deleted!');
    }
}
