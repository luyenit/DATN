<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle($request, Closure $next)
    {   
            // if (Auth::check()) {
            //     dd(Auth::user()->chuc_vu->ten_chuc_vu);
            // } 
        
        if (Auth::check() && Auth::user()->chuc_vu->ten_chuc_vu ) {
            return $next($request);
        }

        // Nếu không phải là role mong muốn, điều hướng về trang khác hoặc thông báo lỗi
        return redirect('/auth/login')->withErrors('Bạn không có quyền truy cập vào trang này.');
    }
}