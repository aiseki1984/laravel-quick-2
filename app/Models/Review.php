<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    // books テーブルへの参照
    public function book() {
        // Eloquentでは、暗黙的に「参照先のモデル名_id」を外部キーとみなす。
        // book_id列の値は、booksテーブルの主キー列(id)に対応していなければならない。
        return $this->belongsTo(Book::class);
    }

}
