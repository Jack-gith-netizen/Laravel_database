<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SessionTimeout
{
    public function handle(Request $request, Closure $next)
    {
        // 检查用户是否登录
        if (!Auth::check()) {
            return redirect()->route('login')->with('message', 'login_required');
        }

        $timeout = config('session.timeout', 3600);
        $lastActivity = Session::get('last_activity');

        // 检查是否超时
        if ($lastActivity && (time() - $lastActivity) > $timeout) {
            Auth::logout();
            Session::flush(); // flush 比 invalidate 更彻底
            return redirect()->route('logout', ['reason' => 'timeout']);
        }

        // 更新活动时间
        Session::put('last_activity', time());
        Route::middleware(['auth', 'session.timeout'])->group(function () {
            Route::get('/', [StudentController::class, 'index'])->name('main');
            Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
            // ... 其他需要登录才能访问的路由
        });
        

        return $next($request);
    }
}
