<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductKeluar;
use Yajra\DataTables\DataTables;
use App\Customer;
use App\Product;
use App\Category;
use App\Exports\ExportProductKeluars;
use PDF;

class ProductKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::orderBy('nama','ASC')->get()->pluck('nama','id');
        $customers=Customer::orderBy('nama','ASC')->get()->pluck('nama','id');
        $invoice_data=ProductKeluar::all();
        return view('produk_keluar.index',compact('products','customers','invoice_data'));
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
            'product_id'=>'required',
            'customer_id'=>'required',
            'qty'=>'required',
            'tanggal'=>'required'
        ]);
        ProductKeluar::create($request->all());
        $product=Product::findOrfail($request->product_id);
        $product->qty-=$request->qty;
        $product->save();

        return response()->json([
            'success'=>true,
            'message'=>'product keluar berhasil disimpan'
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
        $product_keluar=ProductKeluar::find($id);
        return $product_keluar;
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
            'product_id'=>'required',
            'customer_id'=>'required',
            'qty'=>'required',
            'tanggal'=>'required'
        ]);
        $product_keluar=ProduckKeluar::findOrFail($id);
        $product_keluar->update($request->all());

        $product=Product::findOrFail($request->product_id);
        $product->qty -= $request->qty;
        $product->update();

        return response()->json([
            'success'=> true,
            'message'=>'Product Keluar Berhasil diupdate'
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
        ProductKeluar::destroy($id);

        return response()->json([
            'success'=> true,
            'message'=> 'data product keluar berhasil dihapus'
        ]);
        
    }
    public function apiProductKeluars()
    {
        $product_keluar=ProductKeluar::all();

        return DataTables::of($product_keluar)
            ->addColumn('product_name',function($product_keluar){
                return $product_keluar->product->nama;
            })
            ->addColumn('customer_name',function($product_keluar){
                return $product_keluar->customer->nama;
            })
            ->addColumn('action',function($product_keluar){
            return '<a href="#" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-eye-open"></i> Tampil</a> ' . '<a onclick="editForm('.$product_keluar->id.')" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i> Ubah</a> ' . '<a onclick="deleteData('.$product_keluar->id.')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> Hapus</a>';
            })
            ->rawColumns(['product_name','customer_name','action'])->make(true);
            
    }
    public function exportExcel()
    {
        return (new ExportProductKeluars())->download('produk_keluars.xlsx');
    }
    public function exportpdf()
    {
        $produkkeluars=ProductKeluar::all();
        $pdf=PDF::loadview('produk_keluar.produk_keluarsallpdf',compact('produkkeluars'));
        return $pdf->download('produk_keluars.pdf');
    }
    public function exportpdfinvoice($id)
    {
        $produkkeluars=ProductKeluar::find($id);
        $jml=$produkkeluars->qty;
        $rego=$produkkeluars->product->harga;
        $produkkeluars['total']=$jml*$rego;
        $pdf=PDF::loadview('produk_keluar.invoicepdf',compact('produkkeluars'));
        return $pdf->download($produkkeluars->id.'_invoice_produkkeluar.pdf');
    } 
}
