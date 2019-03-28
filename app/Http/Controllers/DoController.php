<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\DA\DoModel;
use App\DA\UploadModel;
use Excel;
class DoController extends Controller
{
  public function index(){
    $data = DoModel::getAll();
    return view('do.list', compact('data'));
  }
  public function input($id){
    $data = DoModel::getById($id);
    $sn = DoModel::getSNById($id);
    return view('do.form', compact('data', 'sn'));
  }
  public function save($id, Request $req){
    // $data = DoModel::insertOrUpdate($id, $req);
    if ($req->hasFile('file_sn')) {

      $id = DoModel::insertOrUpdate($id, $req);
      $file = $req->file('file_sn');
      $arr = Excel::toArray(new UploadModel, $file);
      $result=array();
      foreach($arr[0] as $no=> $ex){
        if($no){
          $result[] = ["sn"=>$ex[0], "jenis_nte"=>$ex[1], "merk"=>$ex[2],"model"=>$ex[3],"do_id"=>$id, "status"=>"In Warehouse"];
        }
      }
      DoModel::insertNte($id, $result);
      return redirect('/do/'.$id);
      // return view('do.form', compact('data', 'sn'));
    }
  }
  public function delete($id){
    $data = DoModel::delete($id);
    return redirect('/do');
  }
}
