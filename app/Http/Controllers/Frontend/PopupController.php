<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class PopupController extends Controller
{
    //
    public function close() {
        $popup = 1;
        Cookie::queue('popup', $popup, 60);
        return response('Cookie set');
    }
}
