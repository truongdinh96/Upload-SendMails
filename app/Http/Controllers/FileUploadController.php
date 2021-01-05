<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Mail;

class FileUploadController extends Controller
{
    public function index()
    {
        return view('file-upload');
    }

    /**
     * @param Request $request
     * @return RedirectResponse|Redirector
     */
    public function store(Request $request)
    {
        $path = $request->file('file')->store('public/files');
        $full_name = $request->request->get('full_name');
        $email = $request->request->get('email');
        $message = $request->request->get('message');

        $userIsAdmin = User::where('is_admin', 1)->get();
        $emailsOfAdmin = [];
        foreach ($userIsAdmin as $key => $value) {
            $emailsOfAdmin[] = $userIsAdmin[$key]['email'];
        }

        $details = [
            'full_name' => $full_name,
            'email' => $email,
            'message' => $message,
            'path' => $path
        ];

        foreach ($emailsOfAdmin as $emails) {
            Mail::to($emails)->send(new \App\Mail\SendMail($details));
        }

        return redirect('file-upload')
            ->with('OK');
    }
}
