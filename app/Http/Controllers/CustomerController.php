<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Customer;

class CustomerController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Customer $customer)
    {
        // $customer = DB::table('customers')->get();
        $customer = Customer::all()->sortByDesc('created_at');
        return view('customer', compact('customer'));
    } 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $data = new Customer;
        // $data->nama = $request->nama;
        // $data->email = $request->email;
        // $data->no_telp = $request->no_telp;
        // $data->alamat = $request->alamat;
        // $data->save();

        // Customer::create([
        //     'nama' => $request->nama,
        //     'email' => $request->email,
        //     'no_telp' => $request->no_telp,
        //     'alamat' => $request->alamat
        // ]);

        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'no_telp' => 'required|max:14',
            'alamat' => 'required'
        ]);

        Customer::create($request->all());
        return redirect('/customer')->with('add', 'Data Customer Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        return view('/customer', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        return view('edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $ids
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'no_telp' => 'required|max:14',
            'alamat' => 'required'
        ]);   
        Customer::where('id', $customer->id)
                ->update([
                    'nama' => $request->nama,
                    'email' => $request->email,
                    'no_telp' => $request->no_telp,
                    'alamat' => $request->alamat
                ]);
        return redirect('/customer')->with('update', 'Data Customer Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        Customer::destroy($customer->id);
        return redirect('/customer')->with('delete', 'Data Customer Berhasil Dihapus!');
    }

    public function search(Customer $customer)
    {
        $search_text = $_GET['search'];
        $search_db = Customer::where('nama', 'LIKE', '%'.$search_text.'%')->orWhere('email', 'LIKE', '%'.$search_text.'%')->orWhere('no_telp', 'LIKE', '%'.$search_text.'%')->orWhere('alamat', 'LIKE', '%'.$search_text.'%')->get();
        $customer = $search_db->sortByDesc('created_at');
            
        return view('search', compact('customer'));
    }

}
