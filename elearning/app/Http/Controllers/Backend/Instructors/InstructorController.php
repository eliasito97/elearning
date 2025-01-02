<?php

namespace App\Http\Controllers\Backend\Instructors;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Instructor;
use App\Models\Student;
use App\Models\User;
use App\Http\Requests\Backend\Instructors\AddNewRequest;
use App\Http\Requests\Backend\Instructors\UpdateRequest;
use App\Models\Role;
use Dflydev\DotAccessData\Data;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Exception;
use File;

class InstructorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $instructor = Instructor::paginate(10);
        $enrollment = Enrollment::OrderBy('enrollment_date', 'DESC')->limit(5)->get();
        return view('backend.instructor.index', compact('instructor', 'enrollment'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $role = Role::get();
        $enrollment = Enrollment::OrderBy('enrollment_date', 'DESC')->limit(5)->get();
        return view('backend.instructor.create', compact('role', 'enrollment'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddNewRequest $request)
    {
        try {
            DB::beginTransaction();
            $instructor = new Instructor;
            $instructor->name = $request->userName;
            $instructor->middlename = $request->userMiddlename;
            $instructor->lastname = $request->userLastname;
            $instructor->lastname2 = $request->userLastname2;
            $instructor->contact_en = $request->contactNumber_en;
            $instructor->country = $request->userCountry;
            $instructor->email = $request->emailAddress;
            $instructor->role_id = $request->roleId;
            $instructor->bio = $request->bio;
            $instructor->designation = $request->designation;
            $instructor->title = $request->title;
            $instructor->status = $request->status;
            $instructor->password = Hash::make($request->password);
            $instructor->language = 'en';
            $instructor->access_block = $request->access_block;
            if ($request->hasFile('image')) {
                $imageName = (Role::find($request->roleId)->name) . '_' .  $request->fullName_en . '_' . rand(999, 111) .  '.' . $request->image->extension();
                $request->image->move(public_path('uploads/users'), $imageName);
                $instructor->image = $imageName;
            }

            if ($instructor->save()) {
                $user = new User;
                $user->instructor_id = $instructor->id;
                $user->name = $request->userName;
                $user->middlename = $request->userMiddlename;
                $user->lastname = $request->userLastname;
                $user->lastname2 = $request->userLastname2;
                $user->email = $request->emailAddress;
                $user->contact_en = $request->contactNumber_en;
                $user->country = $request->userCountry;
                $user->role_id = $request->roleId;
                $user->status = $request->status;
                $user->password = Hash::make($request->password);
                if (isset($imageName)) {
                    $user->image = $imageName; // Save the image name in the users table
                }
                if ($user->save()) {
                    DB::commit();
                    $this->notice::success('Successfully saved');
                    return redirect()->route('instructor.index');
                }
            } else
                return redirect()->back()->withInput()->with('error', 'Please try again');
        } catch (Exception $e) {
            dd($e);
            return redirect()->back()->withInput()->with('error', 'Please try again');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Instructor $instructor)
    {
        //
    }

    public function frontShow($id)
    {
        $student_info = Student::find(currentUserId());

        // Paginación de las inscripciones (últimos 5)
        $enrollment = Enrollment::OrderBy('enrollment_date', 'DESC')->paginate(5); // Paginación con 5 elementos por página

        // Obtener el instructor usando el ID cifrado
        $instructor = Instructor::findOrFail(encryptor('decrypt', $id));
        // Paginación de los cursos del instructor
        $course = Course::where('instructor_id', $instructor->id)
            ->with('instructor') // Cargar la relación 'instructor'
            ->paginate(4); // Cambia 4 por la cantidad de cursos que deseas mostrar por página
        $courseall1 = Course::where('instructor_id', $instructor->id)
            ->with('instructor'); // Cargar la relación 'instructor'
        // Obtener los IDs de los cursos asociados al instructor
        $course_all = $course->pluck('id')->toArray(); // Usamos pluck para extraer solo los IDs

        // Paginación de los estudiantes asociados a los cursos del instructor
        $student = Enrollment::whereIN('course_id', $course_all);

        return view('frontend.instructorProfile', compact('instructor', 'course','courseall1', 'student_info', 'student', 'enrollment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $role = Role::get();
        $instructor = Instructor::findOrFail(encryptor('decrypt', $id));
        $enrollment = Enrollment::OrderBy('enrollment_date', 'DESC')->limit(5)->get();
        return view('backend.instructor.edit', compact('role', 'instructor', 'enrollment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, $id)
    {
        try {
            $instructor = Instructor::findOrFail(encryptor('decrypt', $id));
            $instructor->name = $request->userName;
            $instructor->middlename = $request->userMiddlename;
            $instructor->lastname = $request->userLastname;
            $instructor->lastname2 = $request->userLastname2;
            $instructor->contact_en = $request->contactNumber_en;
            $instructor->country = $request->userCountry;
            $instructor->email = $request->emailAddress;
            $instructor->role_id = $request->roleId;
            $instructor->bio = $request->bio;
            $instructor->designation = $request->designation;
            $instructor->title = $request->title;
            $instructor->status = $request->status;
            $instructor->password = Hash::make($request->password);
            $instructor->language = 'en';
            $instructor->access_block = $request->access_block;
            if ($request->hasFile('image')) {
                $imageName = (Role::find($request->roleId)->name) . '_' .  $request->fullName_en . '_' . rand(999, 111) .  '.' . $request->image->extension();
                $request->image->move(public_path('uploads/users'), $imageName);
                $instructor->image = $imageName;
            }
            if ($instructor->save()) {
                $user = User::where('instructor_id', $instructor->id)->first();
                $user->instructor_id = $instructor->id;
                $user->name = $request->userName;
                $user->middlename = $request->userMiddlename;
                $user->lastname = $request->userLastname;
                $user->lastname2 = $request->userLastname2;
                $user->email = $request->emailAddress;
                $user->contact_en = $request->contactNumber_en;
                $user->country = $request->userCountry;
                $user->role_id = $request->roleId;
                $user->status = $request->status;
                $user->password = Hash::make($request->password);
                if (isset($imageName)) {
                    $user->image = $imageName; // Save the image name in the users table
                }
                if ($user->save()) {
                    DB::commit();
                    $this->notice::success('Successfully saved');
                    return redirect()->route('instructor.index');
                }
            }
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
        $data = Instructor::findOrFail(encryptor('decrypt', $id));
        $image_path = public_path('uploads/instructors') . $data->image;

        if ($data->delete()) {
            if (File::exists($image_path))
                File::delete($image_path);

            return redirect()->back();
        }
    }
}
