<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class denuncia_model extends Model
{
    use HasFactory;
    protected $table='denuncia';
    protected $fillable=[
        'nombre',
        'apellidos',
        'direccion',
        'telefomo',
        'tipo denuncia'
    ];
}
