<?php

namespace App\Http\Middleware;

use Closure;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Date
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $currDate = DB::table('tblKeyValues')->where('key', 'currDate')->get('value');

        if (count($currDate) < 1) {
            $date = new DateTime();
            $currDate = $date->format('Y-m-d');
            DB::table('tblKeyValues')->insert(['key' => 'currDate', 'value' => $currDate]);
        } else {
            $currDate = $currDate[0]->value;
        }

        $request->attributes->add(['currDate' => $currDate]);
        view()->share('currDate', $currDate);

        return $next($request);
    }
}
