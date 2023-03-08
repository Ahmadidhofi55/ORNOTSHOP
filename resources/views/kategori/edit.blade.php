@extends('layouts.admin')
@section('title','Kategori Edit')
@section('contend')
<form action="{{ route('kategori.update', $kategori->id) }}" enctype="multipart/form-data" method="post">
    @csrf
    @method('put')
    <div class="box-body">
        <a href="{{ route('kategori.index') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i></a>
        <br>
        <br>
        <div class="form-group">
            <label for="kategori">Kategori</label>
            <input value="{{  old('kategori', $kategori->kategori)  }}"  type="text" class="form-control @error('kategori')
              is-invalid
            @enderror" id="kategori" name="kategori" placeholder="Kategori">
        </div>
        @error('kategori')
          <div class="alert alert-danger">
            {{ $message }}
          </div>
        @enderror
        <div class="form-group">
            <label for="img">Image</label>
            <input  value="{{ asset( old('img', $kategori->img)) }}" type="file" class="form-control @error('img')
              is-invalid
            @enderror" id="img" name="img">
        </div>
        @error('img')
          <div class="alert alert-danger">
            {{ $message }}
          </div>
        @enderror
    <div class="box-footer">
        <button type="submit" class="btn btn-primary">Simpan</button>
        <button type="reset" class="btn btn-danger">Reset</button>
      </div>
</form>
@section('header','Edit Kategori')
@section('aktif','Edit Kategori')
@endsection
