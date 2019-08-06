<?php

namespace App\DA;

use Illuminate\Support\Facades\DB;

class OrderModel
{
	const TABLE = 'master_order';
	public static function getOrderById($id)
  {
    return DB::table(self::TABLE)->select(self::TABLE.'.*', 'Teknisi.Nama')->leftJoin('Teknisi', self::TABLE.'.Teknisi_ID', '=', 'Teknisi.ID_Sistem')->where(self::TABLE.'.ID_Sistem', $id)->first();
  }
  public static function getAll()
  {
    return DB::table(self::TABLE)->leftJoin('Teknisi', self::TABLE.'.Teknisi_ID', '=', 'Teknisi.ID_Sistem')->get();
  }
  public static function delete($id)
  {
    return DB::table(self::TABLE)->where('ID_Sistem', $id)->delete();
  }
  public static function insertOrUpdate($id, $req)
  {
    $exist = self::getOrderById($id);
    if($exist){
      DB::table(self::TABLE)
      ->where("ID_Sistem" , $id)
      ->update([
          "No_Tiket" 	=> $req->No_Tiket,
          "Headline" 	=> $req->Headline,
          "PIC"	 			=> $req->PIC,
          "Alamat" 		=> $req->Alamat,
          "Wilayah" 	=> $req->Wilayah,
          "Teknisi_ID"=> $req->Teknisi_ID
      ]);
    }else{
      DB::table(self::TABLE)
      ->insert([
          "No_Tiket" 	=> $req->No_Tiket,
          "Headline" 	=> $req->Headline,
          "PIC"	 			=> $req->PIC,
          "Alamat" 		=> $req->Alamat,
          "Wilayah" 	=> $req->Wilayah,
          "Teknisi_ID"=> $req->Teknisi_ID
      ]);
    }
  }
  public static function inbox($id)
  {
    return DB::table(self::TABLE)->select(self::TABLE.'.*')->leftJoin('Teknisi', self::TABLE.'.Teknisi_ID', '=', 'Teknisi.ID_Sistem')->where('Teknisi.ID_Sistem', $id)->get();
  }
}
