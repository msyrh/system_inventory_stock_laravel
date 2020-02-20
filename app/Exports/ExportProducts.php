<?php

namespace App\Exports;

use App\Product;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;

class ExportProducts implements FromView
{
    use Exportable;
    public function view(): View
    {
        return view('product.productsallexcel',['products'=>Product::all()]);
    }
}
