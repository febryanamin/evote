@extends('layout.home')
@section('content')
    <div class="container" style="width: 970px">
        <div class="row">
            <div class="col-md-12" style="padding-right: 15px; padding-left: 15px">
                <div class="text-center" style="padding-top: 50px; margin-top: 20px; margin-bottom: 10px">
                    <h2>Selamat Datang di Aplikasi E - Voting</h2>
                    <h1>Marching Band Ekalavya Suara Brawijaya</h1>
                </div>

                <div class="row" style="padding-top: 50px;">
                    <div class="col-md-5" style="padding-right: 15px; padding-left: 15px; width:30%;">
                        <div id="content-slider">
                            <img src="{{ asset('img/sisebi.png') }}" class="img" style="max-width: 250px"
                                alt="Slideshow 1">
                            <img src="{{ asset('img/esb2.png') }}" class="img" style="max-width: 250px"
                                alt="Slideshow 2">
                            <img src="{{ asset('img/voting.png') }}" class="img" style="max-width: 250px"
                                alt="Slideshow 3">
                            <img src="{{ asset('img/esb1.png') }}" class="img" style="max-width: 250px"
                                alt="Slideshow 4">

                        </div>
                    </div>
                    <div class="col-md-7" style="margin-top: 60px; padding-right: 15px; padding-left: 15px">
                        <span style="font-size: 25px">Silahkan Login untuk dapat melakukan pemilihan</span>
                        <br />
                        <br />
                        <form action="{{ route('pemilih.login') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label style="font-size: 20px">Masukkan No. KTA :</label>
                                <input type="text" class="form-control" placeholder="No. KTA" required name="no_kta"
                                    onkeyup="this.value = this.value.toUpperCase();" />
                            </div>
                            <div class="text-right">
                                <input type="submit" name="submit" class="btn btn-danger btn-lg">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
