<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Excel;
use DB;
class SearchController extends Controller
{
  public function item(Request $req){
    $data = DB::table('tbl_nte')
      ->select('tbl_nte.*', 'tbl_do.tgl_terima', 'tbl_pengeluaran.tgl_keluar')
      ->leftJoin('tbl_do', 'tbl_nte.do_id','=','tbl_do.id')
      ->leftJoin('tbl_pengeluaran', 'tbl_nte.pengeluaran_id','=','tbl_pengeluaran.id')
      ->where('sn', $req->q)->first();
    return view('info.item', compact('data'));
  }
  public function do(Request $req){
    $data = DB::table('tbl_do')->where('nomor_do', $req->q)->first();
    $nte = DB::table('tbl_nte')
      ->where('do_id', @$data->id)->get();
    return view('info.do', compact('data', 'nte'));
  }
  public function pengeluaran(Request $req){
    $data = DB::table('tbl_pengeluaran')->whereRaw('tgl_keluar between "'.$req->start.'" and "'.$req->end.'"')->get();
    return view('info.pengeluaran', compact('data'));
  }
  public function stok(){
    $data = DB::select("SELECT model, (select count(*) from tbl_nte tn where model = tn.model and status='In Warehouse') as stok FROM tbl_nte GROUP BY model ORDER BY model");
    return view('info.stok', compact('data'));
  }
}
