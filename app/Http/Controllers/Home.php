<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use function Termwind\render;
use App\Models\User;
use App\Models\Group;

class Home extends Controller
{
    public function index()
    {
        return view('home');
    }
}
