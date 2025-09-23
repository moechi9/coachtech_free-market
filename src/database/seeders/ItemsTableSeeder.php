<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemsTableSeeder extends Seeder
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
            'user_id' => 1,
            'img' => 'storage/item_img/腕時計.png',
            'condition_id' => 1,
            'name' => '腕時計',
            'brand' => 'Rolax',
            'content' => 'スタイリッシュなデザインのメンズ腕時計',
            'price' => '15000'
        ];
        DB::table('items')->insert($param);
        $param = [
            'id' => 2,
            'user_id' => 2,
            'img' => 'storage/item_img/HDD.png',
            'condition_id' => 2,
            'name' => 'HDD',
            'brand' => '西芝',
            'content' => '高速で信頼性の高いハードディスク',
            'price' => '5000'
        ];
        DB::table('items')->insert($param);
        $param = [
            'id' => 3,
            'user_id' => 3,
            'img' => 'storage/item_img/玉ねぎ3束.png',
            'condition_id' => 3,
            'name' => '玉ねぎ3束',
            'brand' => 'なし',
            'content' => '新鮮な玉ねぎ3束のセット',
            'price' => '300'
        ];
        DB::table('items')->insert($param);
        $param = [
            'id' => 4,
            'user_id' => 1,
            'img' => 'storage/item_img/革靴.png',
            'condition_id' => 4,
            'name' => '革靴',
            'content' => 'クラシックなデザインの革靴',
            'price' => '4000'
        ];
        DB::table('items')->insert($param);
        $param = [
            'id' => 5,
            'user_id' => 2,
            'img' => 'storage/item_img/ノートPC.png',
            'condition_id' => 1,
            'name' => 'ノートPC',
            'content' => '高性能なノートパソコン',
            'price' => '45000'
        ];
        DB::table('items')->insert($param);
        $param = [
            'id' => 6,
            'user_id' => 3,
            'img' => 'storage/item_img/マイク.png',
            'condition_id' => 2,
            'name' => 'マイク',
            'brand' => 'なし',
            'content' => '高音質のレコーディング用マイク',
            'price' => '8000'
        ];
        DB::table('items')->insert($param);
        $param = [
            'id' => 7,
            'user_id' => 1,
            'img' => 'storage/item_img/ショルダーバッグ.png',
            'condition_id' => 3,
            'name' => 'ショルダーバッグ',
            'content' => 'おしゃれなショルダーバッグ',
            'price' => '3500'
        ];
        DB::table('items')->insert($param);
        $param = [
            'id' => 8,
            'user_id' => 2,
            'img' => 'storage/item_img/タンブラー.png',
            'condition_id' => 4,
            'name' => 'タンブラー',
            'brand' => 'なし',
            'content' => '使いやすいタンブラー',
            'price' => '500'
        ];
        DB::table('items')->insert($param);
        $param = [
            'id' => 9,
            'user_id' => 3,
            'img' => 'storage/item_img/コーヒーミル.png',
            'condition_id' => 1,
            'name' => 'コーヒーミル',
            'brand' => 'Starbacks',
            'content' => '手動のコーヒーミル',
            'price' => '4000'
        ];
        DB::table('items')->insert($param);
        $param = [
            'id' => 10,
            'user_id' => 1,
            'img' => 'storage/item_img/メイクセット.png',
            'condition_id' => 2,
            'name' => 'メイクセット',
            'content' => '便利なメイクアップセット',
            'price' => '2500'
        ];
        DB::table('items')->insert($param);
    }
}
