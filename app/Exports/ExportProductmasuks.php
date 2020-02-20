<?php

namespace App\Exports;

use App\ProductMasuk;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;

class ExportProductmasuks implements FromView
{
    use Exportable;
    public function view(): view
    {
        return view('produk_masuk.produk_masuksallexcel',['produkmasuks'=>ProductMasuk::all()]);
    }
}
