<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;//---> se hace el llamado
class denuncia_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() /* se traen las propiedades de la tabla  */
    {
        DB::table('denuncia')->insert([ /* mediante este comando se traen las propiedades  */
            
            'nombre'=>'diana',
            'apellidos'=>'suarez',
            'direccion'=> 'popayan',
            'telefomo'=>'1325',
            'tipo denuncia'=>'violancia'
        ]);
    }
}
