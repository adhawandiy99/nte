<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\DA\PengeluaranModel;
use App\DA\UploadModel;
use Excel;
class PengeluaranController extends Controller
{
  public function index(){
    $data = PengeluaranModel::getAll();
    return view('pengeluaran.list', compact('data'));
  }
  public function input($id){
    $data = PengeluaranModel::getById($id);
    $sn = PengeluaranModel::getSNById($id);
    return view('pengeluaran.form', compact('data', 'sn'));
  }
  public function save($id, Request $req){
    if ($req->hasFile('file_sn_out')) {

      $id = PengeluaranModel::insertOrUpdate($id, $req);
      $file = $req->file('file_sn_out');
      $arr = Excel::toArray(new UploadModel, $file);
      $result=array();
      foreach($arr[0] as $no=> $ex){
        if($no){
          $result[] = $ex[0];
        }
      }
      PengeluaranModel::updateNte($id, $result, ["pengeluaran_id"=>$id, "status"=>"Out Warehouse"]);
      return redirect('/out/'.$id);
      // return view('do.form', compact('data', 'sn'));
    }
  }
  // public function delete($id){
  //   $data = PengeluaranModel::delete($id);
  //   return redirect('/pengeluaran');
  // }
}
