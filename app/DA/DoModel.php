<?php

namespace App\DA;

use Illuminate\Support\Facades\DB;

class DoModel
{
  const TABLE = 'tbl_do';
  const NTE = 'tbl_nte';
  public static function getById($id)
  {
    return DB::table(self::TABLE)->where('id', $id)->first();
  }
  public static function getSNById($id)
  {
    return DB::table(self::NTE)->where('do_id', $id)->get();
  }
  public static function getAll()
  {
    return DB::table(self::TABLE)->get();
  }
  public static function delete($id)
  {
    return DB::table(self::TABLE)->where('id', $id)->delete();
  }
  public static function insertOrUpdate($id, $req)
  {
    $auth = session('auth');
    $exist = self::getById($id);
    if($exist){
      DB::table(self::TABLE)
      ->where("id" , $id)
      ->update([
          "nomor_do" => $req->nomor_do,
          "tgl_terima" => $req->tgl_terima,
          "penerima_id" => $auth->ID_Sistem,
          "penerima_nama" => $auth->Nama
      ]);
      
    }else{
      $id = DB::table(self::TABLE)
      ->insertGetId([
          "nomor_do" => $req->nomor_do,
          "tgl_terima" => $req->tgl_terima,
          "penerima_id" => $auth->ID_Sistem,
          "penerima_nama" => $auth->Nama
      ]);
    }
    return $id;
  }
  public static function insertNte($id, $nte)
  {

    DB::table(self::NTE)
      ->where('do_id', $id)->delete();
    DB::table(self::NTE)
      ->insert($nte);
  }

  public static function get4Select2()
  {
    return DB::table(self::TABLE)->select('*', 'id as id', 'nomor_do as text')->get();
  }

  //laporan teknisi
}
