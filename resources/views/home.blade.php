@extends('layouts.global')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <h1>
            {{Auth::user()->name}}
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif
            <small>You are logged in!</small>
        </h1>
        @if(Auth::user()->divisi == "SERVER")
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Server</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-widget="remove"><i class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="chart-responsive">
                                    <canvas id="pieChart1" height="150"></canvas>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <ul class="chart-legend clearfix">
                                    <li><i class="fa fa-circle-o text-success"></i> Approved</li>
                                    <li><i class="fa fa-circle-o text-warning"></i> Pending</li>
                                    <li><i class="fa fa-circle-o text-danger"></i> Dissaproved</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">User OS</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-widget="remove"><i class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="chart-responsive">
                                    <canvas id="pieChart2" height="150"></canvas>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <ul class="chart-legend clearfix">
                                    <li><i class="fa fa-circle-o text-success"></i> Approved</li>
                                    <li><i class="fa fa-circle-o text-warning"></i> Pending</li>
                                    <li><i class="fa fa-circle-o text-danger"></i> Dissaproved</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-sm-6 col-md-2">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-info elevation-1"><i class="fa fa-file-text"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Requests</span>
                        <span class="info-box-number">{{$allrs}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <div class="col-12 col-sm-6 col-md-2">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fa fa-check-square-o"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Approved</span>
                        <span class="info-box-number">{{$approvedrs}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <div class="col-12 col-sm-6 col-md-2">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-warning elevation-1"><i class="fa  fa-hourglass-2"  style="color:white"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Pending</span>
                        <span class="info-box-number">{{$pendingrs}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>

            <div class="col-12 col-sm-6 col-md-2">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-info elevation-1"><i class="fa fa-file-text"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Requests</span>
                        <span class="info-box-number">{{$allos}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <div class="col-12 col-sm-6 col-md-2">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fa fa-check-square-o"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Approved</span>
                        <span class="info-box-number">{{$approvedos}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <div class="col-12 col-sm-6 col-md-2">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-warning elevation-1"><i class="fa  fa-hourglass-2"  style="color:white"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Pending</span>
                        <span class="info-box-number">{{$pendingos}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
        </div>
        <script src="{{asset('plugins/chartjs-old/Chart.min.js')}}"></script>
        <script src="{{asset ('plugins/jquery/jquery.js')}}"></script>
        <script>
            $(function() {
                var all = "<?php echo $allfw; ?>";
                var pendingfw = "<?php echo $pendingfw; ?>";
                var approvedfw = "<?php echo $approvedfw; ?>";
                var dissaprovedfw = "<?php echo $dissaprovedfw; ?>";

                var allrs = "<?php echo $allrs; ?>";
                var pendingrs = "<?php echo $pendingrs; ?>";
                var approvedrs = "<?php echo $approvedrs; ?>";
                var dissaprovedrs = "<?php echo $dissaprovedrs; ?>";

                var allos = "<?php echo $allos; ?>";
                var pendingos = "<?php echo  $pendingos; ?>";
                var approvedos = "<?php echo  $approvedos; ?>";
                var dissaprovedos = "<?php echo $dissaprovedos; ?>";

                var allol = "<?php echo $allol; ?>";
                var pendingol = "<?php echo  $pendingol; ?>";
                var approvedol = "<?php echo  $approvedol; ?>";
                var dissaprovedol = "<?php echo $dissaprovedol; ?>";
                //-------------
                //- PIE CHART -
                //-------------
                // Get context with jQuery - using jQuery's .get() method.
                var pieChartCanvas = $('#pieChart1').get(0).getContext('2d')
                var pieChart = new Chart(pieChartCanvas)
                var PieData = [{
                        value: approvedrs,
                        color: '#00a65a',
                        highlight: '#00a65a',
                        label: 'Approved Request'
                    },
                    {
                        value: pendingrs,
                        color: '#f39c12',
                        highlight: '#f39c12',
                        label: 'Pending Request'
                    },
                    {
                        value: dissaprovedrs,
                        color: '#DC3545',
                        highlight: '#DC3545',
                        label: 'Dissaproved Request'
                    }
                ]
                var pieOptions = {
                    //Boolean - Whether we should show a stroke on each segment
                    segmentShowStroke: true,
                    //String - The colour of each segment stroke
                    segmentStrokeColor: '#fff',
                    //Number - The width of each segment stroke
                    segmentStrokeWidth: 2,
                    //Number - The percentage of the chart that we cut out of the middle
                    percentageInnerCutout: 50, // This is 0 for Pie charts
                    //Number - Amount of animation steps
                    animationSteps: 100,
                    //String - Animation easing effect
                    animationEasing: 'easeOutBounce',
                    //Boolean - Whether we animate the rotation of the Doughnut
                    animateRotate: true,
                    //Boolean - Whether we animate scaling the Doughnut from the centre
                    animateScale: true,
                    //Boolean - whether to make the chart responsive to window resizing
                    responsive: true,
                    // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
                    maintainAspectRatio: true,
                    //String - A legend template
                    legendTemplate: '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<segments.length; i++){%><li><span style="background-color:<%=segments[i].fillColor%>"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>'
                }
                //Create pie or douhnut chart
                // You can switch between pie and douhnut using the method below.
                pieChart.Doughnut(PieData, pieOptions)

                var pieChartCanvas = $('#pieChart2').get(0).getContext('2d')
                var pieChart = new Chart(pieChartCanvas)
                var PieData1 = [{
                        value: approvedos,
                        color: '#00a65a',
                        highlight: '#00a65a',
                        label: 'Approved Request'
                    },
                    {
                        value: pendingos,
                        color: '#f39c12',
                        highlight: '#f39c12',
                        label: 'Pending Request'
                    },
                    {
                        value: dissaprovedos,
                        color: '#DC3545',
                        highlight: '#DC3545',
                        label: 'Dissaproved Request'
                    }
                ]
                var pieOptions = {
                    //Boolean - Whether we should show a stroke on each segment
                    segmentShowStroke: true,
                    //String - The colour of each segment stroke
                    segmentStrokeColor: '#fff',
                    //Number - The width of each segment stroke
                    segmentStrokeWidth: 2,
                    //Number - The percentage of the chart that we cut out of the middle
                    percentageInnerCutout: 50, // This is 0 for Pie charts
                    //Number - Amount of animation steps
                    animationSteps: 100,
                    //String - Animation easing effect
                    animationEasing: 'easeOutBounce',
                    //Boolean - Whether we animate the rotation of the Doughnut
                    animateRotate: true,
                    //Boolean - Whether we animate scaling the Doughnut from the centre
                    animateScale: true,
                    //Boolean - whether to make the chart responsive to window resizing
                    responsive: true,
                    // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
                    maintainAspectRatio: true,
                    //String - A legend template
                    legendTemplate: '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<segments.length; i++){%><li><span style="background-color:<%=segments[i].fillColor%>"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>'
                }
                //Create pie or douhnut chart
                // You can switch between pie and douhnut using the method below.
                pieChart.Doughnut(PieData1, pieOptions)
            })
        </script>
        @elseif(Auth::user()->divisi == "NETWORK")
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Firewall Access</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-widget="remove"><i class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="chart-responsive">
                                    <canvas id="pieChart3" height="150"></canvas>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <ul class="chart-legend clearfix">
                                    <li><i class="fa fa-circle-o text-success"></i> Approved</li>
                                    <li><i class="fa fa-circle-o text-warning"></i> Pending</li>
                                    <li><i class="fa fa-circle-o text-danger"></i> Dissaproved</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Order Link</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-widget="remove"><i class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="chart-responsive">
                                    <canvas id="pieChart4" height="150"></canvas>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <ul class="chart-legend clearfix">
                                    <li><i class="fa fa-circle-o text-success"></i> Approved</li>
                                    <li><i class="fa fa-circle-o text-warning"></i> Pending</li>
                                    <li><i class="fa fa-circle-o text-danger"></i> Dissaproved</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-sm-6 col-md-2">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-info elevation-1"><i class="fa fa-file-text"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Requests</span>
                        <span class="info-box-number">{{$allfw}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <div class="col-12 col-sm-6 col-md-2">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fa fa-check-square-o"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Approved</span>
                        <span class="info-box-number">{{$approvedfw}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <div class="col-12 col-sm-6 col-md-2">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-warning elevation-1"><i class="fa  fa-hourglass-2"  style="color:white"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Pending</span>
                        <span class="info-box-number">{{$pendingfw}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>

            <div class="col-12 col-sm-6 col-md-2">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-info elevation-1"><i class="fa fa-file-text"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Requests</span>
                        <span class="info-box-number">{{$allol}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <div class="col-12 col-sm-6 col-md-2">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fa fa-check-square-o"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Approved</span>
                        <span class="info-box-number">{{$approvedol}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <div class="col-12 col-sm-6 col-md-2">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-warning elevation-1"><i class="fa  fa-hourglass-2"  style="color:white"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Pending</span>
                        <span class="info-box-number">{{$pendingol}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
        </div>
        <script src="{{asset('plugins/chartjs-old/Chart.min.js')}}"></script>
        <script src="{{asset ('plugins/jquery/jquery.js')}}"></script>
        <script>
            $(function() {
                var all = "<?php echo $allfw; ?>";
                var pendingfw = "<?php echo $pendingfw; ?>";
                var approvedfw = "<?php echo $approvedfw; ?>";
                var dissaprovedfw = "<?php echo $dissaprovedfw; ?>";

                var allrs = "<?php echo $allrs; ?>";
                var pendingrs = "<?php echo $pendingrs; ?>";
                var approvedrs = "<?php echo $approvedrs; ?>";
                var dissaprovedrs = "<?php echo $dissaprovedrs; ?>";

                var allos = "<?php echo $allos; ?>";
                var pendingos = "<?php echo  $pendingos; ?>";
                var approvedos = "<?php echo  $approvedos; ?>";
                var dissaprovedos = "<?php echo $dissaprovedos; ?>";

                var allol = "<?php echo $allol; ?>";
                var pendingol = "<?php echo  $pendingol; ?>";
                var approvedol = "<?php echo  $approvedol; ?>";
                var dissaprovedol = "<?php echo $dissaprovedol; ?>";
                //-------------
                //- PIE CHART -
                //-------------
                // Get context with jQuery - using jQuery's .get() method.
                var pieChartCanvas = $('#pieChart3').get(0).getContext('2d')
                var pieChart = new Chart(pieChartCanvas)
                var PieData2 = [{
                        value: approvedfw,
                        color: '#00a65a',
                        highlight: '#00a65a',
                        label: 'Approved Request'
                    },
                    {
                        value: pendingfw,
                        color: '#f39c12',
                        highlight: '#f39c12',
                        label: 'Pending Request'
                    },
                    {
                        value: dissaprovedfw,
                        color: '#DC3545',
                        highlight: '#DC3545',
                        label: 'Dissaproved Request'
                    }
                ]
                var pieOptions = {
                    //Boolean - Whether we should show a stroke on each segment
                    segmentShowStroke: true,
                    //String - The colour of each segment stroke
                    segmentStrokeColor: '#fff',
                    //Number - The width of each segment stroke
                    segmentStrokeWidth: 2,
                    //Number - The percentage of the chart that we cut out of the middle
                    percentageInnerCutout: 50, // This is 0 for Pie charts
                    //Number - Amount of animation steps
                    animationSteps: 100,
                    //String - Animation easing effect
                    animationEasing: 'easeOutBounce',
                    //Boolean - Whether we animate the rotation of the Doughnut
                    animateRotate: true,
                    //Boolean - Whether we animate scaling the Doughnut from the centre
                    animateScale: true,
                    //Boolean - whether to make the chart responsive to window resizing
                    responsive: true,
                    // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
                    maintainAspectRatio: true,
                    //String - A legend template
                    legendTemplate: '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<segments.length; i++){%><li><span style="background-color:<%=segments[i].fillColor%>"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>'
                }
                //Create pie or douhnut chart
                // You can switch between pie and douhnut using the method below.
                pieChart.Doughnut(PieData2, pieOptions)

                var pieChartCanvas = $('#pieChart4').get(0).getContext('2d')
                var pieChart = new Chart(pieChartCanvas)
                var PieData3 = [{
                        value: approvedol,
                        color: '#00a65a',
                        highlight: '#00a65a',
                        label: 'Approved Request'
                    },
                    {
                        value: pendingol,
                        color: '#f39c12',
                        highlight: '#f39c12',
                        label: 'Pending Request'
                    },
                    {
                        value: dissaprovedol,
                        color: '#DC3545',
                        highlight: '#DC3545',
                        label: 'Dissaproved Request'
                    }
                ]
                var pieOptions = {
                    //Boolean - Whether we should show a stroke on each segment
                    segmentShowStroke: true,
                    //String - The colour of each segment stroke
                    segmentStrokeColor: '#fff',
                    //Number - The width of each segment stroke
                    segmentStrokeWidth: 2,
                    //Number - The percentage of the chart that we cut out of the middle
                    percentageInnerCutout: 50, // This is 0 for Pie charts
                    //Number - Amount of animation steps
                    animationSteps: 100,
                    //String - Animation easing effect
                    animationEasing: 'easeOutBounce',
                    //Boolean - Whether we animate the rotation of the Doughnut
                    animateRotate: true,
                    //Boolean - Whether we animate scaling the Doughnut from the centre
                    animateScale: true,
                    //Boolean - whether to make the chart responsive to window resizing
                    responsive: true,
                    // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
                    maintainAspectRatio: true,
                    //String - A legend template
                    legendTemplate: '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<segments.length; i++){%><li><span style="background-color:<%=segments[i].fillColor%>"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>'
                }
                //Create pie or douhnut chart
                // You can switch between pie and douhnut using the method below.
                pieChart.Doughnut(PieData3, pieOptions)
            })
        </script>
        @endif
    </div>
</section>
@endsection