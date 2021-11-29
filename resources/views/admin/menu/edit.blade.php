@extends('admin.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">{{ $title }}</h1>
  </div>

  <div class="col-lg-8 mb-3">
    <form method="post" action="/admin/menu/{{$menu->slug}}" enctype="multipart/form-data">
      @method('put')
      @csrf
        <div class="mb-3">
          <label for="nama" class="form-label">Nama</label>
          <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" autofocus value="{{ old ('nama',$menu->nama)}}">
          @error('nama')
          <div class="invalid-feedback">
            {{ $message}}
          </div>
          @enderror
        </div>

        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old ('slug',$menu->slug)}}">
            @error('slug')
            <div class="invalid-feedback">
              {{ $message}}
            </div>
            @enderror
        </div>

        <div class="mb-3">
          <label for="kategori" class="form-label">Kategori</label>
          <select class="form-select" name="kategori_id">
            @foreach ($kategori as $kategori) 
            @if (old('kategori_id',$menu->kategori->id)==$kategori->id)
            <option value="{{ $kategori->id }}" selected>{{ $kategori->nama_kategori }}</option>
            @else
            <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
            @endif
            @endforeach
          </select>
          
        </div>

        <div class="mb-3">
          <label for="image" class="form-label">Upload image</label>
          <input type="hidden" name="imagelama" value="{{ $menu->image }}"> {{-- input untuk menghapus img di folder public/menu-images --}}
          @if ($menu->image)
          <img src="{{asset('storage/'.$menu->image)}}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
              @else
              <img class="img-preview img-fluid mb-3 col-sm-5">
          @endif
          <img class="img-preview img-fluid mb-3 col-sm-5">
          <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
          @error('image')
            <div class="invalid-feedback">
              {{ $message}}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="text" class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga" value="{{ old ('harga',$menu->harga)}}">
            @error('harga')
            <div class="invalid-feedback">
              {{ $message}}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            @error('keterangan')
            <p class="text-danger">
              {{ $message}}
            </p>
            @enderror
          <input id="keterangan" type="hidden" name="keterangan" value="{{ old ('keterangan',$menu->keterangan) }}">
          <trix-editor input="keterangan"></trix-editor>
      </div>
       
        <button type="submit" class="btn btn-primary">Save</button>
      </form>
  </div>
<script>
   //mematikan fungsi upload file pada text-editor
   document.addEventListener('trix-file-accept', function(e){
      e.preventDefault();
    })
    
    //preview image
    function previewImage(){
      const image= document.querySelector('#image');
      const imgPreview= document.querySelector('.img-preview');

      imgPreview.style.display='block';

      const oFReader = new FileReader();
      oFReader.readAsDataURL(image.files[0]);

      oFReader.onload=function(oFRevent){
        imgPreview.src=oFRevent.target.result;
      }
    }
</script>
  @endsection

  