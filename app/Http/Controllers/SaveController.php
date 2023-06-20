<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class SaveController extends Controller
{
    // 入力フォームの作成
    public function create() {
        return view('save.create');
    }

    // 入力フォームからの入力値をデータベースに登録
    public function store(Request $req) {

        $this->validate($req, Book::$rules);

        // a. モデルオブジェクトにデータを詰め替え&保存
        $b = new Book();

        // fillでリクエストを詰め込む。
        // @csrfで_tokenが生成されて$reqに含まれるので、それを除外する。
        // fillをするために、モデルのほうも調整する。（マスアサイメント脆弱性）
        $b->fill($req->except('_token'))->save();

        // // fillじゃなくても
        // $b->isbn = $req->isbn;
        // $b->name = $req->name;
        // ...
        // // のようにしてもいい
        return redirect('save/create');
    }

    public function edit($id) {
        // 指定された書籍情報を取得
        return view('save.edit', [
            'b' => Book::findOrFail($id)
        ]);
    }

    public function update(Request $req, $id) {
        // 目的のデータを取得
        $b = Book::findOrFail($id);

        // 入力値でモデルを更新&保存
        $b->fill($req->except('_token', '_method'))->save();
        return redirect('hello/list');
    }

    public function show($id) {
        return view('save.show', [
            'b' => Book::findOrFail($id)
        ]);
    }

    public function destory($id) {
        $b = Book::findOrFail($id);
        $b->delete();
        return redirect('hello/list');
    }
}
