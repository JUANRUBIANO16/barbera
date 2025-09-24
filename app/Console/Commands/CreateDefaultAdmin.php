<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Administrador;
use Illuminate\Support\Facades\Hash;

class CreateDefaultAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:create-default';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Crear administrador por defecto para acceso inicial al sistema';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('🔧 Creando administrador por defecto...');

        // Verificar si ya existe
        $adminExists = Administrador::where('correo', 'admin@barberia.com')->exists();
        
        if ($adminExists) {
            $this->warn('⚠️  El administrador por defecto ya existe');
            
            if ($this->confirm('¿Deseas actualizar la contraseña?')) {
                $admin = Administrador::where('correo', 'admin@barberia.com')->first();
                $admin->password = Hash::make('admin123');
                $admin->save();
                $this->info('✅ Contraseña actualizada correctamente');
            }
        } else {
            // Crear nuevo administrador
            Administrador::create([
                'nombre' => 'Administrador',
                'apellido' => 'Principal',
                'telefono' => '3001234567',
                'correo' => 'admin@barberia.com',
                'password' => Hash::make('admin123'),
            ]);
            
            $this->info('✅ Administrador por defecto creado exitosamente');
        }

        $this->newLine();
        $this->info('📋 Credenciales de acceso:');
        $this->line('📧 Email: admin@barberia.com');
        $this->line('🔑 Contraseña: admin123');
        $this->newLine();
        $this->info('🌐 Accede a: http://localhost:8000/login');
    }
}
