<title>create kategori</title>
@extends('layout.template')
@section('konten')
<!-- START FORM -->
<form action='{{url('kategori/'.$data->id_kategori)}}' method='post'>
    @csrf
    @method('PUT'); 
    <a href="{{url('kategori')}}" class="btn btn-secondary" > <-kembali </a>
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <div class="mb-3 row">
            <label for="id_kategori" class="col-sm-2 col-form-label">id kategori</label>
            <div class="col-sm-10">
                {{$data->id_kategori}}
            </div>
        </div>
        <div class="mb-3 row">
            <label for="nama_kategori" class="col-sm-2 col-form-label">Nama kategori</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='nama_kategori' id="nama_kategori">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="jurusan" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
        </div>
    </div>
</form>
<!-- AKHIR FORM -->
@endsection