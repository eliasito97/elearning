<?php

namespace App\Http\Controllers;

use App\Mail\AccountRecoveryMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AccountRecoveryController extends Controller
{
    /**
     * Mostrar el formulario de recuperación de cuenta.
     *
     * @return \Illuminate\View\View
     */
    public function showForm()
    {
        return view('frontend.recover-account');
    }
    /**
     * Procesar la solicitud de recuperación de cuenta.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function recover(Request $request)
    {
        // Validar la entrada
        $validated = $request->validate([
            'email_or_phone' => 'required|string',
        ]);

        // Buscar la cuenta con el correo o número de teléfono proporcionado
        $emailOrPhone = $validated['email_or_phone'];

        // Lógica para encontrar la cuenta (esto depende de tu modelo de usuarios)
        $user = User::where('email', $emailOrPhone)
            ->orWhere('contact_en','like', '%$emailOrPhone%')
            ->first();

        if ($user) {
            // Aquí va la lógica de recuperación de cuenta (enviar correo, SMS, etc.)
            // Por ejemplo, enviar un correo con un enlace para restablecer la contraseña:

            Mail::to($user->email)->send(new AccountRecoveryMail($user));

            return redirect()->route('recover.account')->with('success', 'Se ha enviado un enlace para recuperar tu cuenta a tu correo.');

        }

        return redirect()->route('recover.account')->withErrors(['email_or_phone' => 'No se encontró ninguna cuenta con ese correo electrónico o número de teléfono.']);
    }
}
