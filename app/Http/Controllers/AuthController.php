<?php

namespace App\Http\Controllers;

use App\Models\Administrador;
use App\Models\Barbero;
use App\Models\Cliente;
use App\Http\Controllers\PanelController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $email = $request->email;
        $password = $request->password;

        // ADMINISTRADOR POR DEFECTO (SIN BASE DE DATOS)
        if ($email === 'admin@barberia.com' && $password === 'admin123') {
            session(['user_type' => 'administrador', 'user_id' => 1, 'user_name' => 'Administrador']);
            return redirect()->route('panel')->with('success', 'Bienvenido, Administrador');
        }

        // Intentar autenticación con base de datos (si existe)
        try {
            // Buscar en administradores
            $admin = Administrador::where('correo', $email)->first();
            if ($admin && Hash::check($password, $admin->password)) {
                session(['user_type' => 'administrador', 'user_id' => $admin->id_admin, 'user_name' => $admin->nombre]);
                return redirect()->route('panel')->with('success', 'Bienvenido, ' . $admin->nombre);
            }

            // Buscar en barberos (usar telefono como email)
            $barbero = Barbero::where('telefono', $email)->first();
            if ($barbero && Hash::check($password, $barbero->password)) {
                session(['user_type' => 'barbero', 'user_id' => $barbero->id_barbero, 'user_name' => $barbero->nombre]);
                return redirect()->route('panel')->with('success', 'Bienvenido, ' . $barbero->nombre);
            }
        } catch (\Exception $e) {
            // Si hay error de base de datos, solo usar el admin por defecto
            // El admin por defecto ya se verificó arriba
        }

        // Los clientes no pueden acceder al sistema administrativo
        // Solo pueden usar el formulario público de la página web
        return back()->withErrors([
            'email' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
        ])->withInput($request->only('email'));
    }

    public function logout()
    {
        session()->forget(['user_type', 'user_id', 'user_name']);
        return redirect()->route('login')->with('success', 'Sesión cerrada correctamente.');
    }

    public function dashboard()
    {
        $userType = session('user_type');
        $userName = session('user_name');

        if (!$userType) {
            return redirect()->route('login');
        }

        // Usar el PanelController para obtener las estadísticas
        return app(PanelController::class)->index();
    }
}
