<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Support\Str;
use App\Events\DownloadFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

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
            $file =  $request->file('file');
            $filename = $file->getClientOriginalName();
            $path = $file->storeAs('files', $filename);
        }

        $uniqueLink = Str::random(8);
        $expirationDate = now()->addDays(7);

        $file = new File;
        $file->title = $filename;
        $file->message = $request->post('message');
        $file->filepath = $path;
        $file->unique_link = $uniqueLink;
        $file->expiration = $expirationDate;
        if ($id = Auth::id()) {
            $file->user_id = $id;
        }
        $file->save($validated);


        return redirect()->route('files.show', $file->id)
            ->with([
                'filename' => $filename,
            ]);
    }


    public function show(int $id)
    {
        $file = File::findOrFail($id);

        $fileLink = URL::temporarySignedRoute('files.downloadPage', now()->addHours(3), [
            'id' => $id,
            'unique_link' => $file->unique_link,
        ]);

        return View::make('files.show')
            ->with([
                'id' => $id,
                'file' => $file,
                'fileLink' => $fileLink,
            ]);
    }


    public function downloadPage($id)
    {
        $file = File::findOrFail($id);

        $fileLink = URL::temporarySignedRoute('files.download', now()->addHours(3), [
            'unique_link' => $file->unique_link,
        ]);

        return View::make('files.download', compact('file', 'fileLink'));
    }


    public function download(Request $request , $uniqueLink)
    {
        $file = File::where('unique_link', $uniqueLink)->first();

        if (!$file) {
            abort(404);
        }

        event(new DownloadFile($file));


        return Storage::download($file->filepath);


    }

    public function downloadedFiles()
    {
        session()->get('success');
        $files = File::orderBy('created_at', 'DESC')
            ->where('user_id', '=', Auth::id())
            ->get();

        return View::make('files.downloadedFiles', compact('files'));
    }

    public function destroy($id)
    {
        $file = File::findOrFail($id);

        $file->delete();

        if ($file->filepath) {
            Storage::disk('files')->delete($file->filepath);
        }

        return Redirect::route('files.downloadedFiles')->with('success', 'File deleted');
    }
}
