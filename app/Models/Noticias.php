<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Noticias extends Model
{
    use HasFactory;

    protected $fillable = [
        'tituloNoticia',
        'contenidoNoticia',
        'fotoNoticia',
        'habilitado',
    ];

    public function noticiaCategorias()
    {
        return $this->belongsToMany(Category::class, 'new_categories', 'new_id', 'category_id');
    }

}
