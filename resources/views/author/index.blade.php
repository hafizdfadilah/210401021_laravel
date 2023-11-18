<title>list-author</title>
@extends('layout.template')
@section('konten')
<!-- START DATA -->
<div class="my-3 p-3 bg-body rounded shadow-sm">
        <!-- FORM PENCARIAN -->
        <div class="pb-3">
            <form class="d-flex" action="{{url('author')}}" method="get">
                <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
                <button class="btn btn-secondary" type="submit">Cari</button>
            </form>
        </div>
        
        <!-- TOMBOL TAMBAH DATA -->
        <div class="pb-3">
            <a href='{{url('author/create')}}' class="btn btn-primary">+ Tambah Data</a>
        </div>
    
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="col-md-1">No</th>
                    <th class="col-md-2">id author</th>
                    <th class="col-md-3">nama</th>
                    <th class="col-md-3">email</th>
                    <th class="col-md-2">aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = $data->firstitem() ?>
                @foreach ($data as $item)
                <tr>
                    <td>{{$i}}</td>
                    <td>{{$item->author_id}}</td>
                    <td>{{$item->nama}}</td>
                    <td>{{$item->email}}</td>
                    <td>
                        <a href='{{ url('author/'.$item->author_id."/edit") }}' class="btn btn-warning btn-sm">Edit</a>
                        <form onsubmit="return confirm('yakin menghapus?')" action="{{url('author/'.$item->author_id)}}" class="d-inline" method="POST">
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