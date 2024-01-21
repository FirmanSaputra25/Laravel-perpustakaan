<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;



class MemberController extends Controller
{

      public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members = Member::all();
        //   $members = Member::with ('users')->get();
        return view('admin.member.index',compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     */
    
    public function create()
    {
        // return view ('admin.member.create');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $this->validate($request ,[
            'name'=>['required'],
            'gender'=>['required'],
            'phone_number' =>['required'],
            'address' =>['required'],
            'email' => ['required' , 'email'],
        ]);

        Member::create($request->all());
        // Member::create(['name'=>$request->name, 'email'=>$request->email, 'phone_number'=>$request->phone_number]);
        // member::create ($request->all());
        return redirect('members');
        // dd($request->all());
        // member::create($request->all());
    }
    /**
     * Display the specified resource.
     */
    public function show(member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Member $member)
    { 
        return view('admin.member.edit' , compact('member'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Member $member)
    {
         $this->validate($request ,[
            'name'=>['required'],
            'gender'=>['required'],
            'phone_number' =>['required'],
            'address'=>['required'],
            'email' => ['required', 'email'],
        ]);
    
        $member->update ($request->all());
         return redirect('members');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Member $member)
    {
        $member->delete(); 
        return redirect('members');
    }
}
