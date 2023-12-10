<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use App\Models\Publisher;
use App\Models\Catalog;
use App\Models\Member;
use App\Models\Transcation;
use App\Models\TranscationDetail;

use Illuminate\Http\Request;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        // $books = Book::with('author')->get();

        // $data1 = Member::select('*')
        // ->join('users', 'users.member_id' ,'=' ,'members.id')
        // ->get();

        // $data2 = Member::select('*')
        // ->leftJoin('users' , 'users.member_id' ,'=' , 'members.id')
        // ->where('users.id')
        // -> get();

        // $data3 = Transcation::select('members.id' , 'members.name')
        // ->rightJoin('members' , 'member_id', '=', 'transcations.member_id')
        // ->where('transcations.member_id' ,NULL)
        // ->get();

        // $data4 = Member::select('members.id' ,'members.name' , 'members.phone_number')
        // ->join ('transcations' , 'transcations.member_id', '=', 'members.id')
        // ->orderBy('members.id' , 'asc')
        // ->get();

        // $data5 = Member::select('members.id' ,'members.name' , 'members.phone_number')
        // ->join ('transcations' , 'transcations.member_id', '=', 'members.id')
        // ->orderBy('members.id' , 'desc')
        // ->get();

        // $data6 = Member::select('members.id' , 'members.name' , 'members.phone_number' , 'members.address', 'transcations.date_start' , 'transcations.date_end')
        // ->join('transcations' , 'transcations.member_id' ,'=' ,'members.id')
        // ->get();

        // $data7 = Member::select('members.id' , 'members.name' , 'members.phone_number' , 'members.address', 'transcations.date_start' , 'transcations.date_end')
        // ->join('transcations' , 'transcations.member_id' ,'=' ,'members.id')
        // ->where('transcations.member_id' ,"LIKE" , "%18")
        // ->get();

        // $data8 = Member::select('members.id' , 'members.name' , 'members.phone_number' , 'members.address', 'transcations.date_start' , 'transcations.date_end')
        // ->join('transcations' , 'transcations.member_id' ,'=' ,'members.id')
        // ->where('transcations.member_id' ,"LIKE" , "%enrique")
        // ->get();

        // $data9 = Member::select('members.id' , 'members.name' , 'members.phone_number' , 'members.address', 'transcations.date_start' , 'transcations.date_end')
        // ->join('transcations' , 'transcations.member_id' ,'=' ,'members.id')
        // ->where('members.address' ,"LIKE" , "%wilma")
        // ->get();

        // $data10 = Member::select('members.id' , 'members.name' , 'members.phone_number' , 'members.address', 'transcations.date_start' , 'transcations.date_end')
        // ->join('transcations' , 'transcations.member_id' ,'=' ,'members.id')
        // ->where('members.gender' ,"LIKE" , "%p")
        // ->get();
        


        // return $data10;
        return view('home');
    }
}
