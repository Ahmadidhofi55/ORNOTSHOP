@extends('layouts.admin')
@section('title','Merek Create')
@section('contend')
<form action="{{ route('merek.store') }}" enctype="multipart/form-data" method="post">
    @csrf
    <div class="box-body">
        <a href="{{ route('merek.index') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i></a>
        <br>
        <br>
        <div class="form-group">
            <label for="kategori">Merek</label>
            <input type="text" class="form-control @error('merek')
              is-invalid
            @enderror" id="merek" name="merek" placeholder="merek">
        </div>
        @error('merek')
          <div class="alert alert-danger">
            {{ $message }}
          </div>
        @enderror
        <div class="form-group">
            <label for="img">Image</label>
            <input type="file" class="form-control @error('img')
              is-invalid
            @enderror" id="img" name="img">
        </div>
        @error('img')
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
@section('header','Create Merek')
@section('aktif','Create Merek')
@endsection
