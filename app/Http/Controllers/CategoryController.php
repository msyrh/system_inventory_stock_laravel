<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\Datatables;
use App\Exports\ExportCategories;
use App\Imports\ImportCategories;
use PDF;
use Excel;

class CategoryController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('role:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('categories.index');
        #return $categories;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(request $request)
    {
        $categories=new Category;
        $categories->name=$request->name;
        $categories->save();
        return response()->json([
            'success'=>true,
            'message'=>'Categories Created'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,['name'=>'required|string|min:2']);
        Category::create($request->all());
        return response()->json([
            'success'=>true,
            'message'=>'Categories Stored'
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
        $category=Category::find($id);
        return $category;
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
            'name'=>'required|string|min:2'
        ]);

        $category = Category::find($id);

        $category->update($request->all());

        return "data berhasil diupdate";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::destroy($id);
        return response()->json([
            'success'    => true,
            'message'    => 'Categories Update'
        ]);
    }
    public function apiCategories()
    {
        $categories = Category::all();

        return Datatables::of($categories)
            ->addColumn('action', function($categories){
                return '<a href="#" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-eye-open"></i> Tampil</a> ' .
                    '<a onclick="editForm('. $categories->id .')" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i> Ubah</a> ' .
                    '<a onclick="deleteData('. $categories->id .')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> Hapus</a>';
            })
            ->rawColumns(['action'])->make(true);
    }
    public function exportExcel()
    {
        return (new ExportCategories())->download('categories.xlsx');
    }
    public function exportpdf()
    {
        $categories =Category::all();
        $pdf = PDF::loadview('categories.categoriesallpdf',compact('categories'));
        return $pdf->download('categories.pdf');
    }
    public function importexcel(Request $request)
    {
        $this->validate($request,[
            'file'=>'required|mimes:xls,xlsx'
        ]);
        if($request->hasFile('file')){
            $file = $request->file('file');
            Excel::import(new ImportCategories,$file);
            return redirect()->back()->with(['success'=>'Upload file data Category berhasil']);
        }
        return redirect()->back()->with(['error'=>'Tolong pilih file dahulu !']);
    }
}
