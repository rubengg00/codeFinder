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
            'logo'=>'img/lenguajes/php.png'
        ]);

        Categoria::create([
            'nombre'=>'Java',
            'logo'=>'img/lenguajes/java.png'
        ]);

        Categoria::create([
            'nombre'=>'Javascript',
            'logo'=>'img/lenguajes/js.png'
        ]);

        Categoria::create([
            'nombre'=>'Node Js',
            'logo'=>'img/lenguajes/node.png'
        ]);

        Categoria::create([
            'nombre'=>'Bash',
            'logo'=>'img/lenguajes/bash.png'
        ]);


        Categoria::create([
            'nombre'=>'C',
            'logo'=>'img/lenguajes/c.png'
        ]);


        Categoria::create([
            'nombre'=>'C#',
            'logo'=>'img/lenguajes/c1.png'
        ]);


        Categoria::create([
            'nombre'=>'C++',
            'logo'=>'img/lenguajes/c2.png'
        ]);


        Categoria::create([
            'nombre'=>'CoffeeScript',
            'logo'=>'img/lenguajes/coffeescript.png'
        ]);


        Categoria::create([
            'nombre'=>'CSS',
            'logo'=>'img/lenguajes/css.png'
        ]);

        Categoria::create([
            'nombre'=>'Go',
            'logo'=>'img/lenguajes/go.png'
        ]);

        Categoria::create([
            'nombre'=>'HTML',
            'logo'=>'img/lenguajes/html.png'
        ]);


        Categoria::create([
            'nombre'=>'JSON',
            'logo'=>'img/lenguajes/json.png'
        ]);

        Categoria::create([
            'nombre'=>'Kotlin',
            'logo'=>'img/lenguajes/kotlin.png'
        ]);


        Categoria::create([
            'nombre'=>'Less',
            'logo'=>'img/lenguajes/less.png'
        ]);


        Categoria::create([
            'nombre'=>'Lua',
            'logo'=>'img/lenguajes/lua.png'
        ]);


        Categoria::create([
            'nombre'=>'Markdown',
            'logo'=>'img/lenguajes/markdown.png'
        ]);


        Categoria::create([
            'nombre'=>'Objective-C',
            'logo'=>'img/lenguajes/obj-c.png'
        ]);


        Categoria::create([
            'nombre'=>'Perl',
            'logo'=>'img/lenguajes/perl.png'
        ]);


        Categoria::create([
            'nombre'=>'Python',
            'logo'=>'img/lenguajes/python.png'
        ]);


        Categoria::create([
            'nombre'=>'Ruby',
            'logo'=>'img/lenguajes/ruby.png'
        ]);


        Categoria::create([
            'nombre'=>'SQL',
            'logo'=>'img/lenguajes/sql.png'
        ]);


        Categoria::create([
            'nombre'=>'Swift',
            'logo'=>'img/lenguajes/swift.png'
        ]);


        Categoria::create([
            'nombre'=>'TypeScript',
            'logo'=>'img/lenguajes/typescript.png'
        ]);


        Categoria::create([
            'nombre'=>'XML',
            'logo'=>'img/lenguajes/xml.png'
        ]);


        Categoria::create([
            'nombre'=>'YAML',
            'logo'=>'img/lenguajes/yaml.png'
        ]);

    }
}
