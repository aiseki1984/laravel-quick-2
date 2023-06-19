<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CtrlController extends Controller
{

    // ミドルウェアを定義
    // only / except メソッドを使って、特定のアクションのみにすることができる

    public function __construct() {
        $this->middleware(function($request, $next) {
            $logFile = storage_path('logs/access2.log');
            $logMessage = date('Y-m-d H:i:s')."\n";
            file_put_contents($logFile, $logMessage, FILE_APPEND);
            return $next($request);
        })->only(["upload", "form"]);
    }


    public function middle() {
        return view('ctrl.middle', [
            'msg' => 'Log is recorded!!'
        ]);
    }
    public function upload() {
        return view('ctrl.upload', ['result'=>'']);
    }
    public function uploadFile(Request $req) {
        if (!$req->hasFile('upfile')) {
            return 'ファイルを指定してください。';
        }
        $file = $req->upfile;
        if(!$file->isValid()) {
            return 'アップロードに失敗しました。';
        }
        $name = $file->getClientOriginalName();
        $file->storeAs('files', $name);
        return view('ctrl.upload', [
            'result' => $name.'をアップロードしました'
        ]);
    }

    public function result(Request $req) {
        $name = $req->input('name', '名無し');
        // $dt = $req->date('name', 'Y-m-d', 'Asia/Tokyo');

        return view('ctrl.form', ['result'=>'こんにちは、'.$name.'さん!']);
        // $dt = $req->date('hoge', 'Y-m-d', 'Asia/Tokyo');
        // $name = $req->input('hoge', '名無権兵衛');

        // return view('ctrl.form', [
        //     // 'result' => 'こんにちは、'.$name.'さん！'
        //     'result' => $dt
        // ]);
    }
    public function form() {
        return view('ctrl.form', ['result'=>'']);
    }

    public function index(Request $req) {
        return 'リクエストパス: '.$req->path();
    }
    
    public function redirectBasic() {
        return redirect("hello/list");
        // ルート名によるリダイレクト
        // return redirect()->route('list');
        // return redirect()->route('param', ['id'=>108]);
        // アクションへのリダイレクト
        // return redirect()->action('RouteController@param', ['id'=>108]);
        // 外部サイトへのリダイレクト
        // return redirect()->away('https://wings.msn.to/');
    }
    
    public function outImage() {
        return response()
            ->file('/var/www/html/_data/wings.jpg', ['content-type'=>'image/jpg']);
    }

    public function outCsv() {
        return response()
            ->streamDownload(function() {
                print(
                    "1,2022/10/1,123\n".
                    "2,2022/10/2,116\n".
                    "3,2022/10/3,98\n".
                    "4,2022/10/4,102\n".
                    "5,2022/10/5,134\n"
                );
            }, 'download.csv', ['content-type'=>'text/csv']);
    }
    public function outFile() {
        return response()
            ->download('/var/www/html/_data/quick.sql', 'download.sql', ['content-type'=>'text/sql']);
    }

    public function outJson() {
        return response()
            ->json([
                'name'=>'Yoshihiro YAMADA',
                'sex'=>'male',
                'age'=>18
            ]);
        // return response()
        //     ->json([
        //         'name'=>'Yoshihiro YAMADA',
        //         'sex'=>'male',
        //         'age'=>18
        //     ])
        //     ->withCallback('callback');
        // return [
        //     'name'=>'Yoshihiro YAMADA',
        //     'sex'=>'male',
        //     'age'=>18
        // ];
    }

    public function header() {
        return response()
            ->view('ctrl.header', ['msg' => 'こんにちは、世界！'], 200)
            ->header('Content-Type', 'text/xml');
    // return response()
    //     ->view('ctrl.header', [ 'msg' => 'こんにちは、世界！' ], 200)
    //     ->withHeaders([
    //         'Content-Type' => 'text/xml',
    //         'X-Powered-FW' => 'Laravel/9'
    //     ]); 
    }
    
    public function plain() {
        return response('こんにちは、世界！', 200)
            ->header('Content-Type', 'text/plain');
    }
    
}
