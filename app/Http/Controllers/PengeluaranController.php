<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\DA\PengeluaranModel;
use App\DA\UploadModel;
use App\DA\TeknisiModel;
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
    $teknisi = TeknisiModel::getUser4Select2();
    return view('pengeluaran.form', compact('data', 'sn', 'teknisi'));
  }
  public function save($id, Request $req){
    if ($req->hasFile('file_sn_out')) {

      $id = PengeluaranModel::insertOrUpdate($id, $req);
      
      $result=array();
      $sns = json_decode($req->sns);
      foreach($sns as $sn){
        $result[] = $sn->sn;
      }
      PengeluaranModel::updateNte($id, $result, ["pengeluaran_id"=>$id, "status"=>"Out Warehouse"]);
      return redirect('/out/'.$id);
      // return view('do.form', compact('data', 'sn'));
    }
  }
  public function cekNte($sn){
    $data = PengeluaranModel::cekNte($sn);
    return json_encode($data);
  }
  // public function delete($id){
  //   $data = PengeluaranModel::delete($id);
  //   return redirect('/pengeluaran');
  // }
}
