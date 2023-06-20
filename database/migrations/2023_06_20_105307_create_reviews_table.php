<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            // Eloquentでは、暗黙的に「参照先のモデル名_id」を外部キーとみなす。
            // book_id列の値は、booksテーブルの主キー列(id)に対応していなければならない。
            $table->biginteger('book_id');
            $table->string('name');
            $table->text('body');
            $table->timestamps();
 
            // 明示的に以下のように外部キー制約を定義することもできる
            // $table->foreign('book_id')->references('id')->on('books');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
