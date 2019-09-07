<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Mail;

class PagesController extends Controller
{
    public function getIndex()
    {
        $posts = Post::latest()->take(4)->get();
        return view('home')->withPosts($posts);
    }

    public function getAbout()
    {
        return view('pages.about');
    }

    public function getContact()
    {
        return view('pages.contact');
    }

    public function postContact(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'body' => 'required'
        ]);

        $data = [
            'email' => $request->input('email'),
            'subject' => $request->input('subject'),
            'body' => $request->input('body')
        ];

        Mail::send('emails.template', $data, function ($message) use ($data) {
            $message->from($data['email']);
            $message->to("admin@admin.com");
            $message->subject($data['subject']);
        });

        return redirect('/')->with('success', "Email Sent");
    }
}
