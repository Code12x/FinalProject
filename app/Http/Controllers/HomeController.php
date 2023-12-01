<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function reroute(Request $request)
    {
        $user = $request->attributes->get('user');

        if (is_null($user)) return redirect('/login');
        
        switch ($user->role->intAccessLevel) {
            case 1:
                return redirect('/admin/home');
                break;
            case 2:
                return redirect('/supervisor/home');
                break;
            case 3:
                return redirect('/doctor/home');
                break;
            case 4:
                return redirect('/caregiver/home');
                break;
            case 5:
                return redirect('/patient/home');
                break;
            case 6:
                return redirect('/family/home');
                break;
            default:
                return redirect('/');
                break;
        }
    }
}
