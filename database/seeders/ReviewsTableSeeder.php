<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Review;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $reiview = Review::create([
            'book_id' => 1,
            'name' => '山田太郎',
            'body' => '環境を作るのに手間取ったが、本の通りにゲームアプリを作ることができて、楽しかった。'
        ]);
        $reiview = Review::create([
            'book_id' => 1,
            'name' => '鈴木智子',
            'body' => '初めてC#に挑戦しました。手順説明が丁寧で、図が多くて、良かったです。'
        ]);
        $reiview = Review::create([
            'book_id' => 1,
            'name' => '田中博司',
            'body' => '小5の子どもと一緒に勉強しました。途中からほとんど私がコーディングしていましたが。。。ダウンロードサンプルがあったので、つまづいた時に利用できて助かりました。'
        ]);
        DB::insert('INSERT INTO reviews (book_id, name, body)VALUES(2, "山田太郎", "仕事でAndroidアプリ開発を行うことになって購入した。説明が詳しく、分かりやすい。")');

        Review::factory()->count(50)->create();

    }
}
