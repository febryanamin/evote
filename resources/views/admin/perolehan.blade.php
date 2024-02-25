@extends('template.admin')
@section('title', 'Perolehan')
@section('heading', 'Perolehan Suara')
@section('page')
    <li class="breadcrumb-item active">Perolehan</li>
@endsection
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-4">
                        <form action="{{ route('perolehan') }}">
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
                        <form action="{{ route('hapus.suara') }}" method="POST">
                            @csrf
                            <input type="hidden" name="periode" id="periode"
                                value="{{ request('periode') ?? date('Y') }}">
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="nav-icon fas fa-trash"></i>&nbsp; Hapus Suara
                            </button>
                        </form>

                    </div>
                </div>
            </div>
            <div class="card-body">
                <div id="pieChartPerolehan"></div>
            </div>
        </div>
        {{-- <div class="pieChartPerolehan"></div> --}}
    </div>
@endsection
@section('script')
    <script>
        Highcharts.chart('pieChartPerolehan', {
            chart: {
                type: 'pie'
            },
            title: {
                text: 'Hasil Perolehan Suara'
            },
            tooltip: {
                valueSuffix: '%'
            },
            plotOptions: {
                series: {
                    allowPointSelect: false,
                    cursor: 'pointer',
                    dataLabels: [{
                        enabled: true,
                        distance: 25
                    }, {
                        enabled: true,
                        distance: -50,
                        format: '{point.percentage:.1f}%',
                        style: {
                            fontSize: '1.2em',
                            textOutline: 'none',
                            opacity: 0.7
                        },
                        // filter: {
                        //     operator: '>',
                        //     property: 'percentage',
                        //     value: 10
                        // }
                    }]
                }
            },
            series: [{
                name: 'Perolehan Suara',
                colorByPoint: true,
                data: {!! json_encode($dataSuara) !!}
            }]
        });
    </script>
    <script>
        $("#dataPerolehan").addClass("active");
    </script>
@endsection
