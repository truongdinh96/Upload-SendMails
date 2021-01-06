<?php

namespace App\Http\Controllers;

use App\EmailData;
use App\Events\UploadFileEvent;
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
        $name = $request->request->get('full_name');
        $email = $request->request->get('email');
        $message = $request->request->get('message');

        event(new UploadFileEvent(new EmailData($path, $email, $name, $message)));

        return redirect('file-upload')->with('OK');
    }
}
