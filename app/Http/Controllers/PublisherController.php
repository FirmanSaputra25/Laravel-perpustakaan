<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use Illuminate\Http\Request;



class PublisherController extends Controller
{

      public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
          $publishers = Publisher::with ('books')->get();
        return view('admin.publisher.index', compact('publishers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    
    public function create()
    {
        // return view ('admin.publisher.create');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $this->validate($request ,[
            'name'=>['required'],
            'phone_number' =>['required'],
            'email' => ['required' , 'email'],
        ]);

        // Publisher::create($request->all());
        Publisher::create(['name'=>$request->name, 'email'=>$request->email, 'phone_number'=>$request->phone_number]);
        // Publisher::create ($request->all());
        return redirect('publishers');
        // dd($request->all());
        // Publisher::create($request->all());
    }
    /**
     * Display the specified resource.
     */
    public function show(Publisher $publisher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Publisher $publisher)
    { 
        return view('admin.publisher.edit' , compact('publisher'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Publisher $publisher)
    {
         $this->validate($request ,[
            'name'=>['required'],
            'email' => ['required', 'email'],
            'phone_number' =>['required'],
        ]);
    
        $publisher->update ($request->all());
         return redirect('publishers');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Publisher $publisher)
    {
        $publisher->delete(); 
        return redirect('publishers');
    }
}
