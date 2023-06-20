<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    // nekoneko スコープを定義
    // - 引数として Builderオブジェクトを($query)を受け取る
    // - 戻り値はなし (void)
    // - 名前はscopeで始まること
    public function scopeNekoneko($query) {
        $query->where('published', '<=', now());
    }
    
    // 動的スコープ 独自の引数
    public function scopePiyopiyo($query, $name) {
        $query->where('publisher', $name);
    }

    // reviews テーブルへの参照
    public function reviews() {
        // Eloquentでは、暗黙的に「参照先のモデル名_id」を外部キーとみなす。
        // book_id列の値は、booksテーブルの主キー列(id)に対応していなければならない。
        return $this->hasMany(Review::class);
    }
}
