<?php

namespace App\Exports;

use App\Customer;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;


class ExportCustomers implements FromView
{
    use Exportable;

    public function view(): View
    {
        return view('customer.customerallexcel',['customer'=>Customer::all()
        ]);     
    }
}
