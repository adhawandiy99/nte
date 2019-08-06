<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\DA\OrderModel;
use App\DA\MaterialModel;
use PDF;

class ReportController extends Controller
{
	public function index(){
		$data = OrderModel::getAll();
		return view('report.report1', compact('data'));
	}
	public function rekapMaterial(){
		$data = MaterialModel::getReport();
		return view('report.report2', compact('data'));
	}
	public function pdf($id){
		$data = OrderModel::getOrderById($id);
		$mtr = MaterialModel::getMaterialByOrderId($id);
		$pdf = PDF::loadView('report.pdf', compact('data', 'mtr'));
		return $pdf->download('report-'.date('Ymd').'.pdf');
	}
}
