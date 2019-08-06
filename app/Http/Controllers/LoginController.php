<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\DA\TeknisiModel;

class LoginController extends Controller
{
	public function index(){
		return view('Login');
	}

	public function ceklogin(Request $req){
		//dd($user);
		$user = $req->input('username');
		$pass = $req->input('password');
		$result = TeknisiModel::login($user, $pass);
		if (count($result)>0) {
			$session = $req->session();
			$session->put('auth', $result[0]);
			return redirect('/');
		} else {
			return redirect('/login')->with('alerts', [
				['type' => 'danger', 'text' => 'Login Gagal']
			]);
		}
	}

	public function logout()
	{
		Session::forget('auth');
		return redirect('/login')->withCookie(cookie()->forever('presistent-token', ''));
	}
}
