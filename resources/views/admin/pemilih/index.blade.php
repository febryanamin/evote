@extends('template.admin')
@section('title', 'Pemilih')
@section('heading', 'Daftar Pemilih')
@section('page')
    <li class="breadcrumb-item active">Pemilih</li>
@endsection
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#form-pemilih">
                        <i class="nav-icon fas fa-folder-plus"></i> &nbsp; Tambah Data Pemilih
                    </button>
                </h3>
            </div>
            <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Nama Jabatan</th>
                            <th class="text-center">Jumlah Pemilih</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jabatan as $data)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $data->nama_jabatan }}</td>
                                <td class="text-center">
                                    {{ $data->pemilih_count }}
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('jabatan.show', $data->id) }}" class="btn btn-secondary btn-sm"><i
                                            class="nav-icon fas fa-search-plus"></i> &nbsp; Lihat Pemilih</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="form-pemilih">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Data Pemlilih</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('pemilih.store') }}" method="POST">
                        @csrf
                        <div class="col-12">
                            <div class="form-group">
                                <label for="nama_pemilih">Nama Pemilih</label>
                                <input type="text" name="nama_pemilih" id="nama_pemilih" required
                                    class="form-control @error('nama_pemilih') is-invalid @enderror"
                                    value="{{ old('nama_pemilih') }}" placeholder="Nama pemilih">
                            </div>
                            <div class="form-group">
                                <label for="no_kta">No KTA</label>
                                <input type="text" name="no_kta" id="no_kta" required
                                    class="form-control @error('no_kta') is-invalid @enderror" value="{{ old('no_kta') }}"
                                    onkeyup="this.value = this.value.toUpperCase();" placeholder="No KTA">
                            </div>
                            <div class="form-group">
                                <label for="jk">Jenis Kelamin</label>
                                <select id="jk" name="jk" required
                                    class="select2bs4 form-control @error('jk') is-invalid @enderror">
                                    <option value="">-- Jenis Kelamin --</option>
                                    <option value="L" @if (old('jk') == 'L') selected @endif>Laki-laki
                                    </option>
                                    <option value="P" @if (old('jk') == 'P') selected @endif>Perempuan
                                    </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="section">Section</label>
                                <select id="section" name="section" required
                                    class="select2bs4 form-control @error('section') is-invalid @enderror">
                                    <option value="">-- Pilih Section --</option>
                                    <option value="Brassline" @if (old('section') == 'Brassline') selected @endif>Brassline
                                    </option>
                                    <option value="Battery" @if (old('section') == 'Battery') selected @endif>Battery
                                    </option>
                                    <option value="Pit Instrument" @if (old('section') == 'Pit Instrument') selected @endif>Pit
                                        Instrument
                                    </option>
                                    <option value="Color Guard" @if (old('section') == 'Color Guard') selected @endif>Color
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
                                            @if (old('jabatan_id') == $data->id) selected @endif>
                                            {{ $data->nama_jabatan }}
                                        </option>
                                    @endforeach
                                </select>
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
        $("#dataPemilih").addClass("active");
    </script>
@endsection
