<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Publicacion extends Model
{
    use HasFactory;

    protected $table ="publicaciones";

    protected $fillable = ['contenido', 'imagen','user_id'];

    public function users()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function comentarios()
    {
        return $this->hasMany(Comentario::class, 'publicacion_id');
    }

    public function meGusta()
    {
        return $this->belongsToMany(User::class, 'me_gusta', 'publicacion_id', 'user_id');
    }
}
