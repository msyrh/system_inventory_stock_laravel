<?php

namespace App\Exports;

use App\Sale;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;

class ExportSales implements FromView
{
    use Exportable;
    public function view():View
    {
        return view('sale.salesallexcel',['sales'=>Sale::all()]);
    }
}
