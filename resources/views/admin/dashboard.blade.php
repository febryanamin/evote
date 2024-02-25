@extends('template.admin')
@section('title', 'Dashboard')
@section('heading', 'Dashboard')
@section('page')
    <li class="breadcrumb-item active">Dashboard</li>
@endsection
@section('content')
    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
            <span class="info-box-icon bg-info"><i class="fas fa-users"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Jumlah Pemilih</span>
                <span class="info-box-number">{{ $jum_pemilih }}</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
            <span class="info-box-icon bg-success"><i class="fas fa-check"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Suara Sah</span>
                <span class="info-box-number">{{ $jum_suara }}</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
            <span class="info-box-icon bg-primary"><i class="fas fa-user-tie"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Jumlah Kandidat</span>
                <span class="info-box-number">{{ $jum_kandidat }}</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
            <span class="info-box-icon bg-secondary"><i class="fas fa-book"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Jabatan</span>
                <span class="info-box-number">{{ $jum_jabatan }}</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex">
                    <div id="pieChartSection" style="width:100%; height:300px;">3 section Basic bar</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex">
                    <div id="pieChartPemilih" style="width:100%; height:300px;">2 jumlah pemilih Basic column</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex">
                    <div id="pieChartPersentase" style="width:100%; height:300px;"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        Highcharts.chart('pieChartSection', {
            chart: {
                type: 'bar'
            },
            title: {
                align: 'center',
                text: 'Section'
            },
            accessibility: {
                announceNewData: {
                    enabled: true
                }
            },
            xAxis: {
                type: 'category'
            },
            yAxis: {
                title: {
                    text: undefined
                }
            },
            legend: {
                enabled: false
            },
            plotOptions: {
                series: {
                    borderWidth: 0,
                    dataLabels: {
                        enabled: true,
                        format: '{point.y}'
                    }
                }
            },
            tooltip: {
                pointFormat: '<b>{point.y}</b> pemilih<br/>'
            },
            series: [{
                name: 'Browsers',
                colorByPoint: true,
                data: {!! json_encode($dataSection) !!}
            }]
        });

        Highcharts.chart('pieChartPemilih', {
            chart: {
                type: 'column'
            },
            title: {
                align: 'center',
                text: 'Pemilih'
            },
            accessibility: {
                announceNewData: {
                    enabled: true
                }
            },
            xAxis: {
                type: 'category'
            },
            yAxis: {
                title: {
                    text: undefined
                }
            },
            legend: {
                enabled: false
            },
            plotOptions: {
                series: {
                    borderWidth: 0,
                    dataLabels: {
                        enabled: true,
                        format: '{point.y}'
                    }
                }
            },
            tooltip: {
                pointFormat: '<b>{point.y}</b> pemilih<br/>'
            },
            series: [{
                name: 'Browsers',
                colorByPoint: true,
                // pointWidth: 75,
                data: {!! json_encode($dataPemilih) !!}
            }]
        });

        Highcharts.chart('pieChartPersentase', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: 0,
                plotShadow: false
            },
            title: {
                text: 'Persentase<br>Suara',
                align: 'center',
                verticalAlign: 'middle',
                y: 20
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            accessibility: {
                point: {
                    valueSuffix: '%'
                }
            },
            plotOptions: {
                pie: {
                    dataLabels: {
                        enabled: true,
                        distance: -30,
                        style: {
                            fontWeight: 'bold',
                            color: 'white'
                        }
                    },
                    startAngle: -180,
                    endAngle: 180,
                    center: ['50%', '50%'],
                    size: '100%'
                }
            },
            series: [{
                type: 'pie',
                name: 'Persentase Suara',
                innerSize: '50%',
                data: {!! json_encode($dataPersentase) !!}
            }]
        });
    </script>
    <script>
        $("#dataDashboard").addClass("active");
    </script>
@endsection
