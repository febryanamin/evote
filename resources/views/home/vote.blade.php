@extends('layout.home')
@section('content')
    <div class="text-center" style="padding-top:20px;">
        <h1>Daftar Kandidat Ketua Umum</h1>
        <h2>Marching Band Ekalavya Suara Brawijaya</h2>
        <h2>Periode {{ date('Y') }} / {{ date('Y') + 1 }}</h2>
        @if ($kandidat->isEmpty())
            <a href="{{ route('home') }}" class="btn btn-info"><i class="fas fa-arrow-left"></i>&nbsp; Kembali</a>
        @else
            <div id="countdown">
                <div id="msg" style = "font-size: 20px"></div>
            </div>
        @endif

    </div>
    <hr color="white" style="border: 1px solid white;" width="75%">
    <div class="container">
        <div class="row justify-content-center">
            @if ($kandidat->isEmpty())
                <h3 class="mx-auto mt-3">
                    -- Tidak ada Kandidat --
                </h3>
            @else
                @foreach ($kandidat as $data)
                    <div class="col-md-3 text-center">
                        <section class="wow fadeInDown" data-wow-delay="{{ $loop->iteration }}s">
                            <div class="card">
                                <img src="{{ asset('storage/' . $data->foto) }}" alt="foto-kandidat">

                                <div class="card-body mx-auto" style="padding: 1rem">
                                    <h1 class="card-title" style="color: black">{{ $data->nama_kandidat }}</h1>
                                </div>

                                <div class="card-footer">
                                    <form action="{{ route('vote', $pemilih->id) }}" method="post">
                                        @csrf
                                        <input type="hidden" name="kandidat_id" id="kandidat_id"
                                            value="{{ $data->id }}">
                                        <button type="submit" class="btn btn-success btn-md btn-block"><i
                                                class="fa fa-plus"></i>&nbsp;
                                            Beri Suara</button>
                                    </form>
                                </div>
                            </div>
                        </section>
                    </div>
                @endforeach
            @endif

        </div>
    </div>
@endsection
@section('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>
        var url = "{{ route('golput', $pemilih->id) }}"; // membuat url tujuan
        var count = 20; // membuat hitungan kedalam detik

        document.addEventListener('DOMContentLoaded', function() {
            const myDiv = document.getElementById('countdown');

            if (myDiv.style.display !== 'none') {
                // Jalankan function
                countDown();
            }
        });

        function countDown() {
            if (count > 0) {
                count--;
                var waktu = count + 1;
                $('#msg').html('Sisa waktu anda: ' + waktu + ' detik' + '<i>');
                setTimeout("countDown()", 1000);
            } else {
                window.location.href = url;
            }
        }
    </script>
@endsection
