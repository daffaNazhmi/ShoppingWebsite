<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\barang;
use App\Models\kategori;
use Illuminate\Support\Facades\File;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $query = DB::table('barang')->join('kategori','barang.kategori_id','=','kategori.id')
        ->select('barang.*','kategori.*')->get();
        return view ('admin.index', compact('query'));
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

    public $barang;
    // membuat instance dari model barang
    public function __construct()
    {
       $this->barang = new Barang;
       
    }

    public function nambah(){
        $query = barang::all();
        
        return view('crud.tambahBarang', compact('query'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //tangkap request user
        $nm = $request->nameGambar;
    
        //ubah nama file yang akan disimpan kedalam DB
        $namaFile = time() . rand(100, 999) . "." . $nm->getClientOriginalExtension();
        
        $this->barang->nama_barang = $request->nameNamaBarang;
        $this->barang->kategori_id = $request->nameKategoriId;
        $this->barang->stok = $request->nameStok;
        $this->barang->harga = $request->nameHarga;
        $this->barang->foto = $namaFile;

        //simpan file gambar ke direktori upload yang ada didalam public
        $nm->move(public_path() . '/upload', $namaFile);
        
        // simpan data menggunakan method save()
        $this->barang->save();
        
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
        $hapus = Barang::findOrFail($id);

        $path = 'upload/' . $hapus->gambar;

        if(File::exists(($path)))
        {
            File::delete($path);
        }
        
        $hapus->delete();

        return redirect()->route('indexAdmin');

    }
}
