<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Student;
use Exception;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {

        $student_info = Student::find(currentUserId());

        return view(
            'frontend.contact',
            compact('student_info')
        );
    }
    public function store(Request $request)
    {

        try {
            $message = new Contact();
            $message->name = $request->name;
            $message->email = $request->email;
            $message->title = $request->subject;
            $message->content = $request->message;

            if ($message->save())
                return redirect()->route('contact.index')->with('success', 'Data Saved');
            else
                return redirect()->back()->withInput()->with('error', 'Please try again');
        } catch (Exception $e) {
            // dd($e);
            return redirect()->back()->withInput()->with('error', 'Please try again');
        }
    }
}
