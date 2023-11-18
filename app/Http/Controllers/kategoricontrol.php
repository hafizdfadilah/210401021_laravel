<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use Illuminate\Http\Request;

class kategoricontrol extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 5;
        if (strlen($katakunci)) {
            $data = kategori::where('id_kategori','like',"%$katakunci%")
                ->orwhere('nama_kategori','like',"%$katakunci%")
                ->paginate($jumlahbaris);
        }else{
            $data = kategori::orderBy('id_kategori','desc')->paginate($jumlahbaris);
        }
        return view('kategori.index')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //mendeklarasi kebutuhan sebuah data
        $request->validate([
            'id_kategori' => 'required|numeric|unique:kategori,id_kategori',
            'nama_kategori' => 'required'
        ],[
            //membuat message dari error
            'id_kategori.required'=>'id kategori wajib di isi',
            'id_kategori.numeric'=>'id kategori wajib di dalam angka',
            'id_kategori.unique'=>'id kategori yang di isi sudah ada dalam database',
            'nama_kategori.required'=>'nama kategori wajib di isi'
        ]);
        //menampung data input dari create
        $data = [
            'id_kategori'=>$request->id_kategori,
            'nama_kategori'=>$request->nama_kategori
        ];
        //memasukkan data ke database
        kategori::create($data);
        //kembali ke page dengan message sukses dan 
        return redirect()->to('kategori')->with('success','berhasil menambahkan data');
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
        $data = kategori::where('id_kategori',$id)->first();
        return view('kategori.edit')->with('data',$data);
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
        $request->validate([
            'nama_kategori' => 'required'
        ],[
            //membuat message dari error
            'nama_kategori.required'=>'nama kategori wajib di isi'
        ]);
        //menampung data input dari create
        $data = [
            'nama_kategori'=>$request->nama_kategori
        ];
        //memasukkan data ke database
        kategori::where('id_kategori',$id)->update($data);
        //kembali ke page dengan message sukses dan 
        return redirect()->to('kategori')->with('success','berhasil menambahkan data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        kategori::where('id_kategori',$id)->delete();
        return redirect()->to('kategori')->with('success','berhasil menghapus data');
    }
}
