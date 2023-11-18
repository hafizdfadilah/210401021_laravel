<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use App\Models\author;
use App\Models\artikel;
use Illuminate\Http\Request;

class artikelcontrol extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $data2 = author::orderBy('author_id','desc')->paginate(10);
        $data3 = kategori::orderBy('id_kategori','desc')->paginate(10);
        $katakunci = $request->katakunci;
        $jumlahbaris = 5;
        if (strlen($katakunci)) {
            $data = artikel::where('id_artikel','like',"%$katakunci%")
                ->orwhere('judul_artikel','like',"%$katakunci%")
                ->orwhere('author','like',"%$katakunci%")
                ->orwhere('tahun_terbit','like',"%$katakunci%")
                ->orwhere('kategori','like',"%$katakunci%")
                ->paginate($jumlahbaris);
        }else{
            $data = artikel::orderBy('id_artikel','desc')->paginate($jumlahbaris);
        }
        return view('artikel.index')->with('data',$data)->with('data2',$data2)->with('data3',$data3);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = author::orderBy('author_id','desc')->paginate(5);
        $data2 = kategori::orderBy('id_kategori','desc')->paginate(5);
        return view('artikel.create')->with('data',$data)->with('data2',$data2);
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
            'id_artikel' => 'required|numeric|unique:artikel,id_artikel',
            'judul_artikel' => 'required',
            'author' => 'required',
            'tahun_terbit' => 'required',
            'kategori' => 'required'
        ],[
            //membuat message dari error
            'id_artikel.required'=>'id artikel wajib di isi',
            'id_artikel.numeric'=>'id artikel wajib di dalam angka',
            'id_artikel.unique'=>'id artikel yang di isi sudah ada dalam database',
            'judul_artikel.required'=>'judul artikel wajib di isi',
            'author.required'=>'author wajib di isi',
            'tahun_terbit.required'=>'tahun terbit wajib di isi',
            'kategori.required'=>'kategori wajib di isi',
        ]);
        //menampung data input dari create
        $data = [
            'id_artikel'=>$request->id_artikel,
            'judul_artikel'=>$request->judul_artikel,
            'author'=>$request->author,
            'tahun_terbit'=>$request->tahun_terbit,
            'kategori'=>$request->kategori
        ];
        //memasukkan data ke database
        artikel::create($data);
        //kembali ke page dengan message sukses dan 
        return redirect()->to('artikel')->with('success','berhasil menambahkan data');
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
        $data3 = author::orderBy('author_id','desc')->paginate(5);
        $data2 = kategori::orderBy('id_kategori','desc')->paginate(5);
        $data = artikel::where('id_artikel',$id)->first();
        return view('artikel.edit')->with('data',$data)->with('data2',$data2)->with('data3',$data3);
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
            'judul_artikel' => 'required',
            'author' => 'required',
            'tahun_terbit' => 'required',
            'kategori' => 'required'
        ],[
            'judul_artikel.required'=>'judul artikel wajib di isi',
            'author.required'=>'author wajib di isi',
            'tahun_terbit.required'=>'tahun terbit wajib di isi',
            'kategori.required'=>'kategori wajib di isi',
        ]);
        $data = [
            'judul_artikel'=>$request->judul_artikel,
            'author'=>$request->author,
            'tahun_terbit'=>$request->tahun_terbit,
            'kategori'=>$request->kategori,
        ];
        artikel::where('id_artikel',$id)->update($data);
        return redirect()->to('artikel')->with('success','berhasil update data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        artikel::where('id_artikel',$id)->delete();
        return redirect()->to('artikel')->with('success','berhasil menghapus data');
    }
}
