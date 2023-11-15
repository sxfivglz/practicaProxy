<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('registro');
    }
    public function showLoginForm()
    {
        return view('login');
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Autenticación exitosa, redirigir al inicio
            return redirect()->intended('dashboard');
        } else {
            // Autenticación fallida, redirigir de nuevo al formulario de inicio de sesión
            return back()->withErrors([
                'email' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
            ]);
        }
    }

    public function showDashboard()
    {
        return view('inicio');
    }
    public function register(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:255',
            'email' => 'required|email|unique:usuarios',
            'password' => 'required|min:4',
        ]);

        Usuario::create([
            'nombre' => $request->nombre,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        session()->flash('success', 'La cuenta se creó exitosamente.');
        return redirect()->route('login');
    }

    public function index()
    {
        $user = Auth::user();
        return view('inicio', compact('user'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

    public function update(Request $request)
    {
        // Validar la solicitud...
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        // Actualizar el nombre del usuario...
        $user = Auth::user();
        $user->nombre = $request->nombre;
        $user->save();

        // Redirigir al usuario con un mensaje de éxito...
        return redirect()->back()->with('success', 'Perfil actualizado con éxito.');
    }
}