<?php

namespace Database\Seeders;

use App\Models\User;
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
        $param = [
            'name' => '一郎',
            'email' => '1@com',
            'password' => bcrypt('fantastic4'),
        ];
        $user = new User;
        $user->fill($param)->save();

        $param = [
            'name' => '二郎',
            'email' => '2@com',
            'password' => bcrypt('fantastic4'),
        ];
        $user = new User;
        $user->fill($param)->save();

        $param = [
            'name' => '三郎',
            'email' => '3@com',
            'password' => bcrypt('fantastic4'),
        ];
        $user = new User;
        $user->fill($param)->save();
    }
}
