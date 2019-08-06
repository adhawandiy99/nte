<?php

namespace App\DA;

use Illuminate\Support\Facades\DB;

class PengeluaranModel
{
  const TABLE = 'tbl_pengeluaran';
  const NTE = 'tbl_nte';
  public static function getById($id)
  {
    return DB::table(self::TABLE)->where('id', $id)->first();
  }
  public static function getSNById($id)
  {
    return DB::table(self::NTE)->where('pengeluaran_id', $id)->get();
  }
  public static function getAll()
  {
    return DB::table(self::TABLE)->get();
  }
  // public static function delete($id)
  // {
  //   return DB::table(self::TABLE)->where('id', $id)->delete();
  // }
  public static function insertOrUpdate($id, $req)
  {
    $auth = session('auth');
    $exist = self::getById($id);
    if($exist){
      DB::table(self::TABLE)
      ->where("id" , $id)
      ->update([
          "tujuan" => $req->tujuan,
          "tgl_keluar" => $req->tgl_keluar,
          "petugas_id" => $auth->id,
          "teknisi_id" => $req->teknisi_id,
          "petugas_nama" => $auth->nama
      ]);
      
    }else{
      $id = DB::table(self::TABLE)
      ->insertGetId([
          "tujuan" => $req->tujuan,
          "tgl_keluar" => $req->tgl_keluar,
          "petugas_id" => $auth->id,
          "teknisi_id" => $req->teknisi_id,
          "petugas_nama" => $auth->nama
      ]);
    }
    return $id;
  }
  public static function updateNte($id, $sn, $update)
  {

    DB::table(self::NTE)
      ->where('pengeluaran_id', $id)->delete();
    DB::table(self::NTE)
      ->whereIn('sn',$sn)
      ->update($update);
  }

  // public static function get4Select2()
  // {
  //   return DB::table(self::TABLE)->select('*', 'id as id', 'nomor_do as text')->get();
  // }

  //laporan teknisi
}
