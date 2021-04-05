<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Users;
class DataPetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $data['user'] =  AUTH::user();
         $data['title'] = 'Data Petugas';
         $data['sub_menu'] = '0';

         $data['data'] =  Users::where('user_role_id', 5)->get();
        return view('admin.data_petugas', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Users;

        $data->nik = $request->nik;
        $data->name = $request->nama;
        $data->email = $request->email;
        $data->telepon = $request->telepon;
        $data->password = Hash::make($request->password);
        $data->user_role_id = 5;

        $data->save();
        $request->session()->flash('warna', 'success');
        $request->session()->flash('status', 'Data berhasil dibuat!');
      
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Users::where('id', $id)
        ->update(['nik' => $request->nik, 'name' => $request->nama, 'email' => $request->email, 'telepon' => $request->telepon]);
  
      $request->session()->flash('warna', 'success');
      $request->session()->flash('status', 'Data berhasil diedit!');
    
      return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Users::where('id', $id)->delete();
        $request->session()->flash('warna', 'success');
        $request->session()->flash('status', 'Data berhasil dihapus!');
      
        return redirect()->back();
    }
}
