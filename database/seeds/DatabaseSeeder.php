<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call('UsersTableSeeder');
        $this->command->info('User table seeded!');
    }
}


class UsersTableSeeder extends Seeder 
{
    
    public function run(){
        // Insert default user with moderator access
        $user = ['name' => 'Moderator','email' => 'moder@gmail.com','password' => bcrypt('123123'),'role' => '1'];
        $db = DB::table('users')->insert($user);
    }
}