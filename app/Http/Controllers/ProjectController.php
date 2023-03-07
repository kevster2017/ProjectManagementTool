<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $intprojects = Project::where('id', '>', 0)
            ->where('type', 'Internal')
            ->orderBy('projectName', 'ASC')
            ->get();

        $extprojects = Project::where('id', '>', 0)
            ->where('type', 'External')
            ->orderBy('projectName', 'ASC')
            ->get();

        $pipeprojects = Project::where('id', '>', 0)
            ->where('type', 'Pipeline')
            ->orderBy('projectName', 'ASC')
            ->get();

        return view('projects.index', [
            'intprojects' => $intprojects,
            'extprojects' => $extprojects,
            'pipeprojects' => $pipeprojects
        ]);
    }

    public function internalIndex()
    {
        $projects = Project::where('id', '>', 0)
            ->where('type', 'Internal')
            ->orderBy('projectName', 'ASC')
            ->paginate(10);

        return view('projects.internal.internalIndex', [
            'projects' => $projects
        ]);
    }

    public function externalIndex()
    {
        $projects = Project::where('id', '>', 0)
            ->where('type', 'External')
            ->orderBy('projectName', 'ASC')
            ->paginate(10);

        return view('projects.external.externalIndex', [
            'projects' => $projects
        ]);
    }

    public function pipelineIndex()
    {
        $projects = Project::where('id', '>', 0)
            ->where('type', 'Pipeline')
            ->orderBy('projectName', 'ASC')
            ->paginate(10);

        return view('projects.pipeline.pipelineIndex', [
            'projects' => $projects
        ]);
    }

    public function archivedIndex()
    {
        $projects = Project::where('id', '>', 0)
            ->where('Archived', 1)
            ->orderBy('projectName', 'ASC')
            ->paginate(10);

        return view('projects.archived.archivedIndex', [
            'projects' => $projects
        ]);
    }

    public function myIndex()
    {
        $projects = Project::where('userID', auth()->user()->userID)
            ->where('archived', 0)
            ->orderBy('projectName', 'ASC')
            ->paginate(10);

        return view('projects.myIndex', [
            'projects' => $projects
        ]);
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request, Project $project)
    {
        //Validate inputs

        // dd($request);

        $request->validate([
            'projectName' => ['required', 'max:100'],
            'pmName' => ['required', 'max:100'],
            'payroll' => ['required', 'max:10'],
            'type' => ['required'],
            'description' => ['required', 'max:250'],
            'stage' => ['required'],
            'rag' => ['required'],
            'archived' => ['required'],
            'budget' => ['required'],
            'sponsor' => ['required'],
            'startDate' => ['required', 'max:10'],
            'endDate' => ['required', 'max:10'],
        ]);

        $project->projectName = $request->projectName;
        $project->pmName = $request->pmName;
        $project->payroll = $request->payroll;
        $project->type = $request->type;
        $project->description = $request->description;

        $project->stage = $request->stage;
        $project->rag = $request->rag;
        $project->archived = $request->archived;
        $project->budget = $request->budget;
        $project->sponsor = $request->sponsor;
        $project->startDate = $request->startDate;
        $project->endDate = $request->endDate;

        $project->save();

        return redirect('/')->with('success', 'Project Successfully Uploaded!');
    }

    public function edit($id)
    {


        $project = Project::findOrFail($id);

        $arr['project'] = $project;

        //dd($arr);
        return view('projects.edit')->with($arr);
    }

    public function update(Request $request, $id)
    {
        $project = Project::find($id);

        if (!empty($request->input('projectName'))) {
            $project->projectName = $request->projectName;
        }
        if (!empty($request->input('pmName'))) {
            $project->pmName = $request->pmName;
        }
        if (!empty($request->input('payroll'))) {
            $project->payroll = $request->payroll;
        }
        if (!empty($request->input('type'))) {
            $project->type = $request->type;
        }

        if (!empty($request->input('description'))) {
            $project->description = $request->description;
        }
        if (!empty($request->input('stage'))) {
            $project->stage = $request->stage;
        }
        if (!empty($request->input('rag'))) {
            $project->rag = $request->rag;
        }

        if (!empty($request->input('budget'))) {
            $project->budget = $request->budget;
        }
        if (!empty($request->input('sponsor'))) {
            $project->sponsor = $request->sponsor;
        }
        if (!empty($request->input('startDate'))) {
            $project->startDate = $request->startDate;
        }
        if (!empty($request->input('endDate'))) {
            $project->endDate = $request->endDate;
        }
        if (!empty($request->input('archived'))) {
            $project->archived = $request->archived;
        }

        $project->save();
        return redirect()->route('projects.show', $project->id)->with('success', 'Project updated!');
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
