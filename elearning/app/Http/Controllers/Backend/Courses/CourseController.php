<?php

namespace App\Http\Controllers\Backend\Courses;

use App\Http\Controllers\CartController;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Student;
use App\Models\User;
use App\Models\Typepayment;
use Database\Seeders\UserSeeder;
use Illuminate\Http\Request;
use App\Http\Requests\Backend\Course\Courses\AddNewRequest;
use App\Http\Requests\Backend\Course\Courses\UpdateRequest;
use App\Models\CourseCategory;
use App\Models\Instructor;
use App\Models\Lesson;
use App\Models\Material;
use Exception;
use File;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $student_info = Student::find(currentUserId());
        $course = Course::paginate(10);
        $enrollment = Enrollment::OrderBy('enrollment_date', 'DESC')->limit(5)->get();
        return view('backend.course.courses.index', compact('course', 'student_info', 'enrollment'));
    }

    public function indexForAdmin()
    {
        $course = Course::paginate(10);
        $enrollment = Enrollment::OrderBy('enrollment_date', 'DESC')->limit(5)->get();
        return view('backend.course.courses.indexForAdmin', compact('course', 'enrollment'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courseCategory = CourseCategory::get();

        $typepayment = Typepayment::get();
        $enrollment = Enrollment::OrderBy('enrollment_date', 'DESC')->limit(5)->get();
        if(fullAccess())
        {
            $instructor = Instructor::get();
            return view('backend.course.courses.create', compact('courseCategory', 'instructor','typepayment', 'enrollment'));
        }
        else
        {
            $instructor = User::where('id', '=', currentUserId())->get();
            return view('backend.course.courses.create', compact('courseCategory', 'instructor','typepayment', 'enrollment'));
        }

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddNewRequest $request)
    {
        try {
            $course = new Course;
            $course->title_en = $request->courseTitle_en;
            $course->description_en = $request->courseDescription_en;
            $course->course_category_id = $request->categoryId;
            $course->instructor_id = $request->instructorId;
            $course->typepayment_id = $request->typepayment_id;
            $course->price = $request->coursePrice;
            $course->old_price = $request->courseOldPrice;
            $course->subscription_price = $request->subscriptionPrice;
            $course->full_course_subscription = $request->courseFull_course_subscription;
            $course->annual_subscription = $request->courseAnnual_subscription;
            $course->weekly_subscription = $request->courseWeekly_subscription;
            $course->daily_subscription = $request->courseDaily_subscription;
            $course->start_from = $request->start_from;
            $course->duration = $request->duration;
            $course->lesson = $request->lesson;
            $course->difficulty = $request->courseDifficulty;
            $course->course_code = $request->course_code;
            $course->prerequisites_en = $request->prerequisites_en;
            $course->thumbnail_video = $request->thumbnail_video;
            $course->tag = $request->tag;
            $course->language = 'en';

            if ($request->hasFile('image')) {
                $imageName = rand(111, 999) . time() . '.' . $request->image->extension();
                $request->image->move(public_path('uploads/courses'), $imageName);
                $course->image = $imageName;
            }
            if ($request->hasFile('thumbnail_image')) {
                $thumbnailImageName = rand(111, 999) . time() . '.' . $request->thumbnail_image->extension();
                $request->thumbnail_image->move(public_path('uploads/courses/thumbnails'), $thumbnailImageName);
                $course->thumbnail_image = $thumbnailImageName;
            }
            if ($course->save())
                return redirect()->route('course.index')->with('success', 'Data Saved');
            else
                return redirect()->back()->withInput()->with('error', 'Please try again');
        } catch (Exception $e) {
            dd($e);
            return redirect()->back()->withInput()->with('error', 'Please try again');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $student_info = Student::find(currentUserId());
        $material = Material::where('id',$id)->paginate(10);
        $enrollment = Enrollment::OrderBy('enrollment_date', 'DESC')->limit(5)->get();
        return view('backend.course.material.index', compact('material', 'student_info', 'enrollment'));
    }

    public function frontShow($id)
    {
        $course = Course::findOrFail(encryptor('decrypt', $id));
        $lessons = Lesson::where ('course_id', $course->id)->get();
        $CoursesCategory = Course::where('course_category_id', $course->course_category_id)->get();
        $materials = Material::whereIn('lesson_id', $lessons->pluck('id'))->get();
        $student_info = Student::find(currentUserId());
        $instructor = Instructor::where('id', $course->instructor_id)->where('status','1')->first();
        $instructor_count = Course::where('instructor_id', $instructor->id)->Count();
        $enrollment = Enrollment::OrderBy('enrollment_date', 'DESC')->limit(5)->get();
        return view('frontend.courseDetails', compact('course','instructor_count','lessons','materials','CoursesCategory','student_info','enrollment'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $courseCategory = CourseCategory::get();
        $instructor = Instructor::get();
        $typepayment = Typepayment::get();
        $course = Course::findOrFail(encryptor('decrypt', $id));
        $enrollment = Enrollment::OrderBy('enrollment_date', 'DESC')->limit(5)->get();
        return view('backend.course.courses.edit', compact('courseCategory', 'instructor', 'course', 'typepayment', 'enrollment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, $id)
    {
        try {
            $course = Course::findOrFail(encryptor('decrypt', $id));
            $course->title_en = $request->courseTitle_en;
            $course->description_en = $request->courseDescription_en;
            $course->course_category_id = $request->categoryId;
            $course->instructor_id = $request->instructorId;
            $course->typepayment_id = $request->typepayment_id;
            $course->full_course_subscription = $request->courseFull_course_subscription;
            $course->annual_subscription = $request->courseAnnual_subscription;
            $course->weekly_subscription = $request->courseWeekly_subscription;
            $course->daily_subscription = $request->courseDaily_subscription;
            $course->difficulty = $request->courseDifficulty;
            $course->price = $request->coursePrice;
            $course->old_price = $request->courseOldPrice;
            $course->subscription_price = $request->subscriptionPrice;
            $course->start_from = $request->start_from;
            $course->duration = $request->duration;
            $course->lesson = $request->lesson;
            $course->course_code = $request->course_code;
            $course->prerequisites_en = $request->prerequisites_en;
            $course->thumbnail_video = $request->thumbnail_video;
            $course->tag = $request->tag;
            $course->language = 'en';

            if ($request->hasFile('image')) {
                $imageName = rand(111, 999) . time() . '.' . $request->image->extension();
                $request->image->move(public_path('uploads/courses'), $imageName);
                $course->image = $imageName;
            }
            if ($request->hasFile('thumbnail_image')) {
                $thumbnailImageName = rand(111, 999) . time() . '.' . $request->thumbnail_image->extension();
                $request->thumbnail_image->move(public_path('uploads/courses/thumbnails'), $thumbnailImageName);
                $course->thumbnail_image = $thumbnailImageName;
            }
            if ($course->save())
                return redirect()->route('course.index')->with('success', 'Data Saved');
            else
                return redirect()->back()->withInput()->with('error', 'Please try again');
        } catch (Exception $e) {
            // dd($e);
            return redirect()->back()->withInput()->with('error', 'Please try again');
        }
    }

    public function updateforAdmin(UpdateRequest $request, $id)
    {
        try {
            $course = Course::findOrFail(encryptor('decrypt', $id));
            $course->title_en = $request->courseTitle_en;
            $course->description_en = $request->courseDescription_en;
            $course->course_category_id = $request->categoryId;
            $course->instructor_id = $request->instructorId;
            $course->typepayment_id = $request->typepayment_id;
            $course->price = $request->coursePrice;
            $course->old_price = $request->courseOldPrice;
            $course->subscription_price = $request->subscriptionPrice;
            $course->full_course_subscription = $request->courseFull_course_subscription;
            $course->annual_subscription = $request->courseAnnual_subscription;
            $course->weekly_subscription = $request->courseWeekly_subscription;
            $course->daily_subscription = $request->courseDaily_subscription;
            $course->start_from = $request->start_from;
            $course->duration = $request->duration;
            $course->lesson = $request->lesson;
            $course->difficulty = $request->courseDifficulty;
            $course->course_code = $request->course_code;
            $course->prerequisites_en = $request->prerequisites_en;
            $course->thumbnail_video = $request->thumbnail_video;
            $course->tag = $request->tag;
            $course->status = $request->status;
            $course->language = 'en';

            if ($request->hasFile('image')) {
                $imageName = rand(111, 999) . time() . '.' . $request->image->extension();
                $request->image->move(public_path('uploads/courses'), $imageName);
                $course->image = $imageName;
            }
            if ($request->hasFile('thumbnail_image')) {
                $thumbnailImageName = rand(111, 999) . time() . '.' . $request->thumbnail_image->extension();
                $request->thumbnail_image->move(public_path('uploads/courses/thumbnails'), $thumbnailImageName);
                $course->thumbnail_image = $thumbnailImageName;
            }
            if ($course->save())
                return redirect()->route('courseList')->with('success', 'Data Saved');
            else
                return redirect()->back()->withInput()->with('error', 'Please try again');
        } catch (Exception $e) {
            // dd($e);
            return redirect()->back()->withInput()->with('error', 'Please try again');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Course::findOrFail(encryptor('decrypt', $id));
        $image_path = public_path('uploads/courses') . $data->image;

        if ($data->delete()) {
            if (File::exists($image_path))
                File::delete($image_path);

            return redirect()->back();
        }
    }
}
