@extends('layouts.admin')
@section('title','Produk Edit')
@section('contend')
<form action="{{ route('produk.update', $produk->id) }}" enctype="multipart/form-data" method="post">
    @csrf
    @method('put')
    <div class="box-body">
        <a href="{{ route('produk.index') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i></a>
        <br>
        <br>
        <div class="form-group">
            <label for="nm_produk">Nama Produk</label>
            <input value="{{  old('nm_produk', $produk->nm_produk)  }}"  type="text" class="form-control @error('nm_produk')
              is-invalid
            @enderror" id="nm_produk" name="nm_produk" placeholder="Nama Produk">
        </div>
        @error('nm_produk')
          <div class="alert alert-danger">
            {{ $message }}
          </div>
        @enderror
        <div class="form-group">
            <label>Kategori</label>
            <select name="kategori" id="kategori" class="form-control select2" style="width: 100%;">
                @foreach ($kategori as $item)
                <option  value="{{ old('kategori', $produk->kategori) }}" {{ $item->id == $item->id ? 'selected' : '' }}>{{ $item->kategori }}</option>
                @endforeach
            </select>
          </div>
          <div class="form-group">
            <label>Merek</label>
            <select name="merek" id="merek" class="form-control select2" style="width: 100%;">
                @foreach ($merek as $item)
                <option value="{{ old('merek', $produk->merek) }}" {{ $item->id == $item->id ? 'selected' : '' }}>{{ $item->merek }}</option>
                @endforeach
            </select>
          </div>
          <div class="form-group">
            <label>Deskripsi</label>
            <textarea value="{{ old('deskripsi', $produk->deskripsi) }}" class="form-control @error('deskripsi')
            is-invalid
            @enderror" id="deskripsi" name="deskripsi" rows="3" placeholder="Deskripsi ...">{{ $produk->deskripsi }}</textarea>
          </div>
          @error('deskripsi')
          <div class="alert alert-danger">
            {{ $message }}
          </div>
        @enderror
        <div class="form-group">
            <label for="img">Image</label>
            <input  value="{{ asset( old('img', $produk->img)) }}" type="file" class="form-control @error('img')
              is-invalid
            @enderror" id="img" name="img">
        </div>
        @error('img')
          <div class="alert alert-danger">
            {{ $message }}
          </div>
        @enderror
        <div class="form-group">
            <label for="harga">Harga</label>
            <input value="{{ old('harga', $produk->harga) }}" type="text" class="form-control @error('harga')
              is-invalid
            @enderror" id="harga" name="harga" placeholder="Harga">
        </div>
        @error('harga')
        <div class="alert alert-danger">
          {{ $message }}
        </div>
      @enderror
        <div class="form-group">
            <label for="stock">Stock</label>
            <input value="{{ old('stock', $produk->stock) }}" type="number" class="form-control @error('stock')
               is-invalid
            @enderror" id="stcok" name="stock" placeholder="Stock">
        </div>
        @error('stock')
        <div class="alert alert-danger">
          {{ $message }}
        </div>
      @enderror
    </div>

    <div class="box-footer">
        <button type="submit" class="btn btn-primary">Simpan</button>
        <button type="reset" class="btn btn-danger">Reset</button>
      </div>
</form>
@section('header','Edit Produk')
@section('aktif','Edit Produk')
@endsection
