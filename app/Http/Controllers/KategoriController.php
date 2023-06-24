<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kategori;
use App\Models\barang;
use Illuminate\Support\Facades\DB;


class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $query = kategori::orderByDesc('id')->take(3)->get();
        return view ('admin.indexKategori', compact('query'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function nambah(){
        return view('crud.tambahKategori');
    }

    public function create()
    {
        //
    }

    public $kategori;
    // membuat instance dari model tambah
    public function __construct()
    {
       $this->kategori = new Kategori;
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
        // $rules = [
        //     'nameKategori' => 'required|min:3|max:100|unique:kategoris,kategori',
        //     'nameGambar' => 'required|max:500|mimes:jpg,png,jpeg'
        // ];

        // $messages = [
        //     'unique' => ":attribute sudah tersedia, silakan input lain",
        //     'required' => "kosongkan jika tidak ingin mengubah gambar",
        //     'min' => "isi form nya kurang, min 3 karakter",
        //     'max' => "isi form nya kebanyakan / ukuran file terlalu besar",
        //     'mimes' => "ekstensi file tidak di izinkan"
        // ];
        // $this->validate($request, $rules, $messages);
        
        //tangkap request user
        $nm = $request->nameGambar;
    
        //ubah nama file yang akan disimpan kedalam DB
        $namaFile = time() . rand(100, 999) . "." . $nm->getClientOriginalExtension();

        $this->kategori->nama_kategori = $request->nameKategori;
        $this->kategori->gambar = $namaFile;

        //simpan file gambar ke direktori upload yang ada didalam public
        $nm->move(public_path() . '/upload', $namaFile);

        // simpan data menggunakan method save()
        $this->kategori->save();
        
        // redirect halaman serta kirimkan pesan berhasil
        return redirect()->route('indexKategori')->with('status', 'Data artikel berhasil ditambahkan');
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
        $edit = Kategori::findOrFail($id);

        return view('crud.editKategori', compact('edit'));
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
        $update = Kategori::findOrFail($id);

        //
        // $rules = [
        //     'nameKategori' => 'required|min:3|max:100|unique:kategoris,kategori',
        //     'nameGambar' => 'required|max:500|mimes:jpg,png,jpeg'
        // ];

    
        // $messages = [
        //     'unique' => ":attribute sudah tersedia, silakan input lain",
        //     'required' => "kosongkan jika tidak ingin mengubah gambar",
        //     'min' => "isi form nya kurang, min 3 karakter",
        //     'max' => "isi form nya kebanyakan / ukuran file terlalu besar",
        //     'mimes' => "ekstensi file tidak di izinkan"
        // ];

        // $update = $request->file('gambar');
        // if ($update) {
        //     $fileName = time().'_'.$update->getClientOriginalName();
        //     $update = $update->storeAs('upload', $fileName, 'public');
        // }
    
        // $request->update([
        //     'gambar'  => $update,
        //     'nama_kategori'  => $request->nameKategori
        // ]);
        
        
        $update = Kategori::findOrFail($id);
        //dd($update);
      
        $update->save();
        return redirect()->route('indexKategori');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function delete($id)
    {
        //
        $hapus = Kategori::findOrFail($id);
 
        $hapus->delete();
        return redirect()->route('indexKategori');
    }
}
