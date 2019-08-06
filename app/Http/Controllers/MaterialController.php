<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\DA\MaterialModel;

class MaterialController extends Controller
{
	public function index(){
		$data = MaterialModel::getAll();
		return view('material.list', compact('data'));
	}
	public function input($id){
		$data = MaterialModel::getMaterialById($id);
		return view('material.form', compact('data'));
	}
	public function save($id, Request $req){
		//dd($req);
		$data = MaterialModel::insertOrUpdate($id, $req);
		return redirect('/material');
	}
	public function delete($id){
		$data = MaterialModel::delete($id);
		return redirect('/material');
	}
}
