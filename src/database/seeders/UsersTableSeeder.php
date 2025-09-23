<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
            'id' => 1,
            'name' => 'user1',
            'email' => 'user1@email.com',
            'password' => Hash::make('user1'),
            'image' => 'storage/user_img/user1',
            'post-code' => '2608667',
            'address' => '千葉市中央区市場町1-1',
        ];
        DB::table('users')->insert($param);
        $param = [
            'id' => 2,
            'name' => 'user2',
            'email' => 'user2@email.com',
            'password' => Hash::make('user2'),
            'image' => 'storage/user_img/user2',
            'post-code' => '1638001',
            'address' => '新宿区西新宿2-8-1',
        ];
        DB::table('users')->insert($param);
        $param = [
            'id' => 3,
            'name' => 'user3',
            'email' => 'user3@email.com',
            'password' => Hash::make('user3'),
            'image' => 'storage/user_img/user3',
            'post-code' => '2318588',
            'address' => '横浜市中区日本大通1',
        ];
        DB::table('users')->insert($param);
    }
}
