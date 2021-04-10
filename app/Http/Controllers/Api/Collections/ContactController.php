<?php

namespace App\Http\Controllers\Api\Collections;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;


class ContactController extends Controller
{
    public function sendMessage(Request $request)
    {
        $user = $request->user();
        $request->validate([
            'subject' => 'required|string|min:3|max:100',
            'message' => 'required|string|min:3',
        ]);

        Contact::create([
            'user_id' => $user->id,
            'email' => $user->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        return callback_data(200, 'contact_sent');
    }
}
