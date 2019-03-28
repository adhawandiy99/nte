<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\DA\OpnameModel;

class OpnameController extends Controller
{
  public function index(){
    $data = OpnameModel::getAll();
    return view('opname.list', compact('data'));
  }
  public function input($id){
    $data = OpnameModel::getById($id);
    return view('opname.form', compact('data'));
  }
  public function save($id, Request $req){
    OpnameModel::insertOrUpdate($id, $req);
    return redirect('/opname/'.$id);
  }
  public function saveItem($id, Request $req){
    OpnameModel::updateList($req->id, ["opname_value"=>$req->opname_value, "keterangan"=>$req->keterangan]);
    return redirect('/opnameListItem/'.$id);
  }
  public function listItem($id){
    $opname = OpnameModel::getItemById($id);
    return view('opname.listItem', compact('opname'));
  }
}
