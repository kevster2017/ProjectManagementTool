<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;

class DocumentController extends Controller
{
    public function index()
    {
        $documents = Document::all();

        return view('documents.index', compact('documents'));
    }

    public function store(Request $request, Document $document)
    {
        $request->validate([
            'title' => ['required', 'max:100'],
            'documentPath' => ['required'],
        ]);

        $documentPath = request('documentPath')->store('uploads', 'public'); // For Amazon S3, use ->store('uploads', 's3'); 
        $documentPath->save();

        $document->title = $request->title;
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
        return dd('ok');
    }


    public function delete($id)
    {
        Document::destroy($id);

        return view('documents.index', with('success', 'Document successfully deleted!'));
    }
}
