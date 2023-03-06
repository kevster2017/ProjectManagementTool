<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Document;
use App\Models\Project;
use Response;

class DocumentController extends Controller
{
    public function index()
    {
        $documents = Document::where('id', '>', 0)
            ->orderBy('id', 'DESC')
            ->paginate(5);

        return view('documents.index', compact('documents'));
    }

    public function projectIndex(Project $project, $id)
    {
        //$project = Project::pluck('id');
        //dd($project);

        $documents = Document::where('projectID', $id)
            ->paginate(5);
        // dd($documents);

        return view('documents.projectDocsIndex', compact('documents'));
    }

    public function store(Request $request, Document $document)
    {

        $request->validate([
            'title' => ['required', 'max:100'],
            'documentPath' => 'required|mimes:doc,docx,xls,xlsx,pdf,csv,pptx,mpp,vsdx',
        ]);


        $document->title = $request->title;

        $fileName = $document->title . '.' . $request->documentPath->extension();

        $documentPath = $request->documentPath->storeAs('uploads', $fileName);


        $document->documentPath = $documentPath;
        $document->userID = $request->userID;
        $document->projectID = $request->projectID;
        $document->projectName = $request->projectName;
        $document->createdBy = $request->createdBy;

        $document->save();

        return back()->with('success', 'Document successfully uploaded');
    }

    public function download($id)
    {
        $document = Document::where('id', $id)
            ->first();

        $filepath = storage_path("/app/{$document->documentPath}");

        return Response::download($filepath);
    }


    public function destroy($id)
    {
        Document::destroy($id);

        return redirect()->route('documents.index')->with('success', 'Document successfully deleted!');
    }
}
