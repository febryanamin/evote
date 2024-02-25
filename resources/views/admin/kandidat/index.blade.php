@extends('template.admin')
@section('title', 'Kandidat')
@section('heading', 'Daftar Kandidat')
@section('page')
    <li class="breadcrumb-item active">Kandidat</li>
@endsection
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="row justify-content-evenly">
                    <div class="col-4">
                        <form action="{{ route('kandidat.index') }}">
                            <select name="periode" id="periode" class="form-control" onchange="this.form.submit()">
                                <option value="">-- Pilih Periode--</option>
                                @foreach ($periode as $data)
                                    <option value="{{ $data->periode }}" @if ($data->periode == request('periode')) selected @endif>
                                        Periode {{ $data->periode }}/{{ $data->periode + 1 }}
                                    </option>
                                @endforeach
                            </select>
                        </form>
                    </div>
                    <div class="col-8 text-right">
                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                            data-target="#form-kandidat">
                            <i class="nav-icon fas fa-folder-plus"></i> &nbsp; Tambah Data Pemilih
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="container">
                    <div class="row">
                        @if ($kandidat->isEmpty())
                            <h3 class="card-title mx-auto">
                                Tidak ada Kandidat
                            </h3>
                        @else
                            @foreach ($kandidat as $data)
                                <div class="col-md-3 mb-3">
                                    <div class="card">
                                        <img src="{{ asset('storage/' . $data->foto) }}" class="card-img-top"
                                            alt="foto-kandidat">
                                        <div class="card-body mx-auto p-3">
                                            <h1 class="card-title">{{ $data->nama_kandidat }}</h1>
                                        </div>
                                        <div class="card-footer text-center px-2 py-3">
                                            <form action="{{ route('kandidat.destroy', $data->id) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <a href="{{ route('kandidat.show', $data->id) }}"
                                                    class="btn btn-info btn-sm mb-1"><i class="fas fa-eye"></i>&nbsp;
                                                    Lihat</a>
                                                <a href="{{ route('kandidat.edit', $data->id) }}"
                                                    class="btn btn-primary btn-sm mb-1"><i class="fas fa-edit"></i>&nbsp;
                                                    Edit</a>
                                                <button type="submit" class="btn btn-danger btn-sm mb-1"><i
                                                        class="fas fa-trash"></i>&nbsp; Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="form-kandidat">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Data Kandidat</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('kandidat.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama_kandidat">Nama Kandidat</label>
                                    <input type="text" name="nama_kandidat" id="nama_kandidat" required
                                        class="form-control @error('nama_kandidat') is-invalid @enderror"
                                        value="{{ old('nama_kandidat') }}" placeholder="Nama Kandidat">
                                </div>
                                <div class="form-group">
                                    @php
                                        $tahun = date('Y');
                                    @endphp
                                    <label for="periode">Periode</label>
                                    <select id="periode" name="periode" required
                                        class="select2bs4 form-control @error('periode') is-invalid @enderror">
                                        <option value="">-- Pilih Periode --</option>
                                        @for ($i = -3; $i < 3; $i++)
                                            <option value="{{ $tahun + $i }}"
                                                @if (old('periode')) selected @endif>
                                                {{ $tahun + $i }} / {{ $tahun + $i + 1 }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="foto">Foto Kandidat</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="foto" required
                                                class="custom-file-input @error('foto') is-invalid @enderror"
                                                id="foto">
                                            <label class="custom-file-label" for="foto">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="visi">Visi</label>
                                    <input type="text" name="visi" id="visi"
                                        class="form-control @error('visi') is-invalid @enderror"
                                        value="{{ old('visi') }}" placeholder="Visi Kandidat">
                                </div>
                                <div class="form-group">
                                    <label for="misi">Misi</label>
                                    <input type="hidden" id="misi" name="misi" value="{{ old('misi') }}">
                                    <trix-editor input="misi"></trix-editor>
                                </div>
                            </div>
                        </div>

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i
                            class='nav-icon fas fa-arrow-left'></i> &nbsp; Keluar</button>
                    <button type="submit" class="btn btn-success swalDefaultSuccess"><i
                            class="nav-icon fas fa-save"></i>
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
        $("#dataKandidat").addClass("active");
    </script>
@endsection
