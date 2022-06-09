<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Databook;

class DataBookController extends Controller
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
    public function index(Databook $databook)
    {
        // $customer = DB::table('customers')->get();
        $databook = Databook::all()->sortByDesc('created_at');
        return view('databook', compact('databook'));
    } 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create-databook');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'nama' => 'required',
            'penulis' => 'required',
            'stok' => 'required',
            'harga' => 'required'
        ]);

        Databook::create($request->all());
        return redirect('/databook')->with('add', 'Data Buku Berhasil Ditambahkan!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Databook $databook)
    {
        return view('/databook', compact('databook'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Databook $databook)
    {
        return view('edit-databook', compact('databook'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $ids
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Databook $databook)
    {
        $request->validate([
            'nama' => 'required',
            'penulis' => 'required',
            'stok' => 'required',
            'harga' => 'required'
        ]);   
        Databook::where('id', $databook->id)
                ->update([
                    'nama' => $request->nama,
                    'penulis' => $request->penulis,
                    'stok' => $request->stok,
                    'harga' => $request->harga
                ]);
        return redirect('/databook')->with('update', 'Data Buku Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Databook $databook)
    {
        Databook::destroy($databook->id);
        return redirect('/databook')->with('delete', 'Data Buku Berhasil Dihapus!');
    }

    public function search(Databook $databook)
    {
        $search_text = $_GET['search'];
        $search_db = Databook::where('nama', 'LIKE', '%'.$search_text.'%')->orWhere('penulis', 'LIKE', '%'.$search_text.'%')->orWhere('stok', 'LIKE', '%'.$search_text.'%')->orWhere('harga', 'LIKE', '%'.$search_text.'%')->get();
        $databook = $search_db->sortByDesc('created_at');
            
        return view('search-databook', compact('databook'));
    }

}
