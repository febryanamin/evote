@extends('template.admin')
@section('title', 'Kandidat')
@section('heading', 'Edit Kandidat')
@section('page')
    <li class="breadcrumb-item"><a href="{{ route('kandidat.index', ['periode' => $kandidat->periode]) }}">Kandidat</a></li>
    <li class="breadcrumb-item active">Edit Kandidat</li>
@endsection
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('kandidat.show', $kandidat->id) }}" class="btn btn-default"><i
                        class='nav-icon fas fa-arrow-left'></i> &nbsp; Kembali</a> &nbsp;
            </div>
            <form action="{{ route('kandidat.update', $kandidat->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="foto">Foto Kandidat</label>
                                <input type="hidden" name="fotoLama" id="fotoLama" value="{{ $kandidat->foto }}">
                                <img src="{{ asset('storage/' . $kandidat->foto) }}" alt="foto-kandidat"
                                    class="card-img img-preview img-fluid mb-3 d-block">
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="foto" id="foto"
                                            class="custom-file-input @error('foto') is-invalid @enderror"
                                            onchange="previewImage()">
                                        <label class="custom-file-label" for="foto">Choose file</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="form-group">
                                <label for="nama_kandidat">Nama Kandidat</label>
                                <input type="text" name="nama_kandidat" id="nama_kandidat" required
                                    class="form-control @error('nama_kandidat') is-invalid @enderror"
                                    value="{{ $kandidat->nama_kandidat }}" placeholder="Nama Kandidat">
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
                                            @if ($kandidat->periode == $tahun + $i) selected @endif>
                                            {{ $tahun + $i }} / {{ $tahun + $i + 1 }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="visi">Visi</label>
                                <input type="text" name="visi" id="visi" required
                                    class="form-control @error('visi') is-invalid @enderror" value="{{ $kandidat->visi }}"
                                    placeholder="Visi Kandidat">
                            </div>
                            <div class="form-group">
                                <label for="misi">Misi</label>
                                <input type="hidden" id="misi" name="misi"
                                    value="{{ old('misi', $kandidat->misi) }}">
                                <trix-editor input="misi"></trix-editor>
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
        function previewImage() {
            const image = document.querySelector('#foto');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
    <script>
        $("#dataKandidat").addClass("active");
    </script>
@endsection
