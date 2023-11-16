<?php

namespace App\Http;

use App\Models\User;
use Illuminate\Http\Request;

class Auth {
    public static function User(Request $request) : User | null {
        if ($request->session()->get('userId') == null) return null;

        $userId = $request->session()->get('userId');

        User: $user = User::where('intUserId', $userId)->get();

        if (count($user) > 0) return $user[0];
        else return null;
    }
}