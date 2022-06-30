<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::create([
            'name' => 'Yesid Acosta',
            'email' => 'yesid9511@hotmail.com',
            'password' => bcrypt('yesid123')
        ])->assignRole('Admin');

        User::create([
            'name' => 'Yorth Ortegon',
            'email' => 'yorth@udenar.edu.co',
            'password' => bcrypt('yorth123')
        ])->assignRole('Admin');

        User::create([
            'name' => 'Carlos Pepinosa',
            'email' => 'carlos@udenar.edu.co',
            'password' => bcrypt('carlos123')
        ])->assignRole('Admin');

        User::create([
            'name' => 'Miler España',
            'email' => 'miller@udenar.edu.co',
            'password' => bcrypt('miler123')
        ])->assignRole('Admin');

        User::factory(40)->create();

        $users = [
            [
                'id'    => '70',
                'name' => 'Fernando Pulido',
                'email' => 'pulido@gmail.com',
                'password' => bcrypt('password')
            ],
            [
                'id'    => '71',
                'name' => 'Maria Alegre',
                'email' => 'alegria@gmail.com',
                'password' => bcrypt('password')
            ],
            // [
            //     'name' => '',
            //     'email' => '',
            //     'password' => bcrypt('')
            // ],
        ];

        foreach ($users as $user) {
            User::create($user)->assignRole('Usuario');
        }
    }
}
