<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    use HasFactory;

    protected $fillable = [
        'usuario_id',
        'libreria_id'
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }
}
