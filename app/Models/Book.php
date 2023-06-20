<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    // マスアサイメント脆弱性を避けるため、
    // $fillableプロパティで宣言された項目だけ割り当てを許可。
    // 例えば、ここでは id をfillしようとしたら、 MassAssignmentException例外が発生する。
    protected $fillable = ['isbn', 'title', 'price', 'publisher', 'published'];

    // 検証ルールを準備
    public static $rules = [
        'isbn' => 'required',
        'title' => 'required|string|max:10',
        'price' => 'integer|min:0',
        'publisher' => 'required|in: 走跳社, テック Code, ジャパン IT, 優丸システム, IT Emotion',
        'published' => 'required|date',
    ];

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
