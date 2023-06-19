<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LogMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // アクションを実行
        $response = $next($request);
    
        // ログファイルのパスを指定します。
        $logFile = storage_path('logs/access.log');
    
        // ログメッセージを作成します。
        $logMessage = sprintf(
            "[%s] %s %s %s\n",
            date('Y-m-d H:i:s'),
            $request->ip(),
            $request->method(),
            $request->fullUrl()
        );
    
        // ログファイルにメッセージを追記します。
        file_put_contents($logFile, $logMessage, FILE_APPEND);
    
        return $response;
    }
    // public function handle(Request $request, Closure $next): Response
    // {
    //     // アクションの実行前にログを実行
    //     $logFile = storage_path('logs/access.log');
    //     $logMessage = date('Y-m-d H:i:s')."\n";
    //     file_put_contents($logFile, $logMessage, FILE_APPEND);
    
    //     // a. アクションを実行
    //     $response = $next($request);

    //     // b. レスポンスの内容を加工
    //     $response->setContent(mb_strtoupper($response->content()));
    
    //     return $response;
    // }
}
