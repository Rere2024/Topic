<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMessageMail;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactMessageController extends Controller
{
    //contact
    public function contactForm()
    {
        return view('public.contact-us');
    }

    //send
    public function sendMessage(Request $request)
    {
        $data = $request->except('_token');
        $data = $request->validate([
            'sender_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);
        //  dd($data);

        Contact::create($data);
        Mail::to('Rehab@example.com')->send(new ContactMessageMail($data));
        return ('Your message has been sent successfully!');
    }

    //////message pages

    //index
    public function index()
    {

        $unreadcontacts = Contact::where('is_read', false)->get();
        $readcontacts = Contact::where('is_read', true)->get();

        return view('admin.messages.index', compact('unreadcontacts', 'readcontacts'));
    }

    public function markAsRead($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->update(['is_read' => true]);

        return redirect()->route('messages.index');
    }


    //show
    public function show(string $id)
    {
        $contact = Contact::findOrFail($id);
        return view('admin.messages.message_details', compact('contact'));

        $data['is_read'] = isset($request->is_read);
    }


    public function delete(Request $request): RedirectResponse
    {
        $id = $request->id;
        Contact::where('id', $id)->delete($id);
        return redirect()->route('messages.index');
    }

    //delete
    public function showDeleted()
    {
        $contacts = Contact::onlyTrashed()->get();
        return view('admin.messages.trashed', compact('contacts'));
    }

    //restore
    public function restore(string $id)
    {
        Contact::where('id', $id)->restore();
        return redirect()->route('messages.showDeleted');
    }

    //forcedelete
    public function forceDelete(string $id)
    {
        Contact::where('id', $id)->forceDelete($id);
        return redirect()->route('messages.index');
    }


    public function subscribe(Request $request)
    {
        $validated = $request->validate([
            'subscribe-email' => 'required|email'
        ]);

        return redirect()->back()->with('success', 'You have successfully subscribed to our newsletter!');
    }
}
