<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function index() {
        $contacts = Contact::latest()->paginate(5);
        return view('admin.contacts.index', compact('contacts'));
    }

    public function delete($id)
    {
        Contact::findOrFail($id)->delete();
        return back()->with('success', 'Message deleted successfully!');
    }

    public function updateEnquiryType(Request $request) {
        $request->validate([
            'id' => 'required|integer',
            'enquiry_type' => 'required|string'
        ]);

        $contact = Contact::findOrFail($request->id);
        if (!$contact) {
            return response()->json(['status' => false, 'message' => 'Contact not found']);
        }

        $contact->enquiry_type = $request->enquiry_type;
        $contact->save();

        return response()->json(['status' => true, 'message' => 'Enquiry Type updated successfully']);
    }
}
