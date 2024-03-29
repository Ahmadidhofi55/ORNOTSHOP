@extends('layouts.tables')
@section('title','Produk view')
@section('contend')

    <div class="box-header">
        <a href="{{ route('produk.create') }}" class=" btn btn-primary">Create</a>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Produk</th>
                    <th>Kategori</th>
                    <th>Merek</th>
                    <th>Deskripsi</th>
                    <th>img</th>
                    <th>Harga</th>
                    <th>Stock</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php
                $no = 1;
                @endphp
                @forelse ($produk as $item)

                <tr>
                    <td>{{ $no++ }}.</td>
                    <td>{{ $item->nm_produk }}</td>
                    <td>{{ $item->kategori }}</td>
                    <td>{{ $item->merek }}</td>
                    <td>{{ $item->deskripsi }}</td>
                    <td><img src="{{ asset($item->img_1) }}" alt="{{ $item->nm_produk }}" width="80px" height="80px" class=""></td>
                    <td>{{ $item->harga }}</td>
                    <td>{{ $item->stock }}</td>
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

@section('header', 'Produk')
@section('aktif', 'Produk')
@endsection
