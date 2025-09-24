<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Administrador;
use Illuminate\Support\Facades\Hash;

class AdminDefaultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear administrador por defecto si no existe
        $adminExists = Administrador::where('correo', 'admin@barberia.com')->exists();
        
        if (!$adminExists) {
            Administrador::create([
                'nombre' => 'Administrador',
                'apellido' => 'Principal',
                'telefono' => '3001234567',
                'correo' => 'admin@barberia.com',
                'password' => Hash::make('admin123'),
            ]);
            
            $this->command->info('✅ Administrador por defecto creado exitosamente');
            $this->command->info('📧 Email: admin@barberia.com');
            $this->command->info('🔑 Contraseña: admin123');
        } else {
            $this->command->info('ℹ️  El administrador por defecto ya existe');
        }
    }
}
