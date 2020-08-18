<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use App\Click as Click;
use App\View as View;

class AdminController extends Controller
{
    public function __construct(Request $request)
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        $level = Auth::user()->level;
    }
}
