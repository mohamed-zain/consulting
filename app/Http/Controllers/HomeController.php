<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Pixelpeter\Woocommerce\Facades\Woocommerce;
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect('redirect');
    }
}
