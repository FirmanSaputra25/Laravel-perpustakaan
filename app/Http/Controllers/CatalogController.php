<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use Illuminate\Http\Request;



class CatalogController extends Controller
{

      public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
          $catalogs = Catalog::with ('books')->get();
        return view('admin.catalog.index', compact('catalogs'));
    }
    public function api()
    {
      $catalogs = Catalog::all();
      $datatables = datatables()->of($catalogs)->addIndexColumn();

      return $datatables->make(true);
    }


    /**
     * Show the form for creating a new resource.
     */
    
    public function create()
    {
        // return view ('admin.Catalog.create');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request ,[
            'name'=>['required'],
            'jumlah_book'=>['required'],
        ]);
        Catalog::create(['name'=>$request->name, 'jumlah_book'=>$request->jumlah_book]);
        return redirect('catalogs');
        // Catalog::create ($request->all());
        // dd($request->all());
        // Catalog::create($request->all());
    }
    /**
     * Display the specified resource.
     */
    public function show(Catalog $catalog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Catalog $catalog)
    { 
        return view('admin.catalog.edit' , compact('catalog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Catalog $catalog)
    {
         $this->validate($request ,[
            'name'=>['required'],
            'jumlah_book' => ['required', 'jumlah_book'],
          
        ]);
    
        $catalog->update ($request->all());
         return redirect('catalogs');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Catalog $catalog)
    {
        $catalog->delete(); 
        return redirect('catalogs');
    }
}
