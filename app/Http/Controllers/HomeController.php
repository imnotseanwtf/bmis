<?php

namespace App\Http\Controllers;

use App\Enums\UserTypeEnum;
use App\Models\ResidentInformation;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function dashboard()
    {
        $residentCount = User::role(UserTypeEnum::Resident->value)->count();

        return view('dashboard', compact('residentCount'));
    }
}
