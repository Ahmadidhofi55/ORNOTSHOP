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
<form action="{{ route('profil.store') }}" enctype="multipart/form-data" method="post">
    @csrf
    <div class="box-body">
        <div class="form-group">
            <label for="username">Username</label>
            <input  value="{{ old('name', $user->name) }}" type="text" class="form-control @error('username')
              is-invalid
            @enderror" id="username" name="username" placeholder="Username">
        </div>
        @error('username')
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
        <div class="form-group">
            <label for="password">Password</label>
            <input  value="{{ old('password', $user->password) }}" type="text" class="form-control @error('password')
              is-invalid
            @enderror" id="password" name="password" >
        </div>
        @error('password')
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
