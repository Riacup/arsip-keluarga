<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModelJadwal;
use App\User;

class BaseController extends Controller
{
    public function index(){
        return view('base/home_page');
    }

}
