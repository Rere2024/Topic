<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;
use App\Traits\Common;

class MessageController extends Controller
{
    public function index()
    {
        $unreadMessages = Message::where('is_read', false)->get();
        $readMessages = Message::where('is_read', true)->get();

        return view('admin.messages.index', compact('unreadMessages', 'readMessages'));
        // $messages = Message::get();
        // return view('admin.messages.index', compact('messages'));
    }

    // public function markAsRead($id)
    // {
    //     $message = Message::find($id);
    //     $message->is_read = true;
    //     $message->save();

    //     return redirect()->route('messages.index');
    // }



    //create
    public function create()
    {
        return view('admin.messages.create');
    }

    //store
    public function store(Request $request)
    {
        $data = $request->validate([
            'sender_name'=>'required|string|max:255|regex:/^[a-zA-Z0-9 ]+$/',
            'email' => 'required|email|max:255',
            'is_read' => 'sometimes|boolean',
            'message' => 'required|string|max:1000',

        ]);

        //    dd($data);
         Message::create($data);
        return redirect()->route('messages.index');
    }


    //show
    public function show(string $id)
    {
        $message = Message::findOrFail($id);
        return view('admin.messages.show', compact('message'));
    }

    //delete
    public function showDeleted()
    {
        $messages = Message::onlyTrashed()->get();
        return view('admin.messages.trashed', compact('messages'));
    }

    public function markAsRead($id)
    {
        $message = Message::find($id);
        $message->is_read = true;
        $message->save();

        return redirect()->route('messages.index');
    }
}
