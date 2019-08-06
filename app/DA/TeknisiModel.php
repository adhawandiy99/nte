<?php

namespace App\DA;

use Illuminate\Support\Facades\DB;

class TeknisiModel
{
	const TABLE = 'teknisi';
  public static function login($user, $pass){
    return DB::select('
    SELECT *
    FROM teknisi
    WHERE Username = ? AND Password = MD5(?)', [$user, $pass]);
  }
  public static function getUserById($id)
  {
    return DB::table(self::TABLE)->where('ID_Sistem', $id)->first();
  }
  public static function getAll()
  {
    return DB::table(self::TABLE)->get();
  }
  public static function delete($id)
  {
    return DB::table(self::TABLE)->where('ID_Sistem', $id)->delete();
  }
  public static function insertOrUpdate($id, $req)
  {
    $exist = self::getUserById($id);
    if($exist){
      if($req->Password){
        DB::table(self::TABLE)
        ->where("ID_Sistem" , $id)
        ->update([
            "Password" => MD5($req->Password)
        ]);
      }
      DB::table(self::TABLE)
      ->where("ID_Sys" , $id)
      ->update([
          "Username" => $req->Username,
          "Nama" => $req->Nama,
          "Level" => $req->Level
      ]);
      
    }else{
      DB::table(self::TABLE)
      ->insert([
          "Username" => $req->Username,
          "Password" => MD5($req->Password),
          "Nama" => $req->Nama,
          "Level" => $req->Level
      ]);
    }
  }

  public static function getUser4Select2()
  {
    return DB::table(self::TABLE)->select('*', 'ID_Sistem as id', 'Nama as text')->get();
  }
}
