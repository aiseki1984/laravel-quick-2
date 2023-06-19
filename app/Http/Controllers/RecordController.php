<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\DB;

class RecordController extends Controller
{

    public function dump() {
        // SQL命令の確認 (デバッグ)
        $result = Book::groupby('publisher')
            ->having('price_avg', '<', 3200)
            ->selectRaw('publisher, AVG (price) AS price_avg')
            ->dump()
            ->get();
        // $result = Book::groupBy('publisher')
        //     ->having('price_avg', '<', 3200)
        //     ->selectRaw('publisher, AVG (price) AS price_avg')
        //     ->get();
        return view('record.groupby', ['records' => $result]);
    }

    public function query() {
        // Eloquentにこだわるよりも、より低レベルなDBクラスを使うほうが良い時もある。
        $data = [
            'records' => DB::select('SELECT * FROM books'),
        ];
        return view('record.list', $data);
    }

    public function scope() {

        $result = Book::piyopiyo('走跳社')->get();
        return view('record.list', ['records' => $result]);

        // $result = Book::nekoneko()->get();
        // return view('record.list', ['records' => $result]);
    }

    public function groupby() {

        // データの集計 avg / count / max / min
        // 例えば、「走跳社の書籍から最高値」
        $maxprice = Book::where('publisher', '走跳社')->max('price');
        return $maxprice;
        // $result = Book::where('price', $maxprice)->get();
        // return view('record.list', ['records' => $result]);


        // // グループ化列の絞り込み having
        // // 例えば、出版社でグループ化した時、平均価格が3200円未満のデータだけを取得する。
        // $result = Book::groupBy('publisher')
        //     ->having('price_avg', '<', 3200)
        //     ->selectRaw('publisher, AVG (price) AS price_avg')
        //     ->get();
        // return $result;

        // // データのグループ化
        // // 例えば、出版社でグループ化し、価格の平均を求める
        // $result = Book::groupBy('publisher')
        //     ->selectRaw('publisher, AVG (price) AS price_avg')
        //     ->get();
        // return $result;
    }

    public function select() {
        // 取得列の制約 select
        $result = Book::select('title', 'publisher')->get();
        return view('record.list', ['records' => $result]);
    }

    public function orderby() {

        // 取得範囲の指定 offset / limit
        $result = Book::orderBy('published', 'desc')
            ->offset(2)
            ->limit(3)
            ->get();
        return view('record.list', ['records' => $result]);

        // // データの並び替え
        // $result = Book::orderBy('price', 'desc')->orderBy('published', 'asc')->get();
        // return view('record.list', ['records' => $result]);
        
    }

    public function where() {

        // 生の条件式
        $result = Book::whereRaw('publisher = ? AND price < ?', ['走跳社', 3000])->get();
        // $result = Book::whereRaw('publisher = "走跳社" AND price < 3000')->get();
        return view('record.list', ['records' => $result]);

        // // AND / OR 条件
        // $result = Book::where('publisher', '走跳社')->orWhere('price', '<', 2500)->get();
        // // $result = Book::where('publisher', '走跳社')->where('price', '<', 3000)->get();
        // return view('record.list', ['records' => $result]);

        // // 日付検索 whereDate / whereYear / whereMonth / whereDay / whereTime
        // $result = Book::whereYear('published', '<', '2022')->get();
        // // $result = Book::whereYear('published', '2022')->get();
        // return view('record.list', ['records' => $result]);

        // // NULLチェック whereNull/whereNotNull
        // $result = Book::whereNull('created_at')->get();
        // return view('record.list', ['records' => $result]);

        // // 範囲検索 Between whereBetween/whereNotBetween
        // $result = Book::whereBetween('price', [1000, 3000])->get();
        // return view('record.list', ['records' => $result]);

        // 範囲検索 IN whereIn/whereNotIn
        // $result = Book::whereIn('publisher', ['ジャパン IT', '走跳社', 'IT Emotion'])->get();
        // return view('record.list', ['records' => $result]);

        // // 部分一致検索 LIKE
        // $result = Book::where('title', 'LIKE', '%visual%')->get();
        // return view('record.list', ['records' => $result]);

        // // 大小比較
        // $result = Book::where('price', '<', 3000)->get();
        // return view('record.list', ['records' => $result]);

        
        // $result = Book::where('publisher', '走跳社')->first();
        // return view('record.list', ['records' => [$result]]);

        // $result = Book::where('publisher', '走跳社')->get();
        // return view('record.list', ['records' => $result]);
    }

    public function find() {
        return Book::find(1)->title;
    }
}
