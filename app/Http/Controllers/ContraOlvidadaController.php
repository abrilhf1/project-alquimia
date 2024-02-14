<?php
namespace App\Http\Controllers;

use App\Mail\RecuperarContraMailable;
use App\Models\Usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ContraOlvidadaController extends Controller
{
    public function showForm()
    {
        return view('auth.forgot-password');
    }

    public function sendRecoveryCode(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:usuarios,email',
        ]);
    
        $user = Usuarios::where('email', $request->email)->first();
    
        $recoveryCode = Str::random(40);
        $expiresAt = now()->addDay();
    
        $user->update([
            'recovery_code' => $recoveryCode,
            'recovery_code_expires_at' => $expiresAt,
        ]);
    
        Mail::to($user->email)->send(new RecuperarContraMailable($recoveryCode));
    
        return redirect()->route('auth.reset-password', ['code' => $recoveryCode])
        ->with('success', 'Se ha enviado un código de recuperación a tu dirección de correo electrónico. Puedes restablecer tu contraseña utilizando el código proporcionado en el correo electrónico.');
    }

}
