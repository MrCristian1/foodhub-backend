<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;
use App\Models\Receta;
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
    /*DB::table('users')->insert([
        ['name' => 'hunter', 'email' => 'camilo@gmail.com', 'password' => bcrypt('12345678')],
    ]);*/

    Receta::create([
        'user_id' => 6,
        'nombre' => 'Arroz con Pollo',
        'descripcion' => 'Esta receta clásica de arroz con pollo es deliciosa y fácil de preparar. Disfruta de una combinación perfecta de arroz, pollo y sabores especiados que te harán agua la boca.',
        'etiquetas' => 'Arroz con Pollo, Pollo, Arroz, Comida Casera',
        'link' => 'https://www.elespectador.com/resizer/AdBqSwMNIX9bCzNvzkiv4F2W_BY=/525x350/filters:quality(60):format(jpeg)/cloudfront-us-east-1.images.arcpublishing.com/elespectador/LDRLW34JWNAPHDQ6I7KOOUJVKI.jpg',
        'ingredientes' => 'Arroz, pollo, cebolla, ajo, pimiento, caldo de pollo, especias al gusto.',
        'preparacion' => 'Paso 1: Cocina el arroz. Paso 2: Saltea el pollo y las verduras. Paso 3: Combina todo y disfruta.',
        'publicada' => false,
    ]);
    Receta::create([
        'user_id' => 6,
        'nombre' => 'Ensalada de Verduras',
        'descripcion' => 'Una deliciosa ensalada fresca y saludable con una mezcla de verduras de temporada.',
        'etiquetas' => 'Ensalada, Verduras, Saludable',
        'link' => 'https://s1.eestatic.com/2016/10/11/cocinillas/cocinillas_162247460_116258364_1706x960.jpg',
        'publicada' => true, 
        'ingredientes' => 'Lechuga, Tomate, Pepino, Zanahoria, Aderezo de vinagreta',
        'preparacion' => '1. Lava y corta todas las verduras en trozos pequeños.
                           2. Mezcla las verduras en un tazón grande.
                           3. Agrega el aderezo de vinagreta y mezcla bien.
                           4. Sirve frío y disfruta.',
    ]);
    }
}
