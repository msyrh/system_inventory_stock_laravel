<?php

namespace App\Exports;

use App\Category;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;

class ExportCategories implements FromView
{
    
    use Exportable;

    public function view(): View
    {
        // TODO: Implement view() method.
        return view('categories.categoriesallexcel',[
            'categories' => Category::all()
        ]);
    }
}
