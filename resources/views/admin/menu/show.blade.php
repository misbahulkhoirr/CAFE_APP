@extends('admin.layouts.main')

@section('container')
<div class="container">
    <div class="row my-3">
        <div class="col-lg-8">
            <h1 class="mb-3">{{ $menu->title }}</h1>
            
            <a href="/admin/menu" class="btn btn-success"><span data-feather="arrow-left"></span> Back to menu</a>
            <a href="/admin/menu/{{ $menu->slug }}/edit" class="btn btn-warning"><span data-feather="edit"></span> Edit</a>
            
            <form action="/admin/menu/{{ $menu->slug }}" method="menu" class="d-inline">
                @method('delete')
                @csrf
                <button class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus ?')"><span data-feather="x-circle"></span> Delete</button>
            </form>
            <div style="max-height:350px; overflow:hidden">
                @if ($menu->image)
                    <img src="{{ asset('storage/'.$menu->image)}}" class="img-fluid mt-3" alt="{{ $menu->kategori->name }}">
            </div>
            @else
                <img src="https://source.unsplash.com/1200x400?{{ $menu->kategori->nama_kategori }}" class="img-fluid mt-3" alt="{{ $menu->kategori->name }}">
            @endif
            <article class="my-3 fs-5">
                <h2>{{ $menu->nama}}</h2>
                <h5 style="color:rgb(243, 59, 59)">Rp. {{ number_format($menu->harga) }}</h5>
                <p>{!! $menu->keterangan !!}</p>
            </article>
        </div>
    </div>
</div>

@endsection
