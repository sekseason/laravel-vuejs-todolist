<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin System',
            'email' => 'admin@todolist.com',
            'password' => bcrypt('Password@01'),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
        ]);

        DB::table('users')->insert([
            'name' => 'Editor User',
            'email' => 'editor@todolist.com',
            'password' => bcrypt('Password@01'),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
        ]);

        DB::table('users')->insert([
            'name' => 'Demo User',
            'email' => 'demo@todolist.com',
            'password' => bcrypt('Password@01'),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
        ]);

        DB::table('roles')->insert([
            'user' => 1,
            'role' => 'admin',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
        ]);

        DB::table('roles')->insert([
            'user' => 2,
            'role' => 'editor',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
        ]);
    }
}
