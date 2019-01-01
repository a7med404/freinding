@extends('admin.layouts.app')
@section('title') Public Users Statistics Page
@stop
@section('head_content')
    @include('admin.statistics.head')
@stop
@section('content')
    <!-- Main content -->

    <section class="content" xmlns="">
        <!--startjosh-->
        <div class="row row-eq-height">
            <div class="col-xs-4 col-md-5  margin_7 animated fadeInRightBig">
                <!-- Trans label pie charts strats here-->
                <div class="palebluecolorbg no-radius">
                    <div class="panel-body  squarebox square_boxs">
                        <div class="row">
                            <div class="col-xs-12 pull-left nopadmar">
                                <div class="row" style="margin-bottom: 10px;">
                                    <div class="square_box col-xs-7 pull-left">
                                        <span>TOTAL POST</span>
                                        <div class="number" id="myTargetElement4">8000</div>
                                    </div>
                                </div>
                                <div class="row align-items-end">
                                    <div class="col-md-2">
                                        <small class="stat-label">TODAY</small>
                                        <h4 id="myTargetElement4.1">10</h4>
                                    </div>
                                    <div class="col-md-3 text-center">
                                        <small class="stat-label">THIS WEEK</small>
                                        <h4 id="myTargetElement4.1">100</h4>
                                    </div>
                                    <div class="col-md-4 text-center">
                                        <small class="stat-label">THIS MONTH</small>
                                        <h4 id="myTargetElement4.1">1000</h4>
                                    </div>
                                    <div class="col-md-3 text-right">
                                        <small class="stat-label">THIS YEAR</small>
                                        <h4 id="myTargetElement4.2">10000</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-4  col-md-5 margin_7 animated fadeInDownBig">
                <!-- Trans label pie charts strats here-->
                <div class="goldbg  no-radius">
                    <div class="panel-body  squarebox square_boxs">
                        <div class="row">
                            <div class="col-xs-12 pull-left nopadmar">
                                <div class="row " style="margin-bottom: 10px;">
                                    <div class="square_box col-xs-7 pull-left">
                                        <span>AVERAGE POSTS BY USER</span>

                                        <div class="number" id="myTargetElement3">27.5</div>
                                    </div>
                                </div>
                                <div class="row align-items-end">
                                    <div class="col-md-3">
                                        <small class="stat-label">BY DAY</small>
                                        <h4 id="myTargetElement4.1">10</h4>
                                    </div>
                                    <div class="col-md-3 text-center">
                                        <small class="stat-label">BY WEEK</small>
                                        <h4 id="myTargetElement4.1">100</h4>
                                    </div>
                                    <div class="col-md-3 text-center">
                                        <small class="stat-label">BY MONTH</small>
                                        <h4 id="myTargetElement4.1">1000</h4>
                                    </div>
                                    <div class="col-md-3 text-right">
                                        <small class="stat-label">BY YEAR</small>
                                        <h4 id="myTargetElement4.2">10000</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-4  col-md-2 margin_7 animated fadeInDownBig" >
                <!-- Trans label pie charts strats here-->
                <div class="bg-info no-radius" style="margin-top: 10px ;align-content: center">
                    <div class="panel-body  squarebox square_boxs">
                        <div class="row">
                            <div class="  nopadmar">
                                <div class="row" >
                                    <div class="square_box ">
                                        <span style="margin-bottom: 10px;">AVERAGE MENTION</span>
                                        <div class="number " id="myTargetElement3" style="margin-bottom: 22px;"><P
                                                    CLASS="text-xs-center">2.5</P></div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row row-eq-height">
            <div class="col-lg-6">
                <!-- Tracking charts strats here-->
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <svg height="16" version="1.1" width="16"  style="overflow: hidden; position: relative; left: -0.5px; "
                                 id="canvas-for-livicon-47">
                                <use xlink:href="svg/bars-chart.svg#Layer_1"></use>
                            </svg> POSTS GROWTH
                        </h3>
                        <span class="pull-right">
                                    <i class="glyphicon glyphicon-chevron-up showhide clickable"
                                       title="Hide Panel content"></i>
                                    <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                                </span>
                    </div>

                    <canvas id="POSTS_GROWTH"></canvas>

                </div>
            </div>
            <div class="col-lg-6">
                <!-- Basic charts strats here-->
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <svg height="16" version="1.1" width="16"  style="overflow: hidden; position: relative; left: -0.5px; "
                                 id="canvas-for-livicon-47">
                                <use xlink:href="svg/bars-chart.svg#Layer_1"></use>
                            </svg> POSTS TYPE
                        </h4>
                        <span class="pull-right">
                                    <i class="fa fa-fw fa-chevron-up clickable"></i>
                                    <i class="fa fa-fw fa-times removepanel clickable"></i>
                                </span>
                    </div>
                    <canvas id="POST_TYPE"></canvas>
                </div>
            </div>
        </div>
        <div class="row row-eq-height">
            <div class="col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <svg height="16" version="1.1" width="16"  style="overflow: hidden; position: relative; left: -0.5px; "
                                 id="canvas-for-livicon-47">
                                <use xlink:href="svg/pie-chart.svg#Capa_1"></use>
                            </svg> POST PERIOD BY HOURS
                        </h3>
                        <span class="pull-right">
                                    <i class="glyphicon glyphicon-chevron-up showhide clickable"></i>
                                    <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                                </span>
                    </div>
                    <canvas id="POST_PERIOD_BY_HOURS"></canvas>
                </div>
            </div>
            <div class="col-lg-6">
                <!-- toggling series charts strats here-->
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <svg height="16" version="1.1" width="16"  style="overflow: hidden; position: relative; left: -0.5px; "
                                 id="canvas-for-livicon-47">
                                <use xlink:href="svg/bars-chart.svg#Layer_1"></use>
                            </svg> POST PERIOD BY DAYS
                        </h3>
                        <span class="pull-right">
                                    <i class="glyphicon glyphicon-chevron-up showhide clickable"
                                       title="Hide Panel content"></i>
                                    <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                                </span>
                    </div>
                    <canvas id="POST_PERIOD_BY_DAYS"></canvas>
                </div>
            </div>
        </div>
        <DIV class="row row-eq-height">
            <DIV class="col-lg-6"></DIV>
            <div class="col-lg-6">
                <!-- toggling series charts strats here-->
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                                <svg height="16" version="1.1" width="16"  style="overflow: hidden; position: relative; left: -0.5px; "
                                     id="canvas-for-livicon-47">
                                    <use xlink:href="svg/bars-chart.svg#Layer_1"></use>
                                </svg>
                             POST PERIOD BY MONTHS
                        </h3>
                        <span class="pull-right">
                                    <i class="glyphicon glyphicon-chevron-up showhide clickable"
                                       title="Hide Panel content"></i>
                                    <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                                </span>
                    </div>
                    <canvas id="POST_PERIOD_BY_MONTH"></canvas>
                </div>
            </div>
        </DIV>
        <!--endjosh-->
        <!--/row-->
    </section>
    <script>
        window.onload = function () {
            //LINE
            var ctx = document.getElementById("POSTS_GROWTH").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    title:'',
                        labels: ["JAN","FEB","MAR","APR","MAY","JUN","JUL"],
                        datasets: [{
                            data: [{
                                x: 10,
                                y: 20
                            }, {
                                x: 15,
                                y: 10
                            }],
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)',
                                'rgba(255, 99, 132, 0.8)',
                                'rgba(54, 162, 235, 0.8)',
                                'rgba(255, 206, 86, 0.8)',
                                'rgba(75, 192, 192, 0.8)',
                                'rgba(153, 102, 255, 0.8)',
                                'rgba(255, 159, 64, 0.8)',
                                'rgba(255, 99, 132, 0.4)',
                                'rgba(54, 162, 235, 0.4)',
                                'rgba(255, 206, 86, 0.4)',
                                'rgba(75, 192, 192, 0.4)',
                                'rgba(153, 102, 255, 0.4)',
                                'rgba(255, 159, 64, 0.4)',
                                'rgba(255, 99, 132, 0.6)',
                                'rgba(54, 162, 235, 0.6)',
                                'rgba(255, 206, 86, 0.6)',
                                'rgba(75, 192, 192, 0.6)',
                                'rgba(153, 102, 255, 0.6)',
                                'rgba(255, 159, 64, 0.6)',
                            ],

                            borderWidth: 2
                        }]
                    },
                options: {
                    animation: {
                        duration: 0, // general animation time
                    },
                    hover: {
                        animationDuration: 0, // duration of animations when hovering an item
                    },
                    responsiveAnimationDuration: 0, // animation duration after a resize
                }
            });

//POST_TYPE
            var ctx2 = document.getElementById("POST_TYPE");
            var myDoughnutChart = new Chart(ctx2, {
                type: 'doughnut',
                data: {
                    datasets: [{
                        data: [10, 20, 30],
                        backgroundColor: [
                            '#F5B041  ',
                            '#58D68D',

                            '#AED6F1'
                        ]
                    }],

                    // These labels appear in the legend and in the tooltips when hovering different arcs
                    labels: [
                        'TEXT',
                        'PHOTO',
                        'VIDEO'
                    ]
                }
            });
            //POST_PERIOD
            var ctx3 = document.getElementById("POST_PERIOD_BY_HOURS");
            var myDoughnutChart = new Chart(ctx3, {
                type: 'pie',

                data :{
                    datasets: [{
                        data: [10, 20, 30],
                        backgroundColor: [
                            '#2980B9',
                            '#F5B041',
                            '#27AE60'
                        ]
                    }],

                    // These labels appear in the legend and in the tooltips when hovering different arcs
                    labels: [
                        'TERNOON',
                        'MIDNINGH',
                        'MORNING'
                    ]

            } });
            var ctx4 = document.getElementById("POST_PERIOD_BY_DAYS");
            var myDoughnutChart = new Chart(ctx4, {
                title: '',
                type: 'bar',
                data: {
                    labels: ["1","2","3","4","5","6","7"],
                    datasets: [{
                        data: [0, 20, 40, 50],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(255, 99, 132, 0.8)',
                            'rgba(54, 162, 235, 0.8)',
                            'rgba(255, 206, 86, 0.8)',
                            'rgba(75, 192, 192, 0.8)',
                            'rgba(153, 102, 255, 0.8)',
                            'rgba(255, 159, 64, 0.8)',
                            'rgba(255, 99, 132, 0.4)',
                            'rgba(54, 162, 235, 0.4)',
                            'rgba(255, 206, 86, 0.4)',
                            'rgba(75, 192, 192, 0.4)',
                            'rgba(153, 102, 255, 0.4)',
                            'rgba(255, 159, 64, 0.4)',
                            'rgba(255, 99, 132, 0.6)',
                            'rgba(54, 162, 235, 0.6)',
                            'rgba(255, 206, 86, 0.6)',
                            'rgba(75, 192, 192, 0.6)',
                            'rgba(153, 102, 255, 0.6)',
                            'rgba(255, 159, 64, 0.6)',
                        ],
                        borderColor: [
                            'rgba(255,99,132,1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(255,99,132,1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(255,99,132,1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(255,99,132,1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',


                            'rgba(255, 159, 64, 1)',
                        ],
                        borderWidth: 2
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: false
                            }
                        }]
                    }
                }
            });
            var ctx5 = document.getElementById("POST_PERIOD_BY_MONTH");

            var myDoughnutChart = new Chart(ctx5, {
                title: '',
                type: 'bar',
                data: {
                    labels: ["1","2","3","4","5","5","7","8","9","10","11","12"],
                    datasets: [{
                        data: [0, 20, 40, 50],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(255, 99, 132, 0.8)',
                            'rgba(54, 162, 235, 0.8)',
                            'rgba(255, 206, 86, 0.8)',
                            'rgba(75, 192, 192, 0.8)',
                            'rgba(153, 102, 255, 0.8)',
                            'rgba(255, 159, 64, 0.8)',
                            'rgba(255, 99, 132, 0.4)',
                            'rgba(54, 162, 235, 0.4)',
                            'rgba(255, 206, 86, 0.4)',
                            'rgba(75, 192, 192, 0.4)',
                            'rgba(153, 102, 255, 0.4)',
                            'rgba(255, 159, 64, 0.4)',
                            'rgba(255, 99, 132, 0.6)',
                            'rgba(54, 162, 235, 0.6)',
                            'rgba(255, 206, 86, 0.6)',
                            'rgba(75, 192, 192, 0.6)',
                            'rgba(153, 102, 255, 0.6)',
                            'rgba(255, 159, 64, 0.6)',
                        ],
                        borderColor: [
                            'rgba(255,99,132,1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(255,99,132,1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(255,99,132,1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(255,99,132,1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',


                            'rgba(255, 159, 64, 1)',
                        ],
                        borderWidth: 2
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: false
                            }
                        }]
                    }
                }
            });
        }
    </script>
@stop
