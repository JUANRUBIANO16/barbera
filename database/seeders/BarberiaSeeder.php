<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Administrador;
use App\Models\Barbero;
use App\Models\Cliente;
use App\Models\Persona;
use App\Models\Servicio;
use App\Models\TipoDePago;
use App\Models\Venta;
use App\Models\Cita;
use App\Models\Disponibilidad;
use App\Models\Comprobante;

class BarberiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear Administradores
        Administrador::create([
            'id_admin' => 1,
            'nombre' => 'Carlos',
            'apellido' => 'Administrador',
            'telefono' => 3001234567,
            'correo' => 'admin@barberia.com'
        ]);

        // Crear Barberos
        Barbero::create([
            'id_barbero' => 1,
            'nombre' => 'Juan',
            'apellido' => 'Pérez',
            'disponibilidad' => 'disponible',
            'telefono' => 3001111111,
            'num_doc' => 12345678,
            'salario' => 1500000,
            'edad' => 28
        ]);

        Barbero::create([
            'id_barbero' => 2,
            'nombre' => 'María',
            'apellido' => 'García',
            'disponibilidad' => 'disponible',
            'telefono' => 3002222222,
            'num_doc' => 87654321,
            'salario' => 1600000,
            'edad' => 32
        ]);

        // Crear Clientes
        Cliente::create([
            'id_clie' => 1,
            'nombre' => 'Pedro',
            'apellido' => 'López',
            'telefono' => 3003333333,
            'direccion' => 'Calle 123 #45-67',
            'correo' => 'pedro@email.com'
        ]);

        Cliente::create([
            'id_clie' => 2,
            'nombre' => 'Ana',
            'apellido' => 'Martínez',
            'telefono' => 3004444444,
            'direccion' => 'Carrera 45 #78-90',
            'correo' => 'ana@email.com'
        ]);

        // Crear Servicios
        Servicio::create([
            'id_serv' => 1,
            'nombre' => 'Corte de Cabello',
            'precio' => 25000,
            'descripcion' => 'Corte de cabello profesional con lavado incluido',
            'imagen' => null // Se puede agregar una imagen por defecto aquí
        ]);

        Servicio::create([
            'id_serv' => 2,
            'nombre' => 'Barba y Afeitado',
            'precio' => 20000,
            'descripcion' => 'Afeitado tradicional con toalla caliente',
            'imagen' => null
        ]);

        Servicio::create([
            'id_serv' => 3,
            'nombre' => 'Corte + Barba',
            'precio' => 40000,
            'descripcion' => 'Corte de cabello y afeitado de barba',
            'imagen' => null
        ]);

        // Crear Tipos de Pago
        TipoDePago::create([
            'id_tipo_pago' => 1,
            'metodo' => 'Efectivo'
        ]);

        TipoDePago::create([
            'id_tipo_pago' => 2,
            'metodo' => 'Tarjeta Débito'
        ]);

        TipoDePago::create([
            'id_tipo_pago' => 3,
            'metodo' => 'Tarjeta Crédito'
        ]);

        // Crear Ventas
        Venta::create([
            'id_venta' => 1,
            'valor' => 25000,
            'cantidad' => 1,
            'total' => 25000,
            'id_serv' => 1,
            'id_clie' => 1
        ]);

        Venta::create([
            'id_venta' => 2,
            'valor' => 40000,
            'cantidad' => 1,
            'total' => 40000,
            'id_serv' => 3,
            'id_clie' => 2
        ]);

        // Crear Citas
        Cita::create([
            'id_cita' => 1,
            'fecha' => '2024-09-25',
            'hora' => '10:00:00',
            'estado' => 'pendiente',
            'descripcion' => 'Corte de cabello',
            'id_clie' => 1,
            'id_barbero' => 1
        ]);

        Cita::create([
            'id_cita' => 2,
            'fecha' => '2024-09-26',
            'hora' => '14:30:00',
            'estado' => 'confirmada',
            'descripcion' => 'Corte + barba',
            'id_clie' => 2,
            'id_barbero' => 2
        ]);

        // Crear Disponibilidades
        Disponibilidad::create([
            'id_disp' => 1,
            'fecha' => '2024-09-25',
            'hora_de_inicio' => '08:00:00',
            'hora_final' => '17:00:00',
            'id_barbero' => 1
        ]);

        Disponibilidad::create([
            'id_disp' => 2,
            'fecha' => '2024-09-26',
            'hora_de_inicio' => '09:00:00',
            'hora_final' => '18:00:00',
            'id_barbero' => 2
        ]);

        // Crear Comprobantes
        Comprobante::create([
            'id_comprobante' => 1,
            'fecha' => '2024-09-23',
            'hora' => '15:30:00',
            'id_venta' => 1,
            'id_tipo_pago' => 1
        ]);

        Comprobante::create([
            'id_comprobante' => 2,
            'fecha' => '2024-09-23',
            'hora' => '16:45:00',
            'id_venta' => 2,
            'id_tipo_pago' => 2
        ]);
    }
}
