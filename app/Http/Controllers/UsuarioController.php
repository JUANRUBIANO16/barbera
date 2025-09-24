<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\Cliente;
use App\Models\Administrador;
use App\Models\Barbero;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = Usuario::with(['cliente', 'administrador', 'barbero'])->get();
        return view('usuario.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('usuario.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validación condicional según el tipo de usuario
        $validationRules = [
            'tipo_usuario' => 'required|in:administrador,barbero,cliente',
            'nombre' => 'required|string|max:30',
            'apellido' => 'required|string|max:30',
            'telefono' => 'required|string|max:15',
            'correo_admin' => 'nullable|email|max:40',
            'correo_cliente' => 'nullable|email|max:40',
            'disponibilidad' => 'nullable|string|max:10',
            'num_doc' => 'nullable|integer',
            'salario' => 'nullable|integer',
            'edad' => 'nullable|integer|min:1|max:120',
            'direccion' => 'nullable|string|max:30',
        ];

        // Solo requerir contraseña para administradores y barberos
        if ($request->tipo_usuario !== 'cliente') {
            $validationRules['password'] = 'required|string|min:6|confirmed';
        }

        $request->validate($validationRules);

        $tipoUsuario = $request->tipo_usuario;
        $usuarioData = [];

        // Crear el registro específico según el tipo
        switch ($tipoUsuario) {
            case 'administrador':
                $administrador = Administrador::create([
                    'nombre' => $request->nombre,
                    'apellido' => $request->apellido,
                    'telefono' => $request->telefono,
                    'correo' => $request->correo_admin,
                    'password' => bcrypt($request->password),
                ]);
                $usuarioData['id_admin'] = $administrador->id_admin;
                break;

            case 'barbero':
                $barbero = Barbero::create([
                    'nombre' => $request->nombre,
                    'apellido' => $request->apellido,
                    'telefono' => $request->telefono,
                    'disponibilidad' => $request->disponibilidad,
                    'num_doc' => $request->num_doc,
                    'salario' => $request->salario,
                    'edad' => $request->edad,
                    'password' => bcrypt($request->password),
                ]);
                $usuarioData['id_barbero'] = $barbero->id_barbero;
                break;

            case 'cliente':
                $cliente = Cliente::create([
                    'nombre' => $request->nombre,
                    'apellido' => $request->apellido,
                    'telefono' => $request->telefono,
                    'direccion' => $request->direccion,
                    'correo' => $request->correo_cliente,
                    // Los clientes no tienen contraseña - solo usan el formulario público
                ]);
                $usuarioData['id_clie'] = $cliente->id_clie;
                break;
        }

        // Crear el usuario
        Usuario::create($usuarioData);

        return redirect()->route('usuarios.index')
            ->with('success', 'Usuario creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Usuario $usuario)
    {
        $usuario->load(['cliente', 'administrador', 'barbero']);
        return view('usuario.show', compact('usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Usuario $usuario)
    {
        $usuario->load(['cliente', 'administrador', 'barbero']);
        return view('usuario.edit', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Usuario $usuario)
    {
        $request->validate([
            'tipo_usuario' => 'required|in:administrador,barbero,cliente',
            'nombre' => 'required|string|max:30',
            'apellido' => 'required|string|max:30',
            'telefono' => 'required|string|max:15',
            'password' => 'nullable|string|min:6|confirmed',
            'correo_admin' => 'nullable|email|max:40',
            'correo_cliente' => 'nullable|email|max:40',
            'disponibilidad' => 'nullable|string|max:10',
            'num_doc' => 'nullable|integer',
            'salario' => 'nullable|integer',
            'edad' => 'nullable|integer|min:1|max:120',
            'direccion' => 'nullable|string|max:30',
        ]);

        $tipoUsuario = $request->tipo_usuario;

        // Actualizar el registro específico según el tipo
        switch ($tipoUsuario) {
            case 'administrador':
                if ($usuario->administrador) {
                    $updateData = [
                        'nombre' => $request->nombre,
                        'apellido' => $request->apellido,
                        'telefono' => $request->telefono,
                        'correo' => $request->correo_admin,
                    ];
                    if ($request->password) {
                        $updateData['password'] = bcrypt($request->password);
                    }
                    $usuario->administrador->update($updateData);
                } else {
                    // Si no existe, crear nuevo administrador
                    $administrador = Administrador::create([
                        'nombre' => $request->nombre,
                        'apellido' => $request->apellido,
                        'telefono' => $request->telefono,
                        'correo' => $request->correo_admin,
                    ]);
                    $usuario->update([
                        'id_admin' => $administrador->id_admin,
                        'id_barbero' => null,
                        'id_clie' => null,
                    ]);
                }
                break;

            case 'barbero':
                if ($usuario->barbero) {
                    $usuario->barbero->update([
                        'nombre' => $request->nombre,
                        'apellido' => $request->apellido,
                        'telefono' => $request->telefono,
                        'disponibilidad' => $request->disponibilidad,
                        'num_doc' => $request->num_doc,
                        'salario' => $request->salario,
                        'edad' => $request->edad,
                    ]);
                } else {
                    // Si no existe, crear nuevo barbero
                    $barbero = Barbero::create([
                        'nombre' => $request->nombre,
                        'apellido' => $request->apellido,
                        'telefono' => $request->telefono,
                        'disponibilidad' => $request->disponibilidad,
                        'num_doc' => $request->num_doc,
                        'salario' => $request->salario,
                        'edad' => $request->edad,
                    ]);
                    $usuario->update([
                        'id_barbero' => $barbero->id_barbero,
                        'id_admin' => null,
                        'id_clie' => null,
                    ]);
                }
                break;

            case 'cliente':
                if ($usuario->cliente) {
                    $usuario->cliente->update([
                        'nombre' => $request->nombre,
                        'apellido' => $request->apellido,
                        'telefono' => $request->telefono,
                        'direccion' => $request->direccion,
                        'correo' => $request->correo_cliente,
                    ]);
                } else {
                    // Si no existe, crear nuevo cliente
                    $cliente = Cliente::create([
                        'nombre' => $request->nombre,
                        'apellido' => $request->apellido,
                        'telefono' => $request->telefono,
                        'direccion' => $request->direccion,
                        'correo' => $request->correo_cliente,
                    ]);
                    $usuario->update([
                        'id_clie' => $cliente->id_clie,
                        'id_admin' => null,
                        'id_barbero' => null,
                    ]);
                }
                break;
        }

        return redirect()->route('usuarios.index')
            ->with('success', 'Usuario actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Usuario $usuario)
    {
        $usuario->delete();

        return redirect()->route('usuarios.index')
            ->with('success', 'Usuario eliminado exitosamente.');
    }
}
