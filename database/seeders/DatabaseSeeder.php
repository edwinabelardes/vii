<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    
    {
        $this->call(denuncia_seeder::class); /* en este aparte
        se trae mediante el anterior codigo lo que esta en
        el seeder */
    }
}
