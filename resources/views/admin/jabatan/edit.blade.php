@extends('template.admin')
@section('title', 'Jabatan')
@section('heading', 'Edit Jabatan')
@section('page')
    <li class="breadcrumb-item"><a href="{{ route('jabatan.index') }}">Jabatan</a></li>
    <li class="breadcrumb-item active">Edit Jabatan</li>
@endsection
@section('content')
    <div class="col-12">
        <div class="card card-primary">
            <div class="card-header">
                <a href="{{ route('jabatan.index') }}" class="btn btn-default"><i class='nav-icon fas fa-arrow-left'></i>
                    &nbsp; Kembali</a> &nbsp;
            </div>
            <form action="{{ route('jabatan.update', $jabatan->id) }}" method="POST">
                @csrf
                @method('patch')
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="nama_jabatan">Nama Jabatan</label>
                                <input type="text" name="nama_jabatan" id="nama_jabatan" required
                                    class="form-control @error('nama_jabatan') is-invalid @enderror"
                                    value="{{ $jabatan->nama_jabatan }}" placeholder="Nama Jabatan">
                            </div>
                            <div class="form-group">
                                <label for="persentase">Persentase</label>
                                <div class="input-group">
                                    <input type="number" name="persentase" id="persentase" required
                                        class="form-control @error('persentase') is-invalid @enderror"
                                        value="{{ $jabatan->persentase }}" placeholder="Persentase">
                                    <div class="input-group-append">
                                        <span class="input-group-text">%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button name="submit" class="btn btn-primary"><i class="nav-icon fas fa-save"></i> &nbsp;
                        Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $("#dataJabatan").addClass("active");
    </script>
@endsection
