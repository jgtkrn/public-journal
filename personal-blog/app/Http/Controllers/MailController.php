<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\VisitorMail;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{

    public function index(Request $request){

        $details = [
            'title' => 'Mail from visitor @ asahjournal.com',
            'body' => "{$request->newsletter}",
        ];
       
        Mail::to("arikharis@gmail.com")->send(new VisitorMail($details));

        return redirect('/');
    }
}
