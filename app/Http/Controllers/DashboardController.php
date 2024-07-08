<?php

namespace App\Http\Controllers;

use DB;
use app\Katalog;
use App\Models\Book;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $total_buku = Book::count();
        return view('admin.dashboard', compact('total_buku'));
    }
}   