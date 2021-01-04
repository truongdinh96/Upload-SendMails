<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
        $title = $request->request->get('title');
        $description = $request->request->get('description');

        $userIsAdmin = User::where('is_admin', 1)->get();
        $emailsOfAdmin = [];
        foreach ($userIsAdmin as $key => $value) {
            $emailsOfAdmin[] = $userIsAdmin[$key]['email'];
        }

        $details = [
            'name' => $name,
            'title' => $title,
            'description' => $description,
            'path' => $path
        ];

        foreach ($emailsOfAdmin as $emails) {
            Mail::to($emails)->send(new \App\Mail\SendMail($details));
        }

        return redirect('file-upload')
            ->with('OK');

    }
}
