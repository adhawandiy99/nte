<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
	public function index(){
		return view('welcome');
	}
}
