@extends('template.admin')
@section('title', 'Kandidat')
@section('heading', 'Detail Kandidat')
@section('page')
    <li class="breadcrumb-item"><a href="{{ route('kandidat.index', ['periode' => $kandidat->periode]) }}">Kandidat</a></li>
    <li class="breadcrumb-item active">Detail Kandidat</li>
@endsection
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('kandidat.index', ['periode' => $kandidat->periode]) }}" class="btn btn-default btn-sm"><i
                        class='nav-icon fas fa-arrow-left'></i> &nbsp; Kembali</a>
            </div>
            <div class="card-body">
                <div class="row no-gutters ml-2 mb-2 mr-2">
                    <div class="col-md-4 pr-4 mb-4">
                        <img src="{{ asset('storage/' . $kandidat->foto) }}" alt="foto-kandidat"
                            class="card-img img-details">
                    </div>
                    {{-- <div class="col-md-1"></div> --}}
                    <div class="col-md-8">
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <td width="150">Nama Kandidat</td>
                                    <td>:</td>
                                    <td>{{ $kandidat->nama_kandidat }}</td>
                                </tr>
                                <tr>
                                    <td>Periode</td>
                                    <td>:</td>
                                    <td>{{ $kandidat->periode }} / {{ $kandidat->periode + 1 }}</td>
                                </tr>
                                <tr>
                                    <td>Visi</td>
                                    <td>:</td>
                                    <td>{{ $kandidat->visi }}</td>
                                </tr>
                                <tr>
                                    <td>Misi</td>
                                    <td>:</td>
                                    <td>{!! $kandidat->misi !!}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card-footer text-right">
                <a href="{{ route('kandidat.edit', $kandidat->id) }}" class="btn btn-primary"><i
                        class='nav-icon fas fa-edit'></i> &nbsp; Edit</a> &nbsp;
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $("#dataKandidat").addClass("active");
    </script>
@endsection
