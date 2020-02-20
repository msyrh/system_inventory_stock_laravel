<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductMasuk;
use App\Product;
use App\Supplier;
use App\Category;
use Yajra\DataTables\DataTables;
use App\Exports\ExportProductmasuks;
use PDF;


class ProductMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::orderBy('nama','ASC')->get()->pluck('nama','id');
        $suppliers=Supplier::orderBy('nama','ASC')->get()->pluck('nama','id');
        $invoice_data=ProductMasuk::all();
        return view('produk_masuk.index',compact('products','suppliers','invoice_data'));
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
            'supplier_id'=>'required',
            'qty'=>'required',
            'tanggal'=>'required'

        ]);
        ProductMasuk::create($request->all());
        $product=Product::findOrFail($request->product_id);
        $product->qty += $request->qty;
        $product->save();

        return response()->json([
            'success'=>true,
            'message'=>'Product Masuk berhasil disimpan'
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
        $productmasuk=ProductMasuk::find($id);

        return $productmasuk;
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
            'supplier_id'=>'required',
            'qty'=>'required',
            'tanggal'=>'required'
        ]);
        $productmasuk=ProductMasuk::findOrFail($id);
        $productmasuk->update($request->all());
        $product=Product::findOrFail($request->product_id);
        $product->qty += $request->qty;
        $product->update();

        return response()->json([
            'success'=>true,
            'message'=>'Data Produk masuk berhasil diupdate'
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
        ProductMasuk::destroy($id);

        return response()->json([
            'success'=>true,
            'message'=>'Data produk masuk berhasil dihapus'
        ]);
    }
    public function apiProductMasuk()
    {
        $product =ProductMasuk::all();
        
        return DataTables::of($product)
            ->addColumn('product_name', function($product){
                return $product->product->nama;
            })   
            ->addColumn('supplier_name',function($product){
                return $product->supplier->nama;
            })
            ->addColumn('action', function($product){
                return '<a href="#" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-eye-open"></i> Tampil</a> ' .
                    '<a onclick="editForm('. $product->id .')" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i> Ubah</a> ' .
                    '<a onclick="deleteData('. $product->id .')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> Hapus</a> ';
            })
            ->rawColumns(['product_name','supplier_name','action'])->make(true);
    }
    public function exportExcel()
    {
        return (new ExportProductmasuks())->download('produk_masuk.xlsx');
    }
    public function exportpdf()
    {
        $produkmasuks=ProductMasuk::all();
        $pdf=PDF::loadview('produk_masuk.produk_masuksallpdf',compact('produkmasuks'));
        return $pdf->download('produk_masuk.pdf');
    }
    public function exportpdfinvoice($id)
    {
        $produkmasuks=ProductMasuk::find($id);
        $jml=$produkmasuks->qty;
        $rego=$produkmasuks->product->harga;
        $produkmasuks['total'] = $jml* $rego;
        $pdf=PDF::loadview('produk_masuk.invoicepdf',compact('produkmasuks'));
        return $pdf->download($produkmasuks->id.'_invoice_produkmasuk.pdf');
    }
}
