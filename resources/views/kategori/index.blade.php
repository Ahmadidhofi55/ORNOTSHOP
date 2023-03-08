@extends('layouts.tables')
@section('title','Kategori view')
@section('contend')
<div class="box">
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
    <div class="box-header">
        <a href="{{ route('kategori.create') }}" class=" btn btn-primary">Create</a>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Kategori</th>
                    <th>img</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php
                $no = 1;
                @endphp
                @forelse ($kategori as $item)
                <tr>
                    <td>{{ $no++ }}.</td>
                    <td>{{ $item->kategori }}</td>
                    <td><img src="{{ asset($item->img) }}" alt="{{ $item->nm_produk }}" width="80px" height="80px" class=""></td>
                    <td class="text-center">
                        <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                            action="{{ route('kategori.destroy', $item->id) }}" method="POST">
                            <a href="{{ route('kategori.edit', $item->id) }}" class="btn btn-sm btn-primary"><i
                                    class="fa fa-edit"></i></a>

                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                 <div class="alert alert-danger"> Data Tidak Ada Dalam Database</div>
                @endforelse

            </tbody>
            <tfoot>
                <tr>
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.box-body -->
</div>

@section('header', 'Kategori')
@section('aktif', 'Kategori')
@endsection
