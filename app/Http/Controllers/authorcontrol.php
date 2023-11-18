<?php

namespace App\Http\Controllers;

use App\Models\author;
use Illuminate\Http\Request;

class authorcontrol extends Controller
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
            $data = author::where('author_id','like',"%$katakunci%")
                ->orwhere('nama','like',"%$katakunci%")
                ->orwhere('email','like',"%$katakunci%")
                ->paginate($jumlahbaris);
        }else{
            $data = author::orderBy('author_id','desc')->paginate($jumlahbaris);
        }
        return view('author.index')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('author.create');
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
            'author_id' => 'required|numeric|unique:author,author_id',
            'nama' => 'required',
            'email' => 'required'
        ],[
            //membuat message dari error
            'author_id.required'=>'id author wajib di isi',
            'author_id.numeric'=>'id author wajib di dalam angka',
            'author_id.unique'=>'id author yang di isi sudah ada dalam database',
            'nama.required'=>'nama wajib di isi',
            'email.required'=>'email wajib di isi'
        ]);
        //menampung data input dari create
        $data = [
            'author_id'=>$request->author_id,
            'nama'=>$request->nama,
            'email'=>$request->email
        ];
        //memasukkan data ke database
        author::create($data);
        //kembali ke page dengan message sukses dan 
        return redirect()->to('author')->with('success','berhasil menambahkan data');
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
        $data = author::where('author_id',$id)->first();
        return view('author.edit')->with('data',$data);
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
            'nama' => 'required',
            'email' => 'required'
        ],[
            'nama.required'=>'nama wajib di isi',
            'email.required'=>'email wajib di isi'
        ]);
        $data = [
            'nama'=>$request->nama,
            'email'=>$request->email
        ];
        author::where('author_id',$id)->update($data);
        return redirect()->to('author')->with('success','berhasil mengupdate data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        author::where('author_id',$id)->delete();
        return redirect()->to('author')->with('success','berhasil menghapus data');
    }
}
