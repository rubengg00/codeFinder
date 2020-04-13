<?php

use Illuminate\Database\Seeder;
use App\Categoria;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::statement("SET FOREIGN_KEY_CHECKS=0;");
        DB::table('categorias')->truncate(); 
        DB::statement("SET FOREIGN_KEY_CHECKS=1;");


        Categoria::create([
            'nombre'=>'PHP',
            'logo'=>'img/php.png'
        ]);

        Categoria::create([
            'nombre'=>'Java',
            'logo'=>'img/java.png'
        ]);

        Categoria::create([
            'nombre'=>'Javascript',
            'logo'=>'img/js.png'
        ]);

        Categoria::create([
            'nombre'=>'Node Js',
            'logo'=>'img/node.png'
        ]);
    }
}
