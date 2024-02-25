@extends('template.admin')
@section('title', 'Pemilih')
@section('heading', 'Edit Pemilih')
@section('page')
    <li class="breadcrumb-item"><a href="{{ route('pemilih.index') }}">Pemilih</a></li>
    <li class="breadcrumb-item"><a
            href="{{ route('jabatan.show', $pemilih->jabatan_id) }}">{{ $pemilih->jabatan->nama_jabatan }}</a></li>
    <li class="breadcrumb-item active">Edit Pemilih</li>
@endsection
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('jabatan.show', $pemilih->jabatan_id) }}" class="btn btn-default"><i
                        class='nav-icon fas fa-arrow-left'></i> &nbsp; Kembali</a> &nbsp;
            </div>
            <form action="{{ route('pemilih.update', $pemilih->id) }}" method="POST">
                @csrf
                @method('patch')
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="nama_pemilih">Nama Pemilih</label>
                                <input type="text" name="nama_pemilih" id="nama_pemilih" required
                                    class="form-control @error('nama_pemilih') is-invalid @enderror"
                                    value="{{ $pemilih->nama_pemilih }}" placeholder="Nama pemilih">
                            </div>
                            <div class="form-group">
                                <label for="no_kta">No KTA</label>
                                <input type="text" name="no_kta" id="no_kta" required
                                    class="form-control @error('no_kta') is-invalid @enderror"
                                    value="{{ $pemilih->no_kta }}" onkeyup="this.value = this.value.toUpperCase();"
                                    placeholder="No KTA">
                            </div>
                            <div class="form-group">
                                <label for="jk">Jenis Kelamin</label>
                                <select id="jk" name="jk" required
                                    class="select2bs4 form-control @error('jk') is-invalid @enderror">
                                    <option value="">-- Jenis Kelamin --</option>
                                    <option value="L" @if ($pemilih->jk == 'L') selected @endif>Laki-laki
                                    </option>
                                    <option value="P" @if ($pemilih->jk == 'P') selected @endif>Perempuan
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="section">Section</label>
                                <select id="section" name="section" required
                                    class="select2bs4 form-control @error('section') is-invalid @enderror">
                                    <option value="">-- Pilih Section --</option>
                                    <option value="Brassline" @if ($pemilih->section == 'Brassline') selected @endif>Brassline
                                    </option>
                                    <option value="Battery" @if ($pemilih->section == 'Battery') selected @endif>Battery
                                    </option>
                                    <option value="Pit Instrument" @if ($pemilih->section == 'Pit Instrument') selected @endif>Pit
                                        Instrument
                                    </option>
                                    <option value="Color Guard" @if ($pemilih->section == 'Color Guard') selected @endif>Color
                                        Guard
                                    </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="jabatan_id">Jabatan</label>
                                <select name="jabatan_id" id="jabatan_id" required
                                    class="select2bs4 form-control @error('jabatan_id') is-invalid @enderror">
                                    <option value="">-- Pilih Jabatan --</option>
                                    @foreach ($jabatan as $data)
                                        <option value="{{ $data->id }}"
                                            @if ($pemilih->jabatan_id == $data->id) selected @endif>
                                            {{ $data->nama_jabatan }}
                                        </option>
                                    @endforeach
                                </select>
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
        $("#dataPemilih").addClass("active");
    </script>
@endsection
