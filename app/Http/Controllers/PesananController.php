<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\barang;
use Illuminate\Support\Facades\File;
use App\Models\pesanan;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public $pesanan;
    // membuat instance dari model pesanan
    public function __construct()
    {
       $this->pesanan = new Pesanan;
       
    }

    public function index()
    {
        //
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
        //
        //tangkap request user
        
    
        //ubah nama file yang akan disimpan kedalam DB$namaFile = time() . rand(100, 999) . "." . $nm->getClientOriginalExtension();
        
        $this->pesanan->nama = $request->nama;
        $this->pesanan->email = $request->email;
        $this->pesanan->alamat = $request->alamat;
        // $this->pesanan->total = $request->nameHarga;
        // $this->pesanan->status =

        //simpan file gambar ke direktori upload yang ada didalam public
        
        
        // simpan data menggunakan method save()
        $this->pesanan->save();
        
        // redirect halaman serta kirimkan pesan berhasil
        return redirect()->route('indexAdmin');
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
