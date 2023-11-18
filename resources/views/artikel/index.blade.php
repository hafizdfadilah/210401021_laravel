<title>list-artikel</title>
@extends('layout.template')
@section('konten')
<!-- START DATA -->
<div class="my-3 p-3 bg-body rounded shadow-sm">
        <!-- FORM PENCARIAN -->
        <div class="pb-3">
            <form class="d-flex" action="{{url('artikel')}}" method="get">
                <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
                <button class="btn btn-secondary" type="submit">Cari</button>
            </form>
        </div>
        
        <!-- TOMBOL TAMBAH DATA -->
        <div class="pb-3">
            <a href='{{url('artikel/create')}}' class="btn btn-primary">+ Tambah Data</a>
        </div>
    
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="col-md-1">No</th>
                    <th class="col-md-1">id artikel</th>
                    <th class="col-md-2">judul artikel</th>
                    <th class="col-md-2">author</th>
                    <th class="col-md-2">tahun terbit</th>
                    <th class="col-md-2">kategori</th>
                    <th class="col-md-2">aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = $data->firstitem() ?>
                @foreach ($data as $item)
                <tr>
                    <td>{{$i}} </td>
                    <td>{{$item->id_artikel}}</td>
                    <td>{{$item->judul_artikel}} </td>
                    <td>{{$item->author }} </td>
                    <td>{{$item->tahun_terbit}} </td>
                    <td>{{$item->kategori}}</td>
                    <td>
                        <a href='{{ url('artikel/'.$item->id_artikel."/edit") }}' class="btn btn-warning btn-sm">Edit</a>
                        <form onsubmit="return confirm('yakin menghapus?')" action="{{url('artikel/'.$item->id_artikel)}}" class="d-inline" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" name="submit" class="btn btn-danger btn-sm">Del</button>
                        </form>
                    </td>
                </tr>
                <?php $i++ ?>
                @endforeach
            </tbody>
        </table>
        {{$data->links()}}
    </div>
    <!-- AKHIR DATA -->
    @endsection