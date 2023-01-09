<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function displayContact()
    {
        return view('contact');
    }

    public function sendEmail(Request $request)
    {
        $data = array(
            'name' => $request->name,
            'email' => $request->email
        );

        Mail::mailer('smtp')->send('emails.contact', $data, function ($message) use ($data) {
            $message->to('yir0502@gmail.com')
                ->subject('Contacto');
            $message->from($data['email'], $data['name']);
        });
        return back()->with('success', 'Thanks for contacting us!');
    }
}
