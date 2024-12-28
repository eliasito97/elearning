<?php

namespace App\Http\Controllers\Backend\Students;

use App\Http\Controllers\Controller;
use App\Models\Enrollment;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Requests\Backend\Students\AddNewRequest;
use App\Http\Requests\Backend\Students\UpdateRequest;
use App\Models\Role;
use Exception;
use Illuminate\Support\Facades\Hash;
use File;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Student::paginate();
        $enrollment = Enrollment::OrderBy('enrollment_date', 'DESC')->limit(5)->get();
        $student_info = Student::find(currentUserId());
        return view('backend.student.index', compact('data', 'enrollment', 'student_info'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $enrollment = Enrollment::OrderBy('enrollment_date', 'DESC')->limit(5)->get();

        if(fullAccess())
        {
            $role = Role::get();
            return view('backend.student.create', compact('role', 'enrollment'));
        }
        else
        {
            $role = Role::where('id','>','3')->get();
            return view('backend.student.create', compact('role', 'enrollment'));
        }

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddNewRequest $request)
    {
        try {
            $student = new Student();
            $student->name = $request->userName;
            $student->middlename = $request->userMiddlename;
            $student->lastname = $request->userLastname;
            $student->lastname2 = $request->userLastname2;
            $student->contact_en = $request->contactNumber_en;
            $student->country = $request->userCountry;
            $student->email = $request->emailAddress;
            $student->role_id = $request->roleId;
            $student->date_of_birth = $request->birthDate;
            $student->gender = $request->gender;
            $student->status = $request->status;
            $student->password = Hash::make($request->password);
            $student->language = 'en';
            $student->access_block = $request->accessBlock;

            if ($request->hasFile('image')) {
                $imageName = rand(111, 999) . time() . '.' . $request->image->extension();
                $request->image->move(public_path('uploads/students'), $imageName);
                $student->image = $imageName;
            }
            if ($student->save())
                return redirect()->route('student.index')->with('success', 'Data Saved');
            else
                return redirect()->back()->withInput()->with('error', 'Please try again');
        } catch (Exception $e) {
            // dd($e);
            return redirect()->back()->withInput()->with('error', 'Please try again');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $role = Role::get();
        $student = Student::findOrFail(encryptor('decrypt', $id));
        $enrollment = Enrollment::OrderBy('enrollment_date', 'DESC')->limit(5)->get();
        return view('backend.student.edit', compact('role', 'student', 'enrollment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, $id)
    {
        try {

            $student = Student::findOrFail(encryptor('decrypt', $id));
            $student->name = $request->userName;
            $student->middlename = $request->userMiddlename;
            $student->lastname = $request->userLastname;
            $student->lastname2 = $request->userLastname2;
            $student->contact_en = $request->contactNumber_en;
            $student->country = $request->userCountry;
            $student->email = $request->emailAddress;
            $student->role_id = $request->roleId;
            $student->date_of_birth = $request->birthDate;
            $student->gender = $request->gender;
            $student->status = $request->status;
            $student->password = Hash::make($request->password);
            $student->language = 'en';
            $student->access_block = $request->accessBlock;

            if ($request->hasFile('image')) {
                $imageName = rand(111, 999) . time() . '.' . $request->image->extension();
                $request->image->move(public_path('uploads/students'), $imageName);
                $student->image = $imageName;
            }
            if ($student->save())
                return redirect()->route('student.index')->with('success', 'Data Saved');
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
        $data = Student::findOrFail(encryptor('decrypt', $id));
        $image_path = public_path('uploads/students') . $data->image;

        if ($data->delete()) {
            if (File::exists($image_path))
                File::delete($image_path);

            return redirect()->back();
        }
    }
}
