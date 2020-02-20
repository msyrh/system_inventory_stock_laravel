<?php

namespace App\Imports;

use App\Product;
use App\Category;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ImportProducts implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        
        return new Product([
            'category_id'   =>$row['kategori'],
            'nama'          =>$row['nama'],
            'harga'         =>$row['harga'],
            'image'         =>"",
            'qty'           =>$row['qty'],

        ]);
    }
}
