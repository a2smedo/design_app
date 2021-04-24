<?php

namespace App\Http\Controllers\Web\Admin;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Mail\ContactResponseMail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{
    public function index()
    {
        $data['messages'] = Contact::orderBy('id', 'DESC')->paginate(8);

        return view('Admin.messages.index')->with($data);
    }

    public function show(Contact $contact)
    {
        $data['contact'] = $contact;

        return view('Admin.messages.show')->with($data);
    }



    public function response(Contact $contact , Request $request)
    {
        $request->validate([
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        //send Email
        $name = $contact->user->name;
        $subject = $request->subject;
        $message = $request->message;
        $receiverMail = $contact->email;

       Mail::to($receiverMail)->send(new ContactResponseMail([
           'name' => $name,
           'subject' => $subject,
           'message' => $message
       ]));

        $request->session()->flash('msgSend', "Message sended Successfly");
        return redirect(url("/dashboard/messages"));

    }
}
