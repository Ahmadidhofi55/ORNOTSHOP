@extends('layouts.admin')
@section('title','Merek Edit')
@section('contend')
<form action="{{ route('merek.update', $merek->id) }}" enctype="multipart/form-data" method="post">
    @csrf
    @method('put')
    <div class="box-body">
        <a href="{{ route('merek.index') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i></a>
        <br>
        <br>
        <div class="form-group">
            <label for="merek">Merek</label>
            <input value="{{  old('merek', $merek->merek)  }}"  type="text" class="form-control @error('merek')
              is-invalid
            @enderror" id="merek" name="merek" placeholder="Merek">
        </div>
        @error('merek')
          <div class="alert alert-danger">
            {{ $message }}
          </div>
        @enderror
        <div class="form-group">
            <label for="img">Image</label>
            <input  value="{{ asset( old('img', $merek->img)) }}" type="file" class="form-control @error('img')
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
@section('header','Merek Kategori')
@section('aktif','Merek Kategori')
@endsection
