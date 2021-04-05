<?php

namespace App\Http\Controllers\masyarakat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengaduan;
use Illuminate\Support\Facades\Auth;
class PengaduanMController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['user'] =  AUTH::user();
        $data['title'] = 'Pengaduan';
        $data['sub_menu'] = '0';

        $data['data'] = Pengaduan::where('users_id', AUTH::user()->id)->get();
       return view('masyarakat.pengaduan', $data);
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
        
        
        $file = $request->file('media');
        if($file){
        $tujuan_upload = 'img/media';

        $namafile = time().'-'.$file->getClientOriginalName();
        $file->move($tujuan_upload,$namafile);
        }else{
            $namafile = NULL;
        }
        $Data = new Pengaduan;

        $Data->isi_laporan = $request->isi;
        $Data->media = $namafile;
        $Data->users_id = AUTH::user()->id;
        $Data->status = "Menunggu Tanggapan";

        $Data->save();
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
        Pengaduan::where('id', $id)->delete();
        return redirect()->back();
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
