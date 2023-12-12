<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;


class CekPetugas extends Authenticatable
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $session = Auth::guard('CekPetugas')->user();
        if($session){
        return $next($request);
        }else{
            return redirect ("/petugas_login");
        }
    }
}
