<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;

class FileController extends Controller
{
    public function index()
    {
        return view('files.index');
    }



    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'file' => 'required|file|max:30000',
                'title' => 'nullable|string|max:255',
                'message' => 'nullable|string|max:255',
            ],
            $message = [
                'required'  => ':attributes important',
                'file.max' => 'file size is great than 2M',
            ]
        );

        if ($request->hasFile('file')) {
            $filename = $request->file('file')->getClientOriginalName();
            $path = $request->file('file')->store('/files', 'public');
        }

        $uniqueLink = Str::random(8);
        $expirationDate = now()->addDays(7);

        $file = new File;
        $file->title = $request->post('title');
        $file->message = $request->post('message');
        $file->filepath = $path;
        $file->unique_link = $uniqueLink;
        $file->expiration = $expirationDate;
        $file->save($validated);

        // $fileLink = route('files.download', ['unique_link' => $uniqueLink]);

        

        return redirect()->route('files.show', $file->id);
    }


    public function show(int $id)
    {
        $file = File::findOrFail($id);

        $fileLink = URL::signedRoute('files.download' , [
            'unique_link' => $file->unique_link,
         ]) ;

        return View::make('files.show')
            ->with([
                'id' => $id,
                'file' => $file,
                'fileLink' =>$fileLink,
            ]);
    }


    public function downloadPage($id)
    {   
        $file = File::findOrFail($id);  
        $fileLink = URL::signedRoute('files.download' , [
            'unique_link' => $file->unique_link,
         ]);

        return View::make('files.download', compact('file' , 'fileLink'));
    }


    public function download($uniqueLink)
    {
        $file = File::where('unique_link', $uniqueLink)->first();

        if (!$file) {
            abort(404);
        }

        return response()->download('storage/' . $file->filepath);
    }

    }

