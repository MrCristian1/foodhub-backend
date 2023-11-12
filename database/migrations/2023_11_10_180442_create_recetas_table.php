<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Receta;
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('recetas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained(); // Para la relación con el usuario
            $table->string('nombre');
            $table->text('descripcion');
            $table->text('etiquetas');
            $table->string('link')->nullable();
            $table->text('ingredientes');
            $table->text('preparacion');
            $table->timestamps();
        });
    }

    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recetas');
    }
};
