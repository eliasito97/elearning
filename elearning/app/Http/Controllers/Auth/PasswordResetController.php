<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PasswordResetController extends Controller
{
    public function showResetForm($token)
    {
        return view('students.auth.password.reset', ['token' => $token]);
    }
    public function reset(Request $request)
    {
        // Valida la solicitud
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
            'token' => 'required',
        ]);

        $data = Student::where('email',$request->email)->get();
        $data[0]->password = Hash::make($request->password);

        // Restablece la contraseña usando el token
        if ($data[0]->save()) {
            return redirect()->route('student.auth.login')->with('status', 'Contraseña restablecida correctamente');
        }

        return back()->withErrors(['email' => [trans($request)]]);
    }
}
