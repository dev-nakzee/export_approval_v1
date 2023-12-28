<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class CookiesController extends Controller
{
    //
    public function accept() {
        $cookiepop = 1;
        Cookie::queue('cookiepop', $cookiepop, 43800);
        return response('Cookie set');
    }

    public function reject() {
        $cookiepop = 1;
        Cookie::queue('cookiepop', $cookiepop, 43800);
        return response('Cookie set');
    }
}
