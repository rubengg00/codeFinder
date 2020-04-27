<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('roles')->truncate(); 

        Role::create([
            'name'=>'admin'
        ]);
    }
}

/**
$user = User::create([
    'name' => 'Rubén García',
    'username' => 'rubengg_00',
    'email' => 'rubengg_00@hotmail.com',
    'password' => bcrypt('codeFinder1473')
]); 

 */
