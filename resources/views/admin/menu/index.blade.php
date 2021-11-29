@extends('admin.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">{{ $title }}</h1>
  </div>

      @if (session()->has('success'))
      <div class="alert alert-success col-lg-10" role="alert">
        {{ session('success') }}
      </div>
      @endif

  <div class="table-responsive col-lg-10">
    <a href="/admin/menu/create" class="btn btn-primary mb-3">Tambah menu</a>
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Gambar</th>
          <th scope="col">Nama menu</th>
          <th scope="col">Kategori</th>
          <th scope="col">Harga</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody class="align-middle">
        @foreach ($menu as $row)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td> <img src="{{asset('storage/'.$row->image)}}" style="width:150px"></td>
          <td>{{ $row->nama }}</td>
          <td>{{ $row->kategori->nama_kategori }}</td>
          <td>{{ $row->harga }}</td>
          <td>
            <a href="/admin/menu/{{ $row->slug }}" class="badge bg-info"><span data-feather="eye"></span></a>
            <a href="/admin/menu/{{ $row->slug }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
            <form action="/admin/menu/{{ $row->slug }}" method="post" class="d-inline">
            @method('delete')
            @csrf
            <button class="badge bg-danger border-0" onclick="return confirm('Yakin ingin menghapus ?')"><span data-feather="x-circle"></span></button>
            </form>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

@endsection
