@extends('layout.main')

@section('container')
<div class="jumbotron">
<div class="card mb-3">
  <div style="max-height: 500px; overflow:hidden;">
    @if ($menu->count())
        <img src="{{ asset('storage/'.$menu[0]->image)}}" class="card-img-top" alt="{{ $menu[0]->kategori->nama_kategori }}">
  </div>
    @else
      <img src="https://source.unsplash.com/1200x400?{{ $menu[0]->kategori->nama_kategori }}" class="card-img-top" alt="{{ $post[0]->kategori->name }}">
    @endif
</div>
</div>
    <div class="row justify-content-center">
      <div class="col-md-10 panel">
        <div class="row">
          <div class="col-lg-4">
            <img src="https://source.unsplash.com/100x100" alt="" class="float-left">
            <h4>Contact</h4>
          </div>
          <div class="col-lg-4">
            <img src="https://source.unsplash.com/100x100" alt="" class="float-left">
          </div>
          <div class="col-lg-4">
            <img src="https://source.unsplash.com/100x100" alt="" class="float-left">
          </div>
        </div>
      </div>
    </div>
 </div>

<div class="row mt-5">
    <div class="col-md-12">
        <h3 class="text-center">Produk Kami</h3>
    </div>
</div>

<div class="container">
    <div class="row mt-3">
       @foreach ($menu->skip(1) as $row)
       <div class="col-md-3">
        <div class="card mb-3" style="width: 18rem;">
          @if ($row->image)
              <img src="{{ asset('storage/'.$row->image)}}" class="card-img-top" alt="{{ $row->kategori->nama_kategori }}">
          @else
              <img src="https://source.unsplash.com/500x400?{{ $row->kategori->nama_kategori }}" class="card-img-top" alt="{{ $row->kategori->nama_kategori }}">
          @endif
            <div class="card-body">
            <h5 class="card-title">{{$row->nama}}</h5>
            <p class="card-text">{{ number_format($row->harga)}}</p>
            <a href="/detail/{{ $row->slug }}" class="btn btn-primary">Lihat detail</a>
            </div>
        </div>
      </div>
    
       @endforeach
    </div>
</div>
{{-- 
<div class="row mt-5">
  <div class="col-md-12">
      <h3 class="text-center">Kategori Produk</h3>
  </div>
</div>
<div class="container">
    <div class="row mt-3">
       @foreach ($menu->skip(1) as $row)
       <div class="col-md-3">
        <div class="card" style="width: 18rem;">
          @if ($row->image)
              <img src="{{ asset('storage/'.$row->image)}}" class="card-img-top rounded" alt="{{ $row->kategori->nama_kategori }}">
          @else
              <img src="https://source.unsplash.com/500x400?{{ $row->kategori->nama_kategori }}" class="card-img-top" alt="{{ $row->kategori->nama_kategori }}">
          @endif
            <div class="card-body">
            <h5 class="card-title">{{$row->nama}}</h5>
            <p class="card-text">{{ number_format($row->harga)}}</p>
            <a href="/detail/{{ $row->slug }}" class="btn btn-primary">Lihat detail</a>
            </div>
        </div>
      </div>
    
       @endforeach
    </div>
</div> --}}
@endsection