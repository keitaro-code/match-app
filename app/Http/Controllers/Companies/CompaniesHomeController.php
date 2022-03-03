<?php

namespace App\Http\Controllers\Companies;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CompaniesHomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //companiesテーブルのユーザーがログインできるように
        // $this->middleware('auth');
        $this->middleware('auth:companies');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('companies.home');
    }
}
