<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
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
    public function index(User $user)
    {
        // $customer = DB::table('customers')->get();
        $user = User::all()->sortByDesc('created_at');
        return view('user', compact('user'));
    } 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function register_user()
    {
        return view('register-user');
    }

    public function register_admin()
    {
        return view('register-admin');
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
            'name' => 'required',
            'grade' => 'required',
            'nis' => 'required',
            'level' => 'required',
            'email' => 'required',
            'alamat' => 'required',
            'password' => 'required'
        ]);

        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'grade' => $request['grade'],
            'nis' => $request['nis'],
            'level' => $request['level'],
            'alamat' => $request['alamat'],
            'password' => Hash::make($request['password']),
        ]);

        return redirect('users/')->with('add', 'Data User Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('user', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, User $user)
    { 
        User::where('id', $user->id)
                ->update([
                    'level' => $request->level
                ]);
        return redirect('/users')->with('update', 'Data User Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        User::destroy($user->id);
        return redirect('/users')->with('delete', 'Data User Berhasil Dihapus!');
    }

    public function search(User $user)
    {
        $search_text = $_GET['search'];
        $search_db = User::where('name', 'LIKE', '%'.$search_text.'%')->orWhere('level', 'LIKE', '%'.$search_text.'%')->orWhere('grade', 'LIKE', '%'.$search_text.'%')->orWhere('nis', 'LIKE', '%'.$search_text.'%')->orWhere('email', 'LIKE', '%'.$search_text.'%')->orWhere('alamat', 'LIKE', '%'.$search_text.'%')->get();
        $user = $search_db->sortByDesc('created_at');
            
        return view('search-user', compact('user'));
    }

}
