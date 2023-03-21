@extends('layouts.admin')
@section('title','Profil')
@section('contend')
@if (session()->has('success'))
<div class="alert alert-success">
    {{ session()->get('success')}}
</div>
@endif
@if (session()->has('error'))
<div class="alert alert-danger">
    {{ session()->get('error') }}
</div>
@endif
<form action="{{ route('profil.update',$user->id) }}" enctype="multipart/form-data" method="post">
    @csrf
    @method('put')
    <div class="box-body">
        <div class="form-group">
            <label for="name">name</label>
            <input  value="{{ old('name', $user->name) }}" type="text" class="form-control @error('name')
              is-invalid
            @enderror" id="name" name="name" placeholder="name">
        </div>
        @error('name')
          <div class="alert alert-danger">
            {{ $message }}
          </div>
        @enderror
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text"  value="{{ old('email', $user->email) }}" class="form-control @error('email')
              is-invalid
            @enderror" readonly id="email" name="email" >
        </div>
        @error('email')
          <div class="alert alert-danger">
            {{ $message }}
          </div>
        @enderror
        <div class="form-group">
            <label for="img">Image</label>
            <input  type="file" class="form-control @error('img')
              is-invalid
            @enderror" id="img"  name="img">
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
@section('header','Profil')
@section('aktif',' Profil')
@endsection
