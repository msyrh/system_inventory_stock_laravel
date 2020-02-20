<?php

namespace App\Imports;

use App\Supplier;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ImportSuppliers implements ToModel,WithHeadingRow
{
    
    public function model(array $row)
    {
        return new Supplier([
            'nama'=>$row['nama'],
            'alamat'=>$row['alamat'],
            'email'=>$row['email'],
            'telepon'=>$row['telepon'],
        ]);
    }
}
