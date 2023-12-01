<?php

namespace App\Http\Middleware;

use App\Http\Auth as AuthFunction;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class Auth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$accessLevel)
    {
        $user = AuthFunction::User($request);
       
        // return response($accessLevel == "*");
        if (!in_array("*", $accessLevel))
        {
            if (!$user) {
                return redirect('/login?url=' . $request->fullUrl());
                // return view('unauthorized');
            } else if(!in_array($user->role->intAccessLevel, $accessLevel)){
                return response(Response::HTTP_UNAUTHORIZED);
                // return view('unauthorized');
            } else if (!$user->bitApproved) {
                // return redirect()->route('unauthorized');
                // return view('unauthorized', ['message' => "Your account is not approved yet!"]);
                return response(Response::HTTP_UNAUTHORIZED);
            }
        }

        $request->attributes->add(['user' => $user]);
        view()->share('user', $user);

        return $next($request);
    }
}
