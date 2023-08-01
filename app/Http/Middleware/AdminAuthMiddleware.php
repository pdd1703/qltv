<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
// use App\Http\Controllers\BookController;
class AdminAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

        public function handle(Request $request, Closure $next)
        {
            //  dd($request->user()->id_admin);
            // Kiểm tra xem người dùng đã đăng nhập hay  chưa
            // if (!$request->user()->isAdmin())  {
            //     abort(403, 'Bạn không có quyền truy cập vào trang admin. ');
            // }
            // if ($request->user()->id_admin == 1)  {
            //     return redirect('/admin/login');
            // }
            // if (!Auth::check()) {
            //     return redirect('/admin/login'); // Hoặc làm điều hướng đến trang đăng nhập
            //     // abort(403, 'Bạn không có quyền truy cập vào trang admin.');
            // }
            if (Auth::user()){
                if ( Auth::user()->is_admin  == 1) {

                    return $next($request);
                }
                // else{
                //     return redirect('/admin/login');
                // }
            }
            return redirect('/admin/login');
        }
}

