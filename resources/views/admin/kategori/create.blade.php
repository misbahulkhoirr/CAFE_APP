@extends('admin.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">{{ $title }}</h1>
  </div>
<div class="col-lg-6 mb-3">
<form action="/admin/kategori" method="POST">
    @csrf
    <div class="mb-3">
        <label for="nama_kategori" class="form-label">Nama Kategori</label>
        <input type="text" class="form-control @error('nama_kategori') is-invalid @enderror" id="nama_kategori" name="nama_kategori" autofocus value="{{ old ('nama_kategori')}}">
        @error('nama_kategori')
        <div class="invalid-feedback">
          {{ $message}}
        </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="slug_kategori" class="form-label">Slug kategori</label>
        <input type="text" class="form-control @error('slug_kategori') is-invalid @enderror" id="slug_kategori" name="slug_kategori" autofocus value="{{ old ('slug_kategori')}}">
        @error('slug_kategori')
        <div class="invalid-feedback">
          {{ $message}}
        </div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary mt-2 mb-3">Save</button>
  </form>
</div>    
@endsection
