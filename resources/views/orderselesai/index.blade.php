@extends('layouts.tables')
@section('title','Order Selesai view')
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
    <!-- /.box-header -->
    <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>item</th>
                    <th>user</th>
                    <th>Alamat</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php
                $no = 1;
                @endphp
                @forelse ($order as $item)

                <tr>
                    <td>{{ $no++ }}.</td>
                    <td>{{ $item->item }}</td>
                    <td>{{ $item->user }}</td>
                    <td>{{ $item->alamat }}</td>
                    <td>{{ $item->status }}</td>
                    <td class="text-center">
                        <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                            action="{{ route('produk.destroy', $item->id) }}" method="POST">
                            <a href="{{ route('produk.edit', $item->id) }}" class="btn btn-sm btn-primary"><i
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

@section('header', 'Order Selesai')
@section('aktif', 'Order Selesai')
@endsection
