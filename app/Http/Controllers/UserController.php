<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\DA\UserModel;

class UserController extends Controller
{
  public function index(){
    $data = UserModel::getAll();
    return view('user.list', compact('data'));
  }
  public function input($id){
    $data = UserModel::getUserById($id);
    return view('user.form', compact('data'));
  }
  public function save($id, Request $req){
    $data = UserModel::insertOrUpdate($id, $req);
    return redirect('/user');
  }
  public function delete($id){
    $data = UserModel::delete($id);
    return redirect('/user');
  }
}
