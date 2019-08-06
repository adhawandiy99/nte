<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\DA\TeknisiModel;
use App\DA\OrderModel;
use DB;
class TeknisiController extends Controller
{
	public function index(){
		$data = TeknisiModel::getAll();
		return view('teknisi.list', compact('data'));
	}
	public function input($id){
		$data = TeknisiModel::getUserById($id);

		return view('teknisi.form', compact('data'));
	}
	public function save($id, Request $req){
		$data = TeknisiModel::insertOrUpdate($id, $req);
		return redirect('/teknisi');
	}
	public function delete($id){
		$data = TeknisiModel::delete($id);
		return redirect('/teknisi');
	}
	
	//laporan teknisi
	public function inbox(){
		$data = OrderModel::inbox(session('auth')->ID_Sistem);
		//dd($data);	
		return view('teknisi.inboxteknisi', compact('data'));
	}

}
