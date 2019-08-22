<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\DA\DoModel;
use App\DA\UploadModel;
use Excel;
use Telegram;
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
    $auth = session('auth');
    if ($req->hasFile('file_sn')) {

      $id = DoModel::insertOrUpdate($id, [
          "nomor_do" => $req->nomor_do,
          "tgl_terima" => $req->tgl_terima,
          "penerima_id" => $auth->ID_Sistem,
          "penerima_nama" => $auth->Nama
      ]);
      $file = $req->file('file_sn');
      $arr = Excel::toArray(new UploadModel, $file);
      $result=array();
      foreach($arr[0] as $no=> $ex){
        if($no){
          $result[] = ["sn"=>$ex[0], "jenis_nte"=>$ex[1], "merk"=>$ex[2],"model"=>$ex[3],"do_id"=>$id, "status"=>"In Warehouse"];
        }
      }
      DoModel::insertNte($id, $result);

      //do upload surat jalan
      $input = 'surat_jalan';
      if ($req->hasFile($input)) {
        //dd('asd');
        $path = public_path().'/upload/surat_jalan/';
        if (!file_exists($path)) {
          if (!mkdir($path, 0775, true))
            return 'gagal menyiapkan folder foto evidence';
        }
        $file = $req->file($input);
        try {
          $nama = $file->getClientOriginalName();
          $moved = $file->move("$path", "$nama");
          DoModel::insertOrUpdate($id, ["surat_jalan"=>$nama]);
        }
        catch (\Symfony\Component\HttpFoundation\File\Exception\FileException $e) {
          return 'gagal menyimpan foto evidence '.$id;
        }
      }
      return redirect('/do/'.$id);
      // return view('do.form', compact('data', 'sn'));
    }
  }
  public function delete($id){
    $data = DoModel::delete($id);
    return redirect('/do');
  }
}
