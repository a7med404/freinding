
@extends('admin.layouts.app')
@section('title') Public Users Statistics Page
@stop
@section('head_content')
@include('admin.statistics.head')
@stop
@section('content')
<section class="content">
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 margin_10 animated fadeInLeftBig">
            <!-- Trans label pie charts strats here-->
            <div class="lightbluebg no-radius">
                <div class="panel-body squarebox square_boxs">
                    <div class="col-xs-12 pull-left nopadmar">
                        <div class="row">
                            <div class="square_box col-xs-7 pull-left">
                                <span> TOTAL USERS</span>
                                <div class="number" id="myTargetElement1">{{ $user_count }}</div>
                            </div>
                            <i class="livicon  pull-right" data-name="eye-open" data-l="true" data-c="#fff" data-hc="#fff" data-s="70"></i>
                        </div>
                        <div class="row">
                            <div class="col-xs-6">
                                <!--statics-num-->
                                <small class="stat-label">MALE</small>
                                <h4 id="myTargetElement1.1">{{$user_male}}%</h4>
                            </div>
                            <div class="col-xs-6">
                                <small class="stat-label">Female</small>
                                <h4 id="myTargetElement1.1">{{$user_female}}%</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12 margin_10 animated fadeInRightBig">
            <!-- Trans label pie charts strats here-->
            <div class="palebluecolorbg no-radius">
                <div class="panel-body squarebox square_boxs">
                    <div class="col-xs-12 pull-left nopadmar">
                        <div class="row">
                            <div class="square_box col-xs-7 pull-left">
                                <span>New USERS </span>
                                <div class="number" id="myTargetElement4">{{ $user_year }}</div>
                            </div>
                            <i class="livicon pull-right" data-name="users" data-l="true" data-c="#fff" data-hc="#fff" data-s="70"></i>
                        </div>
                        <div class="row">
                            <div class="col-xs-3">
                                <small class="stat-label">TODAY</small>
                                <h4 id="myTargetElement1.1">{{ $user_count_day }}</h4>
                            </div>
                            <div class="col-xs-3">
                                <small class="stat-label">THIS WEEK</small>
                                <h4 id="myTargetElement3.1">{{$user_count_week}}</h4>
                            </div>
                            <div class="col-xs-3">
                                <small class="stat-label">THIS MONTH</small>
                                <h4 id="myTargetElement2.1">{{$user_count_month}}</h4>
                            </div>
                            <div class="col-xs-3">
                                <small class="stat-label">THIS YEAR</small>
                                <h4 id="myTargetElement4.1">{{ $user_year }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 col-md-6 margin_10 animated fadeInDownBig">
            <!-- Trans label pie charts strats here-->
            <div class="goldbg no-radius">
                <div class="panel-body squarebox square_boxs">
                    <div class="col-xs-12 pull-left nopadmar">
                        <div class="row">
                            <div class="square_box col-xs-7 pull-left">
                                <span>AGE AVERAGE</span>
                                <div class="number" id="myTargetElement3">{{$age_avg}}</div>
                            </div>
                            <i class="livicon pull-right" data-name="archive-add" data-l="true" data-c="#fff" data-hc="#fff" data-s="70"></i>
                        </div>
                        <div class="row">
                            <div class="col-xs-6">
                                <!--statics-num-->
                                <small class="stat-label">MALE</small>
                                <h4 id="myTargetElement1.1">{{$age_male}}</h4>
                            </div>
                            <div class="col-xs-6">
                                <small class="stat-label">Female</small>
                                <h4 id="myTargetElement1.1">{{$age_female}}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <!-- Basic charts strats here-->
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <i class="livicon" data-name="barchart" data-size="18" data-c="#fff" data-hc="#fff" data-loop="true"></i>GROWTH USERS CHART
                    </h4>
                    <span class="pull-right">
                        <i class="fa fa-fw fa-chevron-up clickable"></i>
                        <i class="fa fa-fw fa-times removepanel clickable"></i>
                    </span>
                </div>
                <div class="panel-body">
                    <div>
                        <canvas id="bar-chart" width="800" height="300"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <!-- Basic charts strats here-->
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <i class="livicon" data-name="barchart" data-size="18" data-c="#fff" data-hc="#fff" data-loop="true"></i>LIFETIME TYPE
                    </h4>
                    <span class="pull-right">
                        <i class="fa fa-fw fa-chevron-up clickable"></i>
                        <i class="fa fa-fw fa-times removepanel clickable"></i>
                    </span>
                </div>
                <div class="panel-body">
                    <div>
                        <canvas id="doughnut-chart" width="800" height="300"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row -->
    <div class="row ">
        <div class="col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="livicon" data-name="piechart" data-size="16" data-loop="true" data-c="#fff" data-hc="#fff"></i>REGISTRATION PERIOD
                    </h3>
                    <span class="pull-right">
                        <i class="glyphicon glyphicon-chevron-up showhide clickable"></i>
                        <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                    </span>
                </div>
                <div class="panel-body">
                    <div id="pie1"></div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="livicon" data-name="piechart" data-size="16" data-loop="true" data-c="#fff" data-hc="#fff"></i>GRGISTRTION DAYS
                    </h3>
                    <span class="pull-right">
                        <i class="glyphicon glyphicon-chevron-up showhide clickable"></i>
                        <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                    </span>
                </div>
                <div class="panel-body">
                    <div id="pie3"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- row -->
    <div class="row">
        <div class="col-lg-6 hidden">
            <!-- Basic charts strats here-->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <i class="livicon" data-name="barchart" data-size="18" data-c="#fff" data-hc="#fff" data-loop="true"></i> Pie Charts
                    </h4>
                    <span class="pull-right">
                        <i class="fa fa-fw fa-chevron-up clickable"></i>
                        <i class="fa fa-fw fa-times removepanel clickable"></i>
                    </span>
                </div>
                <div class="panel-body">
                    <div>
                        <canvas id="pie-chart" width="800" height="300"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="livicon" data-name="piechart" data-size="16" data-loop="true" data-c="#fff" data-hc="#fff"></i>AGE TYPE
                    </h3>
                    <span class="pull-right">
                        <i class="glyphicon glyphicon-chevron-up showhide clickable"></i>
                        <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                    </span>
                </div>
                <div class="panel-body">
                    <div id="pie4"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <!-- Basic charts strats here-->
            <div class="panel panel-primary hidden">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <i class="livicon" data-name="barchart" data-size="18" data-c="#fff" data-hc="#fff" data-loop="true"></i> Line Chart
                    </h4>
                    <span class="pull-right">
                        <i class="fa fa-fw fa-chevron-up clickable"></i>
                        <i class="fa fa-fw fa-times removepanel clickable"></i>
                    </span>
                </div>
                <div class="panel-body">
                    <div>
                        <canvas id="line-chart" width="800" height="300"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row -->
    <div class="row">
        <div class="col-lg-6">
            <!-- Basic charts strats here-->
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <i class="livicon" data-name="barchart" data-size="18" data-c="#fff" data-hc="#fff" data-loop="true"></i>TOP LIVING CITIES
                    </h4>
                    <span class="pull-right">
                        <i class="fa fa-fw fa-chevron-up clickable"></i>
                        <i class="fa fa-fw fa-times removepanel clickable"></i>
                    </span>
                </div>
                <div class="panel-body">
                    <div>
                        <canvas class="hidden" id="polar-area-chart" width="800" height="300"></canvas>
                        <div class="table-responsive">
                            <table class="table">
                                <!--id="table3"-->
                                @include('admin.statistics.tablecity')  
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <!-- Basic charts strats here-->
            <div class="panel panel-warning">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <i class="livicon" data-name="barchart" data-size="18" data-c="#fff" data-hc="#fff" data-loop="true"></i>TOP LIVING NATIONALITIES
                    </h4>
                    <span class="pull-right">
                        <i class="fa fa-fw fa-chevron-up clickable"></i>
                        <i class="fa fa-fw fa-times removepanel clickable"></i>
                    </span>
                </div>
                <div class="panel-body">
                    <div>
                        <canvas class="hidden" id="radar-chart" width="800" height="300"></canvas>
                        <div class="table-responsive">
                            <table class="table">
                                <!--id="table3"-->
                                @include('admin.statistics.tablenationality')  
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
@stop
@section('after_head')
<link href="{{ asset('css/admin/vendors/c3/c3.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('css/admin/vendors/morrisjs/morris.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('css/admin/css/pages/piecharts.css') }}" rel="stylesheet" type="text/css" />


<link href="{{ asset('css/admin/css/pages/jscharts.css') }}" rel="stylesheet" type="text/css" />
@stop
@section('after_foot')
<script src="{{ asset('css/admin/vendors/chartjs/Chart.js') }}" type="text/javascript"></script>
<!--<script src="{{ asset('js/admin/pages/chartjs.js') }}" type="text/javascript"></script>-->
@include('admin.statistics.chartjs')
<script type="text/javascript" src="{{ asset('css/admin/vendors/flotchart/js/jquery.flot.js') }}"></script>
<script type="text/javascript" src="{{ asset('css/admin/vendors/flotchart/js/jquery.flot.pie.js') }}"></script>
<script type="text/javascript" src="{{ asset('css/admin/vendors/flotchart/js/jquery.flot.resize.js') }}"></script>
<script type="text/javascript" src="{{ asset('css/admin/vendors/d3/d3.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('css/admin/vendors/d3pie/d3pie.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('css/admin/vendors/c3/c3.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('css/admin/vendors/morrisjs/morris.min.js') }}"></script>
<!--<script src="{{ asset('js/admin/pages/custompiecharts.js') }}" type="text/javascript"></script>-->
@include('admin.statistics.custompiecharts')
@stop