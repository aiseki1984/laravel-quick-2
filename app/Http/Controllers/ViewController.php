<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class ViewController extends Controller
{
    public function comp() {
        $data = [
            'title' => 'こんにちは、世界!',
            'comp' => 'my-alert'
        ];
        return view('view.comp', $data);
    }
    public function master() {
        $data = [
            'msg' => 'こんにちは、世界！',
        ];
        return view('view.master', $data);
    }
    public function checked() {
        $data = [
            'isEnabled' => true
        ];
        return view('view.checked', $data);
    }
    public function style_class() {
        $data = [
            'isEnabled' => true
        ];
        return view('view.style_class', $data);
    }
    public function forelse() {
        $data = [
            'records' => []
        ];
        return view('view.forelse', $data);
    }
    public function foreach_loop() {
        $data = [
            'weeks' => ['日','月','火','水','木','金','土']
        ];
        return view('view.foreach_loop', $data);
    }
    public function foreach_assoc() {
        $data = [
            'member' => [
                'name' => 'YAMADA, Yoshihiro',
                'sex' => '男',
                'birth' => '1923-11-10',
            ]
        ];
        return view('view.foreach_assoc', $data);
    }
    public function list() {
        $data = [
            'records' => Book::all(),
        ];
        return view('view.list', $data);
    }
    public function for() {
        return view('view.for');
    }
    public function while() {
        return view('view.while');
    }
    public function switch() {
        return view('view.switch', [
            // 1 ~ 5 の乱数を取得
            'random' => random_int(1,5)
        ]);
    }
    public function isset() {
        return view('view.isset', [
            'msg' => 'こんにちは、世界！',
        ]);
    }
    public function unless() {
        return view('view.unless', [
            'random' => random_int(0, 100)
        ]);
    }
    public function if() {
        return view('view.if', [
            // 乱数を取得
            'random' => random_int(0, 100)
        ]);
    }
    public function comment() {
        return view('view.comment');
    }
    public function escape() {
        return view('view.escape', [
            'msg' => '<img src="https://wings.msn.to/image/wings.jpg" title="ロゴ"><p>WINGSへようこそ</p>'
        ]);
    }
}
