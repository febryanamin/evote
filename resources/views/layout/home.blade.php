<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-voting Pilketum</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{ asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <!-- Animate.css -->
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" /> --}}
    <link rel="stylesheet" href="{{ asset('dist/css/animate.css') }}">
    <!-- Slider -->
    <style type="text/css">
        #content-slider {
            position: relative;
            width: 400px;
            height: 300px;
            overflow: hidden;
        }

        #content-slider img {
            display: block;
            width: 400px;
            height: 300px;
        }

        .img-thanks {
            max-width: 400px;
            width: 100%;
            max-height: 450px;
        }
    </style>
    <!-- WOW -->
    {{-- <style>
        .wow:first-child {
            visibility: hidden;
        }
    </style> --}}
    <!-- Site Setting-->
    <style media="screen">
        body {
            background-color: #011b3b;
            color: #fff;
        }

        .img {
            height: 200px;
            width: auto;
        }

        .button.success {
            background-color: #059f3e;
            color: #ebebeb;
        }

        .button.success:hover,
        .button.success:focus {
            background-color: #22bb5b;
            color: #fefefe;
        }

        .nama {
            position: absolute;
            background: rgba(35, 35, 35, 0.624);
            width: 196px;
            top: 178px;
            font-size: 16px;
            padding: 3px 0px;
        }
    </style>
</head>

<body>
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>
        var url = "./golput.php"; // membuat url tujuan
        var count = 21; // membuat hitungan kedalam detik
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
        countDown();
    </script> --}}

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('plugins/jquery-cycle/jquery-cycle.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- SweetAlert2 -->
    <script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <!-- WOW -->
    <script src="{{ asset('dist/wow.min.js') }}"></script>
    <script>
        wow = new WOW({
            animateClass: 'animated',
            offset: 100,
            callback: function(box) {
                console.log("WOW: animating <" + box.tagName.toLowerCase() + ">")
            }
        });
        wow.init();
    </script>
    <!-- Slider -->
    <script type="text/javascript">
        $(document).ready(function() {
            $('#content-slider').cycle({
                fx: 'fade',
                speed: 1000,
                timeout: 500
            });
        });
    </script>
    @include('sweetalert::alert')
    @yield('script')
</body>

</html>
