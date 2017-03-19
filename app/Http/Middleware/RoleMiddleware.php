<?php

namespace App\Http\Middleware;
use Illuminate\Contracts\Auth\Factory as Auth;
use Closure;

class RoleMiddleware
{

    protected $auth;

    /**
     * Create a new middleware instance.
     *
     * @param  \Illuminate\Contracts\Auth\Factory  $auth
     * @return void
     */
    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role = null) //var $role ni ambil dari route lepas roleCheck:$role
    {
        $user = $request->user();
        if($user && $user->roleCheck($role)){  //rolecheck refer User.php function
            return $next($request);
        } else {
            dd('seller');
        }
    }
}
