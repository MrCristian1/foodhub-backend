<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use App\Models\Comentario;

class Receta extends Model
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'nombre',
        'descripcion',
        'etiquetas',
        'link',
        'publicada',
        'ingredientes',
        'preparacion',
    ];

    public function usuario()
{
    return $this->belongsTo(User::class, 'user_id');
}


//ojo con lo de receta_id porque no se sabe si así este el campo en la tabla
    public function comentario(){

        return $this->hasMany(Comentario::class,'receta_id');
    }

    

}