<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use App\Models\Lesson;
use App\Models\Course;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lesson = Lesson::paginate(10);
        $enrollment = Enrollment::OrderBy('enrollment_date', 'DESC')->limit(5)->get();
        if(fullAccess())
        {

            return view('backend.course.lesson.index', compact('lesson', 'enrollment'));
        }
        else
        {
            $instructor_id = User::where('id', '=', currentUserId())->get();
            $course = Course::where('instructor_id', '=', $instructor_id[0]->instructor_id)->get();
            foreach($course as $c)
            {
                $lesson = Lesson::where('course_id','=',$c->id)->paginate(10);
            }
            return view('backend.course.lesson.index', compact('lesson', 'enrollment'));
        }

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $course = Course::get();
        $enrollment = Enrollment::OrderBy('enrollment_date', 'DESC')->limit(5)->get();
        if(fullAccess())
        {

            return view('backend.course.lesson.create', compact('course', 'enrollment'));
        }
        else
        {
            $instructor_id = User::where('id', '=', currentUserId())->get();
            $course = Course::where('instructor_id', '=', $instructor_id[0]->instructor_id)->get();

            return view('backend.course.lesson.create', compact('course', 'enrollment'));
        }

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $lesson = new Lesson;
            $lesson->title = $request->lessonTitle;
            $lesson->course_id = $request->courseId;
            $lesson->description = $request->lessonDescription;
            $lesson->notes = $request->lessonNotes;

            if ($lesson->save()) {
                $this->notice::success('Data Saved');
                return redirect()->route('lesson.index');
            } else {
                $this->notice::error('Please try again');
                return redirect()->back()->withInput();
            }
        } catch (Exception $e) {
            // dd($e);
            $this->notice::error('Please try again');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Lesson $lesson)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $course = Course::get();
        $lesson = Lesson::findOrFail(encryptor('decrypt', $id));
        $enrollment = Enrollment::OrderBy('enrollment_date', 'DESC')->limit(5)->get();
        return view('backend.course.lesson.edit', compact('course', 'lesson', 'enrollment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $lesson = Lesson::findOrFail(encryptor('decrypt', $id));
            $lesson->title = $request->lessonTitle;
            $lesson->course_id = $request->courseId;
            $lesson->description = $request->lessonDescription;
            $lesson->notes = $request->lessonNotes;

            if ($lesson->save()) {
                $this->notice::success('Data Saved');
                return redirect()->route('lesson.index');
            } else {
                $this->notice::error('Please try again');
                return redirect()->back()->withInput();
            }
        } catch (Exception $e) {
            // dd($e);
            $this->notice::error('Please try again');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Lesson::findOrFail(encryptor('decrypt', $id));
        if ($data->delete()) {
            $this->notice::error('Data Deleted!');
            return redirect()->back();
        }
    }
}
