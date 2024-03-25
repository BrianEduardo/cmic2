<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
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
    protected $appends = ['url' , 'contenido_recortado'];

    protected function url(): Attribute
    {
        return new Attribute(
            get: fn () => env('APP_URL') . Storage::url($this->fotoNoticia),
        );
    }

    protected function contenidoRecortado(): Attribute
    {
        return new Attribute(
            get: fn () => str($this->contenidoNoticia)->limit(100)
        );
    }
    public function noticiaCategorias()
    {
        return $this->belongsToMany(Category::class, 'new_categories', 'new_id', 'category_id');
    }

}
