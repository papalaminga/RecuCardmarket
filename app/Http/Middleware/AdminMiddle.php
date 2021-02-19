<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use JWTAuth;
use Exception;
use App\Models\User;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;


class AdminMiddle
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        $token = JWTAuth::parseToken()->authenticate()

        $user = User::where('role', 'administrator')->first();

        if ($user) {
            
            if ($user->Role != 'Administrator'){

                return response("Operation not allwed", 403);

            }else{

                return response("Invalid token") ;
            }
        }        
        return $next($request);

    }




    /*public function handle(Request $request, Closure $next)
    {
        $user = JWTAuth::parseToken()->authenticate();

        $rol = $user->get('role');

        if ($user) {
            
            if ($rol != 'administrator'){

                return response("Operation not allwed", 403);

            }else{

                return response("Invalid token") ;
            }
        }
        
        return $next($request);
    }*/
}
