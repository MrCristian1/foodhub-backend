<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\DB;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

    // Crear los roles si no existen
    $role1 = Role::firstOrCreate(['name' => 'administrador']);
    $role2 = Role::firstOrCreate(['name' => 'usuario']);

    // Asignar el rol "administrador" a usuarios específicos
    $usuariosConRolAdministrador = [
        ['name' => 'cristian', 'email' => 'admincristian@gmail.com', 'password' => bcrypt('12345678')],
        ['name' => 'jair', 'email' => 'adminjair@gmail.com', 'password' => bcrypt('12345678')],
        ['name' => 'alirio', 'email' => 'adminalirio@gmail.com', 'password' => bcrypt('12345678')],
        ['name' => 'charad', 'email' => 'admincharli@gmail.com', 'password' => bcrypt('12345678')],
    ];

    foreach ($usuariosConRolAdministrador as $adminData) {
        $user = User::where('email', $adminData['email'])->first();

        if (!$user) {
            $user = User::create([
                'name' => $adminData['name'],
                'email' => $adminData['email'],
                'password' => $adminData['password'],
            ]);
        }

        $user->assignRole($role1);
    }
        // Poblar la tabla de usuarios con datos iniciales
        DB::table('users')->insert([
            ['name' => 'kobbi', 'email' => 'jair@hotmail.com', 'password' => bcrypt('12345678')],
        ]);
    }
}
