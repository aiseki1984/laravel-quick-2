<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Book;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::insert('INSERT INTO books (isbn, title, price, publisher, published) VALUES ("978-8222-5399-8", "Visual C# 超入門", 2000, "ジャパン IT", "2022-08-22")');
        Book::factory()->count(50)->create();
    }
}