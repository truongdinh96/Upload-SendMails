<?php

namespace App\Http\Controllers;

use App\File;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class FileUploadController extends Controller
{
    public function index()
    {
        return view('file-upload');
    }

    public function store(Request $request)
    {
        $name = $request->file('file')->getClientOriginalName();

        $path = $request->file('file')->store('public/files');

        $file = Storage::disk('local')->get($path);

        Storage::get($path);
        $title = $request->request->get('title');
        $description = $request->request->get('description');

        $save = new File;

        $save->name = $name;
        $save->path = $path;
        $save->title = $title;
        $save->description = $description;

        $save->save();

        $a = User::where('is_admin', 1)->get();
        $b = [];
        foreach ($a as $key => $value) {
            $b[] = $a[$key]['email'];
        }

        $details = [
            'name' => $name,
            'title' => $title,
            'description' => $description,
            'path' => $path
        ];

        foreach ($b as $c) {
            Mail::to($c)->send(new \App\Mail\SendMail($details));
        }

        return redirect('file-upload')
            ->with('OK');

    }
}
