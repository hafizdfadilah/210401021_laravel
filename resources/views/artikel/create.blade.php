@extends('layout.template')
@section('konten')
<title>create artikel</title>
<!-- START FORM -->
<form action='{{url('artikel')}}' method='post'>
    @csrf
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <a href="{{url('artikel')}}" class="btn btn-secondary" > <-kembali </a>
        <div class="mb-3 row">
            <label for="id_artikel" class="col-sm-2 col-form-label">id artikel</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" name='id_artikel' id="id_artikel">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="judul_artikel" class="col-sm-2 col-form-label">judul artikel</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='judul_artikel' id="judul_artikel">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="author" class="col-sm-2 col-form-label">author</label>
            <div class="col-sm-10">
                <select type="radio" class="form-control" name="author" id="author" style="text-align: center;">
                    <option value="" hidden>--pilih author--</option>
                    @foreach ($data as $item)
                    <option value="{{$item->nama}}">{{$item->nama}}</option>
                    @endforeach
                    
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="tahun_terbit" class="col-sm-2 col-form-label">tahun terbit</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" name='tahun_terbit' id="tahun_terbit">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="kategori" class="col-sm-2 col-form-label">kategori</label>
            <div class="col-sm-10">
                <select type="radio" class="form-control" name="kategori" id="kategori" style="text-align: center;">
                    <option value="" hidden>--pilih author--</option>
                    @foreach ($data2 as $item2)
                    <option value="{{$item2->nama_kategori}}">{{$item2->nama_kategori}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
        </div>
    </div>
</form>
<!-- AKHIR FORM -->
@endsection