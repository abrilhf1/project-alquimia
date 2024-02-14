<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class RestrablecerContraController extends Controller
{
    public function showForm($code)
    {
        $user = Usuarios::where('recovery_code_expires_at', '>=', now())
            ->where('recovery_code', $code)
            ->first();

        if (!$user) {
            return redirect()->route('auth.reset-password')
                ->with('error', 'Código de recuperación inválido o expirado.');
        }

        return view('auth.reset-password', compact('code'));
    }


    public function updatePassword(Request $request)
    {
        $request->validate([
            'code' => 'required',
            'password' => 'required|confirmed|min:8',
        ]);

        $user = Usuarios::where('recovery_code_expires_at', '>=', now())
            ->where('recovery_code', $request->code)
            ->first();

        if (!$user) {
            return redirect()->route('auth.reset-password')
                ->with('error', 'Código de recuperación inválido o expirado.');
        }

        $user->update([
            'password' => Hash::make($request->password),
            'recovery_code_hash' => null,
            'recovery_code_expires_at' => null,
        ]);

        return redirect()->route('auth.login')
            ->with('success', 'Tu contraseña ha sido actualizada. Ahora puedes iniciar sesión.');
    }
}