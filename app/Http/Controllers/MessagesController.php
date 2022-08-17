<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Custom\Date;
use Illuminate\Pagination\LengthAwarePaginator;

class MessagesController extends Controller
{
    public function submit(Request $request) {        
        $validatedData = $request->validate([
            'author' => 'required',
            'subject' => 'required',
            'message' => 'required'
        ]);

        // Create new message
        $message = new Message;
        $message->author = $request->input('author');
        $message->subject = $request->input('subject');
        $message->message = $request->input('message');
        $message->date = Date::today()->to_string();

        // Save message
        $message->save();

        // Redirect
        return redirect('contact/')->with('success', 'Message envoyé');
    }

    public function getMessages() {
        $paginatedMessages = Message::paginate(10);
        $messages = $paginatedMessages->sortBy(function($message) {
            return Date::parse($message->date)->n_days();
        });
        $messages = new LengthAwarePaginator($messages, $paginatedMessages->total(), $paginatedMessages->perPage());
        return view('contact')->with('comments', $messages);
    }
}
