<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Receta;
class Comentario extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'receta_id',
        'comentario_id',
        'contenido',    
    ];
    protected $table = "comentarios";
    protected $guarded = [];


    //ojo con el model id
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function receta()
    {
        return $this->belongsTo(Receta::class, 'receta_id');
    }
    public function hijo(){

        return $this->belongsTo(Comentario::class, 'comentario_id');

    }
}
