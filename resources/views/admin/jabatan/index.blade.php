@extends('template.admin')
@section('title', 'Jabatan')
@section('heading', 'Daftar Data Jabatan')
@section('page')
    <li class="breadcrumb-item active">Kandidat</li>
@endsection
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#form-jabatan">
                        <i class="nav-icon fas fa-folder-plus"></i> &nbsp; Tambah Data Jabatan
                    </button>
                </h3>
            </div>
            <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Nama Jabatan</th>
                            <th class="text-center">Persentase</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jabatan as $data)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $data->nama_jabatan }}</td>
                                <td class="text-center">{{ $data->persentase }} %</td>
                                <td class="text-center">
                                    <form action="{{ route('jabatan.destroy', $data->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <a href="{{ route('jabatan.edit', $data->id) }}" class="btn btn-primary btn-sm"><i
                                                class="nav-icon fas fa-edit"></i> &nbsp; Edit</a>
                                        <button class="btn btn-danger btn-sm"><i class="nav-icon fas fa-trash-alt"></i>
                                            &nbsp; Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade" id="form-jabatan">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Data Jabatan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('jabatan.store') }}" method="POST">
                        @csrf
                        <div class="col-12">
                            <div class="form-group">
                                <label for="nama_jabatan">Nama Jabatan</label>
                                <input type="text" name="nama_jabatan" id="nama_jabatan" required
                                    class="form-control @error('nama_jabatan') is-invalid @enderror"
                                    value="{{ old('nama_jabatan') }}" placeholder="Nama Jabatan">
                            </div>
                            <div class="form-group">
                                <label for="persentase">Persentase</label>
                                <div class="input-group">
                                    <input type="number" name="persentase" id="persentase" required
                                        class="form-control @error('persentase') is-invalid @enderror"
                                        value="{{ old('persentase') }}" placeholder="Persentase">
                                    <div class="input-group-append">
                                        <span class="input-group-text">%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i
                            class='nav-icon fas fa-arrow-left'></i> &nbsp; Keluar</button>
                    <button type="submit" class="btn btn-success swalDefaultSuccess"><i class="nav-icon fas fa-save"></i>
                        &nbsp;
                        Tambahkan</button>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
@endsection
@section('script')
    <script>
        $("#dataJabatan").addClass("active");
    </script>
@endsection
