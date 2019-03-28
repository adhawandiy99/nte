<?php

namespace App\DA;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class UploadModel implements ToModel
{
	public function model(array $row){
		return [
            'sn' => $row['0'],
            'jenis_nte' => $row['1'],
            'merk' => $row['2'],
            'model' => $row['3']
        ];
	}
}
