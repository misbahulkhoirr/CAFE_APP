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
    <a href="/admin/kategori/create" class="btn btn-primary mb-3">Tambah kategori</a>
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nama Kategori</th>
          <th scope="col">Slug kategori</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($kategori as $kategori)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $kategori->nama_kategori }}</td>
          <td>{{ $kategori->slug_kategori }}</td>
          <td>
            <a href="/admin/kategori/{{ $kategori->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
            <form action="/admin/kategori/{{ $kategori->slug_kategori }}" method="post" class="d-inline">
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
