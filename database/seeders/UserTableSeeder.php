<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([

            'user_name' => "user",
            'password'=> bcrypt('111111'),
            'email'=>'user@gmail.com',
            'user_image'=>'user.jpg',
            'wallet_address'=>"4jadnfiabiydbbdyfyegffwyi372bfiw72b3"

        ]);
    }
}
