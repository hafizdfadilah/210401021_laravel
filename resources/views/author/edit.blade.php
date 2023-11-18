<title>create author</title>
@extends('layout.template')
@section('konten')
<!-- START FORM -->
<form action='{{url('author/'.$data->author_id)}}' method='post'>
    @csrf
    @method('PUT'); 
    <a href="{{url('author')}}" class="btn btn-secondary" > <-kembali </a>
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <div class="mb-3 row">
            <label for="author_id" class="col-sm-2 col-form-label">id author</label>
            <div class="col-sm-10">
                {{$data->author_id}}
            </div>
        </div>
        <div class="mb-3 row">
            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='nama' id="nama">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="email" class="col-sm-2 col-form-label">email</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='email' id="email">
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