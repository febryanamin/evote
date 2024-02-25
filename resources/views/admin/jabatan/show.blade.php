@extends('template.admin')
@section('title', 'Pemilih')
@section('heading')
    Daftar Pemilih {{ $jabatan->nama_jabatan }}
@endsection
@section('page')
    <li class="breadcrumb-item"><a href="{{ route('pemilih.index') }}">Pemilih</a></li>
    <li class="breadcrumb-item active">{{ $jabatan->nama_jabatan }}</li>
@endsection
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('pemilih.index') }}" class="btn btn-default btn-sm"><i
                        class="nav-icon fas fa-arrow-left"></i>
                    &nbsp; Kembali</a>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Nama Pemilih</th>
                            <th class="text-center">No KTA</th>
                            <th class="text-center">Jenis Kelamin</th>
                            <th class="text-center">Section</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pemilih as $data)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $data->nama_pemilih }}</td>
                                <td class="text-center">{{ $data->no_kta }}</td>
                                <td class="text-center">
                                    @if ($data->jk == 'L')
                                        Laki-laki
                                    @else
                                        Perempuan
                                    @endif
                                </td>
                                <td class="text-center">{{ $data->section }}</td>
                                <td class="text-center">
                                    <form action="{{ route('pemilih.destroy', $data->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <a href="{{ route('pemilih.edit', $data->id) }}" class="btn btn-primary btn-sm"><i
                                                class="nav-icon fas fa-edit"></i> &nbsp;
                                            Edit</a>
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $("#dataPemilih").addClass("active");
    </script>
@endsection
