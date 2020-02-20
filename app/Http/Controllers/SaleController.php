<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sale;
use Yajra\DataTables\DataTables;
use App\Exports\ExportSales;
use PDF;
use Excel;
use App\Imports\ImportSales;
class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales=Sale::all();
        return view('sale.index');
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
            'nama'=>'required',
            'alamat'=>'required',
            'email'=>'required',
            'telepon'=>'required',
        ]);
        Sale::create($request->all());
        return response()->json([
            'success'=>true,
            'message'=>'Sale telah dibuat'
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
        $sales=Sale::find($id);
        return $sales;
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
        $sales=Sale::findOrFail($id);
        $sales->update($request->all());
        return response()->json([
            'success'=>true,
            'message'=>'Sale telah diupdate'
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
        Sale::destroy($id);
        return response()->json([
            'success'=> true,
            'message'=>'Sale telah berhasil dihapus'
        ]);
    }
    public function apiSales()
    {
        $sales=Sale::all();

        return DataTables::of($sales)
            ->addColumn('action',function($sales){
                return'<a href="#" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-eye-open"></i> Tampil</a> ' . '<a onclick="editForm('. $sales->id .')" class="btn btn-primary btn-xs"> <i class="glyphicon glyphicon-edit"></i> Ubah</a> ' . '<a onclick="deleteData('. $sales->id .')" class="btn btn-danger btn-xs"> <i class="glyphicon glyphicon-trash"></i> Hapus</a>';
            })
            ->rawColumns(['action'])->make(true);
    }
    public function exportExcel()
    {
        return (new ExportSales)->download('sales.xlsx');
    }
    public function exportpdf()
    {
        $sales=Sale::all();
        $pdf=PDF::loadview('sale.salesallpdf',compact('sales'));
        return $pdf->download('sales.pdf');
    }
    public function importexcel(Request $request)
    {
        $this->validate($request,[
            'file'=>'required|mimes:xls,xlsx'
        ]);
        if($request->hasFile('file')){
            $file=$request->file('file');
            Excel::import(new ImportSales,$file);
            return redirect()->back()->with(['success'=>'Upload File Berhasil']);

        }
        return redirect()->back()->with(['error'=>'Tolong Pilih File Terlebih Dahulu']);
    }
}
