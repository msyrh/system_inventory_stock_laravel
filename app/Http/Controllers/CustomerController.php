<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use Yajra\DataTables\DataTables;
use Illuminate\Validation\Rule;
use App\Exports\ExportCustomers;
use App\Imports\ImportCustomers;
use PDF;
use Excel;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::all();
        return view('customer.index');
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
        $this->validate($request, [
            'nama'      => 'required',
            'alamat'    => 'required',
            'email'     => 'required|unique:customers',
            'telepon'   => 'required',
        ]);

        Customer::create($request->all());

        return response()->json([
            'success'    => true,
            'message'    => 'Customer Created'
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
        $customer = Customer::find($id);
        return $customer;
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
        $this->validate($request, [
            'nama'      => 'required|string|min:2',
            'alamat'    => 'required|string|min:2',
            'email'     => 'required|string|email|max:255|',
            'telepon'   => 'required|string|min:2',
        ]);

        $customer = Customer::find($id);

        $customer->update($request->all());

        return response()->json([
            'success'    => true,
            'message'    => 'Customer Updated'
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
        Customer::destroy($id);

        return response()->json([
            'success'    => true,
            'message'    => 'Customer Delete'
        ]);
    }

    public function apiCustomers()
    {
        $customer = Customer::all();

        return Datatables::of($customer)
            ->addColumn('action', function($customer){
                return '<a href="#" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-eye-open"></i> Tampil</a> ' .
                    '<a onclick="editForm('. $customer->id .')" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i> Ubah</a> ' .
                    '<a onclick="deleteData('. $customer->id .')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> Hapus</a>';
            })
            ->rawColumns(['action'])->make(true);
    }
    public function exportExcel()
    {
        return (new ExportCustomers())->download('customers.xlsx');
    }
    public function exportpdf()
    {
        $customers=Customer::all();
        $pdf=PDF::loadview('customer.customersallpdf',compact('customers'));
        return $pdf->download('customers.pdf');
    }
    public function importexcel(Request $request)
    {
        $this->validate($request,[
            'file'=>'required|mimes:xls,xlsx',
        ]);
        if ($request->hasFile('file')){
            $file = $request->file('file');
            Excel::import(new ImportCustomers,$file);
            return redirect()->back()->with(['success'=>'Upload File Berhasil']);
        }
        return redirect()->back()->with(['error'=>'Tolong Pilih File']);
    }
}
