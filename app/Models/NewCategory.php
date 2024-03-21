<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'new_id',
        'category_id',
    ];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
