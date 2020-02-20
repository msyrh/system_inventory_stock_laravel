<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supplier;
use Yajra\DataTables\DataTables;
use App\Exports\ExportSuppliers;
use PDF;
use Excel;
use App\Imports\ImportSuppliers;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers=Supplier::all();
        return view('supplier.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nama'  =>'required',
            'alamat'=>'required',
            'email' =>'required|unique:suppliers',
            'telepon'=>'required',
        ]);
        Supplier::create($request->all());

        return response()->json([
            'success'=>true,
            'message'=>'Supplier telah dibuat'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $suppliers = Supplier::find($id);
        return $suppliers;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nama'=>'required|string|min:2',
            'alamat'=>'required|string|min:2',
            'email'=>'required|string|max:255',
            'telepon'=>'required|string|min:2',
        ]);

        $supplier=Supplier::findOrFail($id);
        $supplier->update($request->all());
        return response()->json([
            'success'=>'true',
            'mesage'=>'Supplier telah diupdate'
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Supplier::destroy($id);
        return response()->json([
            'success'=> true,
            'message'=>'Supplier telah dihapus'
        ]);
    }
    public function apiSuppliers()
        {
            $suppliers=Supplier::all();

            return Datatables::of($suppliers)->addColumn('action',function($suppliers){
                return '<a href="#" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-eye-open"></i> Tampil</a> ' .
                    '<a onclick="editForm('. $suppliers->id .')" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i> Ubah</a> ' .
                    '<a onclick="deleteData('. $suppliers->id .')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> Hapus</a>';
            })
            ->rawColumns(['action'])->make(true);
        }
    public function exportExcel()
    {
        return (new ExportSuppliers())->download('suppliers.xlsx');
    }
    public function exportpdf()
    {
        $suppliers=Supplier::all();
        $pdf=PDF::loadview('supplier.suppliersallpdf',compact('suppliers'));
        return $pdf->download('suppliers.pdf');
    }
    public function importexcel(Request $request)
    {
        $this->validate($request,[
            'file'=>'required|mimes:xls,xlsx'
        ]);
        if($request->hasFile('file')){
            $file=$request->file('file');
            Excel::import(new ImportSuppliers,$file);
            return redirect()->back()->with(['success'=>'Upload File Berhasil']);
        }
        return redirect()->back()->with(['error'=>'Tolong Pilih File Terlebih Dahulu']);
    }
    
}
