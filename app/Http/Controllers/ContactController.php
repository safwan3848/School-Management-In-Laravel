<?php

namespace App\Http\Controllers;

use App\Mail\ContactAutoReply;
use App\Mail\ContactNotification;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'subject' => 'required',
            'email' => 'required|email',
            'message' => 'required',
            'phone_number' => 'required',
            'enquiry_type' => 'required',
        ]);
        $contact = Contact::create($request->all());

        // email to admin
        Mail::to('admin@gmail.com')->send(new ContactNotification($contact));

        // auto reply email to user
        Mail::to($contact->email)->send(new ContactAutoReply($contact));

        return back()->with('success', 'Message sent successfully! We will contact you soon.');
    }
}
