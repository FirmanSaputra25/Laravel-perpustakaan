<?php

namespace App\Http\Controllers;

use App\Models\Transcation;
use App\Models\TransactionDetail;
use App\Models\Member;
use App\Models\Book;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class TranscationController extends Controller
{
    // Show a list of transactions
    public function index()
    {
        
        $transcactions = Transcation::with('member')->get();
        $members = Member::with('transcation.transcationDetail.books')->get();
        // dd($members); // Fetch transactions with associated members
        // $members = Member::all(); // Fetch all members
        $books = Book::all(); // Ambil semua data buku
        // $transcactionsDetail = TranscationDetail::with('member')->get();
        return view('admin.transcation.index', compact('members','books' ,'transcactions'));
    }

    // Show the form for creating a new transaction
    public function create()
    {
        $members = Member::all(); // Fetch all members
        return view('admin.transcation.create', compact('members')); // Pass members to the view
    }

    // Store a newly created transaction in storage
    public function store(Request $request)
    {
        $request->validate([
            'member_id' => 'required|exists:members,id',
            'date_start' => 'required|date',
            'date_end' => 'required|date',
        ]);

        Transcation::create([
            'member_id' => $request->member_id,
            'date_start' => $request->date_start,
            'date_end' => $request->date_end,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        return redirect()->route('transcactions.index')->with('success', 'Data berhasil disimpan.'); // Redirect with success message
    }

    // Display the specified transaction
    public function show(Transcation $transcation)
    {
        return view('admin.transcation.show', compact('transcation')); // Show the transaction details
    }

    // Show the form for editing the specified transaction
    public function edit(Transcation $transcation)
    {
        $members = Member::all(); // Fetch all members
        return view('admin.transcation.edit', compact('transcation', 'members')); // Pass transaction and members to the view
    }

    // Update the specified transaction in storage
    public function update(Request $request, $id)
    {
        $request->validate([
            'member_id' => 'required|exists:members,id',
            'date_start' => 'required|date',
            'date_end' => 'required|date|after_or_equal:date_start', // Pastikan tanggal akhir setelah atau sama dengan tanggal mulai
            'book_id' => 'required|exists:books,id',
        ]);
    
        // Lanjutkan dengan penyimpanan data
        $transcation = Transcation::findOrFail($id);
        $transcation->update($request->all());
    
        return redirect()->route('transcations.index')->with('success', 'Transcation updated successfully.');
    }
    

    // Remove the specified transaction from storage
    public function destroy(Transcation $transcation)
    {
        try {
            $transcation->delete(); // Delete the transaction
    
            return redirect()->route('transcactions.index')->with('success', 'Data berhasil dihapus.'); // Redirect with success message
        } catch (\Exception $e) {
            // Handle error if deletion fails
            return redirect()->route('transcactions.index')->with('error', 'Data gagal dihapus.'); // Redirect with error message
        }
    }
}