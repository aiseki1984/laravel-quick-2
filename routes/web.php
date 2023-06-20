<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\HelloController;
use App\Http\Middleware\LogMiddleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// 同一コントローラーへのルート情報を束ねる
Route::controller(HelloController::class)->group(function() {
    Route::get('/hello', 'index');
    Route::get('/hello/view', 'view');
    // Route::get('/hello/list', 'list');
    Route::get('/hello/list', 'list')->name('list');
});

// Route::get('/hello', 'HelloController@view');
// Route::get('/hello/list', 'HelloController@list');
// Route::get('/hello', '\App\Http\Controllers\HelloController@index');
// Route::get('/hello', 'HelloController@index');
// Route::get('/hello', [HelloController::class, 'index']);


Route::get('/view/escape', 'ViewController@escape');
Route::get('/view/comment', 'ViewController@comment');
Route::get('/view/if', 'ViewController@if');
Route::get('/view/unless', 'ViewController@unless');
Route::get('/view/isset', 'ViewController@isset');
Route::get('/view/switch', 'ViewController@switch');
Route::get('/view/while', 'ViewController@while');
Route::get('/view/for', 'ViewController@for');
Route::get('/view/list', 'ViewController@list');
Route::get('/view/foreach_assoc', 'ViewController@foreach_assoc');
Route::get('/view/foreach_loop', 'ViewController@foreach_loop');
Route::get('/view/forelse', 'ViewController@forelse');
Route::get('/view/style_class', 'ViewController@style_class');
Route::get('/view/checked', 'ViewController@checked');

Route::get('/view/master', 'ViewController@master');
Route::get('/view/comp', 'ViewController@comp');

Route::get('/ctrl/plain', 'CtrlController@plain');
Route::get('/ctrl/header', 'CtrlController@header');
Route::get('/ctrl/outJson', 'CtrlController@outJson');
Route::get('/ctrl/outFile', 'CtrlController@outFile');
Route::get('/ctrl/outCsv', 'CtrlController@outCsv');
Route::get('/ctrl/outImage', 'CtrlController@outImage');
Route::get('/ctrl/redirectBasic', 'CtrlController@redirectBasic');
Route::get('/ctrl/index', 'CtrlController@index');
Route::get('/ctrl/form', 'CtrlController@form');
Route::post('/ctrl/result', 'CtrlController@result');
Route::get('/ctrl/upload', 'CtrlController@upload');
Route::post('/ctrl/uploadfile', 'CtrlController@uploadfile');

// Route::get('/ctrl/middle', 'CtrlController@middle')->middleware(LogMiddleware::class);
Route::group(['middleware'=>['debug']], function() {
    Route::get('/ctrl/middle', 'CtrlController@middle');
});

// Example
// Route::post('/route/post', 'RouteController@post');
// Route::match(['get', 'post'], '/route/match', 'RouteController@match');
// Route::any('/route/any', 'RouteController@match');
// ルート定義の確認
// php artisan route:list


// デフォルトでルートパラメーターは必須
// Route::get('route/param/{id}', 'RouteController@param')
// Route::get('route/param/{id?}', 'RouteController@param')

// ルートパラメーターの制約
// Route::get('route/param/{id?}', 'RouteController@param')->where(['id'=> '[0-9]{2,3}']);
// Route::get('route/param/{id?}', 'RouteController@param')->whereNumber('id');

// 可変長パラメーター
// たとえば「~/search/laravel/php/framework」であれば「~/search/」以降の「laravel/php/framework」」をまとめて
// ひとつの変数で受け取れるパラメーターのこと。この例では、利用するときにスラッシュで値を分割することになりそう。
// Route::get('route/search/{keywd?}', 'RouteController@search')->where('keywd', '.*');

// ルート共通の接頭辞を付与する
// Route::prefix('/members')->group(function() {
//     Route::get('/info', 'RouteController@info');
//     Route::get('/article', 'RouteController@article');
// });

// 名前空間付きコントローラー
// Route::namespace('Main')->group(function () {
//     Route::get('/route/ns', 'RouteController@ns');
// });

// アクションの省略
// Route::view('/route', 'route.view', ['name'=>'Laravel']);

// Enum型によるパラメーターの制限
// `~/route/enum_param/lang`, `~/route/fw`ではOK
// `~/route/enum_param/hoge`ではエラーになる
// Route::get('route/enum_param/{category}', 'RouteController@enum_param');

// リダイレクト
// Route::redirect('/hoge', '/');
// Route::redirect('/hoge', '/', 301);

// リソースルート
// - GET `/articles` `index`
// - GET `/articles/{article}` `show`
// - GET `/articles/create` `create`
// - POST `/articles` `store`
// - GET `/articles/{article}/edit` `edit`
// - PUT/PATCH `/articles/{article}` `update`
// - DELETE `/articles/{article}` `destory`
// Route::resource('/articles', 'ArticleController');
// 特定のルート（action）を無効化するなら、exceptメソッドを利用する。
// Route::resource('/articles', 'ArticleController')->except(['edit', 'update']);

// resouces
// Route::resources([
//     '/articles' => 'ArticleContrller',
//     '/categories' => 'CategoriesContrller',
// ]);

// リソースに対応するコントローラーの作成
// php artisan make:controller ArticleController --resource --model=Article

Route::get('state/view', 'StateController@recCookie');
Route::get('state/readCookie', 'StateController@readCookie');
Route::get('state/session1', 'StateController@session1');
Route::get('state/session2', 'StateController@session2');


Route::get('record/find', 'RecordController@find');
Route::get('record/where', 'RecordController@where');
Route::get('record/orderby', 'RecordController@orderby');
Route::get('record/select', 'RecordController@select');
Route::get('record/groupby', 'RecordController@groupby');
Route::get('record/scope', 'RecordController@scope');
Route::get('record/query', 'RecordController@query');
Route::get('record/dump', 'RecordController@dump');
Route::get('record/hasmany', 'RecordController@hasmany');

// フォールバックルート
// どのルートにもマッチしない場合、最終的に実行すべきルート（フォールバックルート）を定義できます
// Route::fallback(function() {
//     return view('route.error');
// });