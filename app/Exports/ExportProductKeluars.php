<?php

namespace App\Exports;

use App\ProductKeluar;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;

class ExportProductKeluars implements FromView
{
    use Exportable;
    public function view(): view
    {
        return view('produk_keluar.produk_keluarsallexcel',['produkkeluars'=>ProductKeluar::all()]);
    }
}
