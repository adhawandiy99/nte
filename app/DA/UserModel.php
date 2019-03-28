<?php

namespace App\DA;

use Illuminate\Support\Facades\DB;

class UserModel
{
	const TABLE = 'tbl_user';
  public static function getUserById($id)
  {
    return DB::table(self::TABLE)->where('id', $id)->first();
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
    $exist = self::getUserById($id);
    if($exist){
      if($req->Password){
        DB::table(self::TABLE)
        ->where("id" , $id)
        ->update([
            "password" => MD5($req->password)
        ]);
      }
      DB::table(self::TABLE)
      ->where("id" , $id)
      ->update([
          "username" => $req->username,
          "nama" => $req->nama
      ]);
      
    }else{
      DB::table(self::TABLE)
      ->insert([
          "username" => $req->username,
          "password" => MD5($req->password),
          "nama" => $req->nama
      ]);
    }
  }

  public static function getUser4Select2()
  {
    return DB::table(self::TABLE)->select('*', 'id as id', 'nama as text')->get();
  }

  //laporan teknisi
}
