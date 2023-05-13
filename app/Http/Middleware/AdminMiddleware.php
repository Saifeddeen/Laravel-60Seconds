<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
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
        $user = User::where('email', '=', $request->email)->first();
        if($user->admin_type != null){
            return $next($request);
        }else{
            return redirect()->route('login')->with('message', 'you must be admin to enter dashboard');
        }
        
    }
}
