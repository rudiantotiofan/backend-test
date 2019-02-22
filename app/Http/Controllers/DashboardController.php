<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index(){
    	$data = null;
    	return view('page.dashboard', compact('data'));
    }
}
