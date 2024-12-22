<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use App\Models\Event;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $event = Event::get();
        $enrollment = Enrollment::OrderBy('enrollment_date', 'DESC')->limit(5)->get();
        return view('backend.event.index', compact('event', 'enrollment'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $enrollment = Enrollment::OrderBy('enrollment_date', 'DESC')->limit(5)->get();
        return view('backend.event.create', compact('enrollment'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $event = new Event;
            $event->title = $request->title;
            $event->description = $request->description;
            $event->location = $request->location;
            $event->topic = $request->topic;
            $event->goal = $request->goal;
            $event->hosted_by = $request->hosted_by;
            $event->date = $request->date;
            if ($request->hasFile('image')) {
                $imageName = rand(999, 111) . time() . '.' . $request->image->extension();
                $request->image->move(public_path('uploads/events'), $imageName);
                $event->image = $imageName;
            }
            if ($event->save()) {
                $this->notice::success('Data Saved');
                return redirect()->route('event.index');
            } else {
                $this->notice::error('Please try again');
                return redirect()->back()->withInput();
            }
        } catch (Exception $e) {
            dd($e);
            $this->notice::error('Please try again');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $event = Event::findOrFail($id);
        $enrollment = Enrollment::OrderBy('enrollment_date', 'DESC')->limit(5)->get();
        return view('backend.event.edit', compact('event', 'enrollment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $event = Event::findOrFail($id);
            $event->title = $request->title;
            $event->description = $request->description;
            $event->location = $request->location;
            $event->topic = $request->topic;
            $event->goal = $request->goal;
            $event->hosted_by = $request->hosted_by;
            $event->date = $request->date;
            if ($request->hasFile('image')) {
                $imageName = rand(999, 111) . time() . '.' . $request->image->extension();
                $request->image->move(public_path('uploads/events'), $imageName);
                $event->image = $imageName;
            }
            if ($event->save()) {
                $this->notice::success('Data Saved');
                return redirect()->route('event.index');
            } else {
                $this->notice::error('Please try again');
                return redirect()->back()->withInput();
            }
        } catch (Exception $e) {
            dd($e);
            $this->notice::error('Please try again');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Event::findOrFail($id);
        if ($data->delete()) {
            $this->notice::error('Data Deleted!');
            return redirect()->back();
        }
    }
}
