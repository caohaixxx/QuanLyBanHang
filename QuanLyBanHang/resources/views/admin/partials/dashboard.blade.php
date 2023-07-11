@extends('admin.layout.master')

@section('addcssadmin')
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <link rel="stylesheet" href="{{ asset('assets/admin/dist/css/product.css') }}">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{ asset('assets/admin/dist/css/dashboard.css') }}">
@endsection
@section('bodyadmin')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Dashboard</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- Default box -->
                    <div class="amount">
                        <div class="item">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>{{ $countCustomer }}</h3>

                                    <p>Khách hàng</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="item">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>{{ $countProdut }}</h3>

                                    <p>Sản phẩm</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="item">
                            <!-- small box -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3>{{ $countOrder }}</h3>

                                    <p>Đơn hàng</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>{{ $countOrderSus }}</h3>

                                    <p>Đơn hàng thành công</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="item">
                            <!-- small box -->
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3>{{ $countOrderCancel }}</h3>

                                    <p>Đơn hàng hủy</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-pie-graph"></i>
                                </div>
                            </div>
                        </div>
                        <!-- ./col -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <div class="col-md-12">
                <!-- BAR CHART -->
                <div class="d-flex">
                    <div class="col-3">
                        <div class="form-group">
                            <label>Từ:</label>
                            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                <input name="from" type="text" class="form-control datetimepicker-input"
                                    data-target="#reservationdate" />
                                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label>Đến:</label>
                            <div class="input-group date" id="reservationdate2" data-target-input="nearest">
                                <input name="to" type="text" class="form-control datetimepicker-input"
                                    data-target="#reservationdate2" />
                                <div class="input-group-append" data-target="#reservationdate2"
                                    data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="filter"><button id="fillter" type="submit" class="btn btn-primary ">Lọc</button></div>
                </div>

            </div>
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Thống kê doanh số</h3>
                </div>
                <div class="card-body">
                    <div class="chart">
                        <canvas id="barChart"
                            style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Thống kê loại đơn hàng</h3>
                        </div>
                        <div class="card-body">
                            <div id="donut" style="height: 250px;"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Thống kê</h3>
                        </div>
                        <div class="card-body">
                            <div>
                                <label for="">Sản phẩm nhiều lượt xem:</label>
                                <ul>
                                    @foreach ($proView as $item)
                                        <li><p>{{$item->name}}: <span>{{$item->view_count}}</span></p></li>
                                    @endforeach
                                </ul>
                            </div>
                            <div>
                                <label for="">Sản phẩm nhiều đánh giá:</label>
                                <ul>
                                    @foreach ($proRate as $item)
                                        <li><p>{{$item->name}}: <span>{{number_format($item->rating, 2)}}</span></p></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card -->
        </div>
        </div>
    </section>
@endsection

@section('addjsadmin')
    <script src="{{ asset('assets/admin/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}">
    </script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <script src="{{ asset('assets/admin/dist/js/dashboard.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/chart.js/Chart.min.js') }}"></script>
    <script>
        $(document).ready(function(){
        var chart = Morris.Donut({
            element: 'donut',
            resize: true,
            colors: [
                '#ffc107',
                '#17a2b8',
                '#28a745',
                '#dc3545',
            ],
            data:[
                {label:"Chưa xử lý", value:{{$countOrderPen}}},
                {label:"Đang giao", value:{{$countOrderDeli}}},
                {label:"Thành công", value:{{$countOrderSus}}},
                {label:"Đã hủy", value:{{$countOrderCancel}}},
            ]

        })
    })
    </script>
@endsection
