@extends('layout.template')
@section('content')

<!-- START DATA -->
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <!-- FORM PENCARIAN -->
    <div class="pb-3">
        <form class="d-flex" action="{{ url('siswa') }}" method="get">
            <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
            <button class="btn btn-secondary" type="submit">Cari</button>
        </form>
    </div>
    
    <!-- TOMBOL PENDAFTARAN -->
    <div class="pb-3">
        <a href='{{ url('siswa/create') }}' class="btn btn-primary">+ Pendaftaran</a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th class="col-md-1">No</th>
                <th class="col-md-3">NISN</th>
                <th class="col-md-4">Nama Lengkap</th>
                <th class="col-md-2">Jurusan</th>
                <th class="col-md-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = $data->firstItem() ?>
            @foreach ($data as $item)
            <tr>
                <td>{{ $i }}</td>
                <td>{{ $item->nisn }}</td>
                <td>{{ $item->namalengkap }}</td>
                <td>{{ $item->jurusan }}</td>
                <td>
                    <a href='{{ url('siswa/'.$item->nisn.'/edit') }}' class="btn btn-warning btn-sm">Edit</a>
                    <form onsubmit="return confirm('Data akan dihapus. Lanjutkan?')" class="d-inline" action="{{ url('siswa/'.$item->nisn) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" name="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            <?php $i++ ?>
            @endforeach
        </tbody>
    </table>
    {{ $data->links() }}
</div>
<!-- AKHIR DATA -->
    
@endsection