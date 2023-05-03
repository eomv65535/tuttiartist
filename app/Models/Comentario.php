<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comentario extends Model
{
    use HasFactory;

    protected $table ="comentarios";

    protected $fillable = ['contenido', 'publicacion_id', 'user_id'];

    public function publicacion()
    {
        return $this->belongsTo(Publicacion::class, 'publicacion_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
