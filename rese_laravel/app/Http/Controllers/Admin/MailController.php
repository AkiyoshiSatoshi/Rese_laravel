<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;
use App\Models\User;

class MailController extends Controller
{
    public function index($id)
    {
        $user = User::where('id', $id)->first();
        return view('admin.mail',compact('user'));
    }
    public function send(Request $request)
    {
        $mail = $request->all();
        unset($mail['_token']);
        Mail::to($mail['email'])->send(new SendMail($mail['content']));
        return redirect('/');
    }
}
