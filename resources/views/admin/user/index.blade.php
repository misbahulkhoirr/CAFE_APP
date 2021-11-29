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
    <a href="/admin/user/create" class="btn btn-primary mb-3">Tambah user</a>
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nama</th>
          <th scope="col">Username</th>
          <th scope="col">Email</th>
          <th scope="col">Akses level</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($user as $row)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $row->name }}</td>
          <td>{{ $row->username }}</td>
          <td>{{ $row->email }}</td>
          <td>@if ($row->akses_level==0)
            Admin       
          @else
            User
          @endif</td>
          <td>
            <a href="/admin/user/{{ $row->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
            <form action="/admin/user/{{ $row->id }}" method="post" class="d-inline">
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
