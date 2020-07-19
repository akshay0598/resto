<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=User::create([
        'name'=> 'Akshay Sarawgi',
        'email' => 'sarawgi.akshay05@gmail.com',
        'password' => bcrypt('password')
        ]);

        $user->restaurants()->create([
        'name' => 'Sunrise Hotel',
        'location' => 'Elite Chouraha'
        ]);

         $user->restaurants()->create([
        'name' => 'Yatrik Hotel',
        'location' => 'Janki Puram'
        ]);

         $user->restaurants()->create([
        'name' => 'Tulsi Hotel',
        'location' => 'Sipri Chouraha'
        ]);

        

       
    }

}
