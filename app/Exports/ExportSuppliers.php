<?php

namespace App\Exports;

use App\Supplier;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;

class ExportSuppliers implements FromView
{
    use Exportable;
    public function View(): View
    {
        return View('supplier.suppliersallexcel',['suppliers'=>Supplier::all()]);
    }
}
