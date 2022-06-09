<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Customer;
use App\Models\Databook;
use App\Models\Income;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function home()
    {
    	return view('user.index');
    }

    public function about()
    {
    	return view('user.about', ['nama' => 'User!']);
    }

    public function customer(Customer $customer)
    {
    	$customer = Customer::all()->sortByDesc('created_at');
        return view('user.customer', compact('customer'));
    }

    public function databook(Databook $databook, Income $income)
    {
    	$databook = Databook::all()->sortByDesc('created_at');
    	$income = Income::all();
        return view('user.databook', compact('income', 'databook'));
    }

    public function customer_search(Customer $customer)
    {
    	$search_text = $_GET['search'];
        $search_db = Customer::where('nama', 'LIKE', '%'.$search_text.'%')->orWhere('email', 'LIKE', '%'.$search_text.'%')->orWhere('no_telp', 'LIKE', '%'.$search_text.'%')->orWhere('alamat', 'LIKE', '%'.$search_text.'%')->get();
        $customer = $search_db->sortByDesc('created_at');
            
        return view('user.search-customer', compact('customer'));
    }

    public function databook_search(Databook $databook, Income $income)
    {
    	$search_text = $_GET['search'];
        $search_db = Databook::where('nama', 'LIKE', '%'.$search_text.'%')->orWhere('penulis', 'LIKE', '%'.$search_text.'%')->orWhere('stok', 'LIKE', '%'.$search_text.'%')->orWhere('harga', 'LIKE', '%'.$search_text.'%')->get();
        $databook = $search_db->sortByDesc('created_at');
            
        return view('user.search-databook', compact('income', 'databook'));
    }

    public function databook_beli(Databook $databook, Income $income)
    {
    	$income = Income::all()->sortByDesc('created_at');
    	return view('user.beli-databook', compact('databook'), compact('income'));
    }

    public function beli(Income $income, Databook $databook, Request $request)
    {
    	$request->validate([
            'stok' => 'required',
            'harga' => 'required',
            'income' => 'required'
        ]);
        Databook::where('id', $databook->id)
                ->update([
                    'stok' => (($databook->stok)-($request->stok)),
                ]);
        Income::where('id', 1)
                ->update([
                     'cash' => ($request->income+(($request->stok)*($databook->harga)))
                ]);

    	return redirect('/user/databook')->with('update', 'Buku Telah Terbeli!');
    }
}
