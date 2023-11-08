<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void{

        $role1 = Role::create(['name' => 'administrador']);
        $role2 = Role::create(['name' => 'usuario']);
        
        
        $useradministrador = User::find(1);
        $useradministrador->assignRole($role1);
        

        //$userusuario = User::find(2);
        //$userusuario->assignRole($role2);

        // Asigna el rol "usuario" a todos los usuarios desde la ID 1 en adelante
        $user = User::where('id', '>=', 1)->get();
        foreach ($user as $user) {
            $user->assignRole($role2);
        }



    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        
    }
};
