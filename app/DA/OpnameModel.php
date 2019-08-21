<?php

namespace App\DA;

use Illuminate\Support\Facades\DB;

class OpnameModel
{
  const TABLE = 'tbl_opname';
  const ITEM = 'tbl_opname_list';
  const NTE = 'tbl_nte';

  public static function getById($id)
  {
    return DB::table(self::TABLE)->where('id', $id)->first();
  }
  public static function getItemById($id)
  {
    return DB::table(self::ITEM)->where('opname_id', $id)->get();
  }
  public static function getAll()
  {
    return DB::table(self::TABLE)->get();
  }
  public static function insertOrUpdate($id, $req)
  {
    $auth = session('auth');
    $exist = self::getById($id);
    if($exist){
      DB::table(self::TABLE)
      ->where("id" , $id)
      ->update([
          "tgl_opname" => $req->tgl_opname,
          "petugas_id" => $auth->ID_Sistem,
          "petugas_nama" => $auth->Nama
      ]);
    }else{
      $id = DB::table(self::TABLE)
      ->insertGetId([
          "tgl_opname" => $req->tgl_opname,
          "petugas_id" => $auth->ID_Sistem,
          "petugas_nama" => $auth->Nama
      ]);
      $data = self::getInsert($id);
      self::insertList($data);
    }
    return $id;
  }

  public static function getInsert($id)
  {
    $data = DB::select("SELECT model, (select count(*) from tbl_nte tn where model = tn.model and status='In Warehouse') as stok FROM tbl_nte GROUP BY model ORDER BY model");
    $insert = [];
    foreach($data as $d){
      $insert[] = ["jenis_nte" => $d->model, "opname_id"=>$id, "stok_terakhir" => $d->stok];
    }
    return $insert;
  }
  public static function insertList($insert)
  {
    DB::table(self::ITEM)
      ->insert($insert);
  }
  public static function updateList($id, $update)
  {
    DB::table(self::ITEM)
      ->where("id" , $id)
      ->update($update);
  }

}
