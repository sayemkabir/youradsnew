<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([

            'name'=>'Admin',
            'email'=>'admin@gmail.com',
            'password'=>bcrypt('111111'),
            'role'=>'Super Admin',
            'image'=>'admin.jpg',
            'contact'=>'contact'


        ]);
    }
}
