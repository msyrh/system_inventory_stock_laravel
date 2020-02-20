<?php

namespace App\Imports;

use App\Sale;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ImportSales implements ToModel,WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        return new Sale([
            'nama'=>$row['nama'],
            'alamat'=>$row['alamat'],
            'email'=>$row['email'],
            'telepon'=>$row['telepon'],
        ]);
    }
}
