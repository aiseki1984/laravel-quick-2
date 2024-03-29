<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StateController extends Controller
{
    public function session1(Request $req) {

        // session関数
        // session(['series'=>'速習シリーズ']);
        // $series = session('series', '未定');

        $req->session()->put('series', '速習シリーズ');
        return 'セッションを保存しました。';
    }

    public function session2(Request $req) {
        $series = $req->session()->get('series', '未定');
        return 'シリーズ: '.$series;
    }

    public function readCookie(Request $req) {
        
        return response()
            ->view('state.readcookie', [
                'app_title' => $req->cookie('app_title')
            ]);
    }

    public function recCookie() {
        // cookieの値（ここでは'laravel'という文字列）は暗号化される
        // jsと連携したいなどで、暗号化を無効化したい場合は /app/Http/Middlewareの
        // EncryptCookies.phpを編集する。

        // cookieを明示的に削除する
        // use Illuminate\Support\Facades\Cookie;
        // Cookie::expire('app_title');

        return response()
            ->view('state.view')
            ->cookie('app_title', 'laravel', 60 * 24 * 30);

            // cookieを明示的に削除する
            // ->withoutCookie('app_title');
    }

}
