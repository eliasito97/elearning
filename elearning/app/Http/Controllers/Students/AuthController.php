<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Student;
use App\Http\Requests\Students\Auth\SignUpRequest;
use App\Http\Requests\Students\Auth\SignInRequest;
use Illuminate\Support\Facades\Hash;
use Exception;

class AuthController extends Controller
{
    public function signUpForm()
    {
        $student_info = Student::find(currentUserId());
        return view('students.auth.register', compact('student_info'));
    }

    public function signUpStore(SignUpRequest $request,$back_route)
    {
        try {
            $student = new Student;
            $student->name = $request->userName;
            $student->middlename = $request->userMiddlename;
            $student->lastname = $request->userLastname;
            $student->lastname2 = $request->userLastname2;
            $student->email = $request->email;
            $student->password = Hash::make($request->password);
            if ($student->save()){
                $this->setSession($student);
                return redirect()->route($back_route)->with('success', 'Successfully Logged In');
            }
        } catch (Exception $e) {
            //dd($e);
            return redirect()->back()->with('danger', 'Please Try Again');
        }
    }

    public function signInForm()
    {
        $student_info = Student::find(currentUserId());
        return view('students.auth.login', compact('student_info'));
    }

    public function signInCheck(SignInRequest $request,$back_route)
    {
        try {
            $student = Student::Where('email', $request->email)->first();
            if ($student) {
                if ($student->status == 1) {
                    if (Hash::check($request->password, $student->password)) {
                        $this->setSession($student);
                        return redirect()->route($back_route)->with('success', 'Successfully Logged In');
                    } else
                        return redirect()->back()->with('error', 'Username or Password is wrong!');
                } else
                    return redirect()->back()->with('error', 'You are not an active user! Please contactController to Authority');
            } else
                return redirect()->back()->with('error', 'Username or Password is wrong!');
        } catch (Exception $e) {
            //dd($e);
            return redirect()->back()->with('error', 'Username or Password is wrong!');
        }
    }

    public function setSession($student)
    {
        return request()->session()->put(
            [
                'userId' => encryptor('encrypt', $student->id),
                'userName' => encryptor('encrypt', $student->name_en),
                'emailAddress' => encryptor('encrypt', $student->email),
                'studentLogin' => 1,
                'image' => $student->image ?? 'No Image Found'
            ]
        );
    }

    public function signOut()
    {
        request()->session()->flush();
        return redirect()->route('studentLogin')->with('danger', 'Succesfully Logged Out');
    }
}
