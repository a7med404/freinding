@extends('admin.layouts.app')
@section('title') Public Users Statistics Page
@stop
@section('head_content')
    @include('admin.statistics.head')
@stop
@section('after_head')
    @include('admin.statistics.StatisticUserCss')
@stop
@section('content')
    <section class="content">

        <ul class="nav nav-tabs tabStatistics" style="margin-bottom: 15px; ">
            <li style="width: 25%" class="active "><a data-toggle="tab" href="#menu1">Users Statistics</a>
            </li>
            <li style="width: 25%" ><a data-toggle="tab" href="#menu2">Posts Statistics</a></li>
        </ul>
        <div class="tab-content">
            <div id="menu1" class="tab-pane fade in active ">
                {{--eman--}}
                <ul class="nav nav-tabs tabuser" style="margin: 15px;">

                    <li style="width: 20%;" class="active "><a data-toggle="tab" href="#menuTOTALUSER"
                        >TOTAL
                            USERS</a>
                    </li>
                    <li style="width: 20%;" ><a data-toggle="tab" href="#menuNEWUSER"
                        >NEW
                            USERS</a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div id="menuTOTALUSER" class="tab-pane fade in active ">
                        {{--gender --}}
                        <div class="row" style="    margin: 10px; ">

                            <div class=" no-radius">
                                <div class="panel-body squarebox square_boxs">
                                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 form-group pull-left nopadmar">
                                        <label class="col-md-2 control-label" STYLE="font-size: 14px;padding-top: 20px;">GENDER&nbsp;:</label>

                                            <div class="col-md-9"style="padding-top: 15px;margin-left: 10px;">
                                            <table style="margin-bottom: 0px; ">
                                                <thead>
                                                <tr>
                                                    <th STYLE="WIDTH: 20%;border-bottom: 2px solid #ddd;">
                                                        <div class="form-group col-lg-4"
                                                             style="max-width: 100px ;padding: 0px">

                                                            <table class="table tableGenderUser">
                                                                <thead>
                                                                <tr>
                                                                    <th ><label>
                                                                            <input type="radio" name="r1" class="square"
                                                                                   checked
                                                                                   style="    height: 18px; width: 20px;"/>
                                                                        </label>
                                                                    </th>
                                                                    <th><label style="font-size: 13px;padding-bottom: 3px;">ALL</label></th>

                                                                </tr>
                                                                </thead>
                                                            </table>


                                                        </div>
                                                    </th>
                                                    <th STYLE="WIDTH: 40%;">
                                                        <div class="form-group col-lg-4"
                                                             style="max-width: 100px ;padding: 0px">
                                                            <table class="table tableGenderUser">
                                                                <thead>
                                                                <tr>
                                                                    <th><label>
                                                                            <input type="radio" name="r1" class="square"
                                                                                   style="    height: 18px; width: 20px;"/>
                                                                        </label>
                                                                    </th>
                                                                    <th><label>
                                                                            <div style="margin-top: 5px">
                                                                                <svg height="15" version="1.0"
                                                                                     width="20"
                                                                                     style="overflow: hidden; "
                                                                                     id="canvas-for-livicon-47">
                                                                                    <use xlink:href="svg/man-standing-up.svg#Capa_1"></use>
                                                                                </svg>
                                                                            </div>
                                                                        </label></th>
                                                                    <th><label style="font-size: 13px;padding-bottom: 3px;">MALE</label></th>

                                                                </tr>
                                                                </thead>
                                                            </table>
                                                        </div>
                                                    </th>
                                                    <th STYLE="WIDTH: 40%;">
                                                        <div class="form-group col-lg-4"
                                                             style="max-width: 100px ; padding: 0px">
                                                            <table class="table tableGenderUser">
                                                                <thead>
                                                                <tr>
                                                                    <th><label>
                                                                            <input type="radio" name="r1" class="square"
                                                                                   style="    height: 18px; width: 20px;"/>
                                                                        </label>
                                                                    </th>
                                                                    <th><label>
                                                                            <div style="margin-top: 5px">
                                                                                <svg height="15" version="1.0"
                                                                                     width="20"
                                                                                     style="overflow: hidden;  "
                                                                                     id="canvas-for-livicon-47">
                                                                                    <use xlink:href="svg/female-silhouette.svg#Capa_1"></use>
                                                                                </svg>
                                                                            </div>
                                                                        </label></th>
                                                                    <th><label style="font-size: 13px;padding-bottom: 3px;">FEMALE</label>
                                                                    </th>

                                                                </tr>
                                                                </thead>
                                                            </table>


                                                        </div>
                                                    </th>

                                                </tr>
                                                </thead>
                                            </table>
                                            </div>
                                        </div>
                                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4  form-group pull-left">
                                        <label class="col-md-2 control-label" STYLE="font-size: 14px;padding-top: 20px;">YEAR&nbsp;:</label>

                                        <div class="col-md-10"style="display: inline-flex;padding-top: 15px;">
                                            <div class="input-group-addon" style="padding-right: 30px;">
                                                <!--<i class="livicon" data-c="#F89A14" data-hc="#F89A14"
                                                   data-name="calendar" data-size="18" data-loop="true" id="livicon-36"
                                                  ></i>-->
                                                   <i class="livicon pull-left" data-name="calendar"
                                                   data-c="#f89a14"
                                                   data-hc="#f89a14" data-size="18" data-loop="true"></i>
                                            </div>
                                            <input class="input-group-addon" type="text" name="datefilter" value="" style="padding: 4px 7px;width: 100%;border-left: 1px solid #ccc;"/>
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4  form-group pull-left">
                                        <label class="col-md-2 control-label" STYLE="font-size: 14px;padding-top: 20px;">AGE&nbsp;:</label>
                                        <div class="col-md-10">
                                            <input type="text" class="js-range-slider" name="my_range" value=""/>
                                        </div>
                                    </div>
                                    <hr width=100% align=center style="border: 1px solid ;border-color: #418bca;  margin-bottom: 0px; ">
                                </div>


                            </div>


                        </div>

                        <div class="row">
                            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3 margin_10 animated fadeInLeftBig">
                                <!-- Trans label pie charts strats here-->
                                <div class="lightbluebg no-radius">
                                    <div class="panel-body squarebox square_boxs">
                                        <div class="col-xs-12 pull-left nopadmar">
                                            <div class="row">
                                                <div class="square_box col-xs-7 pull-left">
                                                    <span> TOTAL USERS</span>
                                                    <div class="number" id="myTargetElement1">{{ $user_count }}</div>
                                                </div>
                                                <i class="livicon pull-right" data-name="users" data-l="true"
                                                   data-c="#fff"
                                                   data-hc="#fff" data-s="50"></i>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-2" style="margin-top: 5px">
                                                    <svg height="25" version="1.1" width="30"
                                                         style="overflow: hidden; position: relative; left: -0.5px; "
                                                         id="canvas-for-livicon-47">
                                                        <use xlink:href="svg/man.svg#Capa_1"></use>
                                                    </svg>
                                                </div>
                                                <div class="col-xs-4" style=" padding-left: 5px;">
                                                    <!--statics-num-->

                                                    <small class="stat-label">MALE</small>
                                                    <h4 id="myTargetElement1.1">{{$user_male}}%</h4>
                                                </div>
                                                <div class="col-xs-2" style="margin-top: 5px">
                                                    <svg height="25" version="1.1" width="30"
                                                         style="overflow: hidden; position: relative; left: -0.5px; "
                                                         id="canvas-for-livicon-47">
                                                        <use xlink:href="svg/girl.svg#Layer_1"></use>
                                                    </svg>
                                                </div>
                                                <div class="col-xs-4" style=" padding-left: 5px;">

                                                    <small class="stat-label">Female</small>
                                                    <h4 id="myTargetElement1.1">{{$user_female}}%</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12 ">
                                <!-- Basic charts strats here-->
                                <div class="panel ">
                                    <div class="panel-heading" style="background-color: #418bca">
                                        <h4 class="panel-title" style="color: white">
                                            USERS GROWTH
                                        </h4>
                                        <span class="pull-right">
                        <i class="fa fa-fw fa-chevron-up clickable"></i>
                        <i class="fa fa-fw fa-times removepanel clickable"></i>
                    </span>
                                    </div>
                                    <div class="panel-body">
                                        <div>
                                            <canvas id="line-chart-GROWTH-USERS" style=" max-width: 100%; "></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>



                        </div>

                        <div class="row ">
                            <div class="col-lg-6 col-xs-12 col-sm-12 col-md-12">
                                <div class="panel panel-info">
                                    <div class="panel-heading" style="background-color: #418bca;">
                                        <h3 class="panel-title">
                                            USERS STATUS
                                        </h3>
                                        <span class="pull-right">
                        <i class="glyphicon glyphicon-chevron-up showhide clickable"></i>
                        <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                        </span>
                                    </div>
                                    <div class="panel-body">
                                        <canvas id="doughnut-chart-USERS-STATUs" STYLE="max-width: 100%;"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-xs-12 col-sm-12 col-md-12">
                                <div class="panel panel-info">
                                    <div class="panel-heading" style="background-color: #418bca;">
                                        <h3 class="panel-title">
                                            GENDER
                                        </h3>
                                        <span class="pull-right">
                        <i class="glyphicon glyphicon-chevron-up showhide clickable"></i>
                        <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                        </span>
                                    </div>
                                    <div class="panel-body">
                                        <canvas id="doughnut-chart-GENDER"></canvas>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-xs-12 col-sm-12 col-md-12">
                                <div class="panel panel-info">
                                    <div class="panel-heading" style="background-color: #418bca;">
                                        <h3 class="panel-title">
                                            AGE TYPE
                                        </h3>
                                        <span class="pull-right">
                        <i class="glyphicon glyphicon-chevron-up showhide clickable"></i>
                        <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                        </span>
                                    </div>
                                    <div class="panel-body">
                                        <canvas id="doughnut-chart-AGE-TYPE"></canvas>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-xs-12 col-sm-12 col-md-12">
                                <div class="panel panel-primary">
                                    <div class="panel-heading" style="background-color: #418bca;">
                                        <h3 class="panel-title">
                                            RELATIONSHIP
                                        </h3>
                                        <span class="pull-right">
                        <i class="glyphicon glyphicon-chevron-up showhide clickable"></i>
                        <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                        </span>
                                    </div>
                                    <div class="panel-body">
                                        <canvas id="doughnut-chart-RELATIONSHIP" style="width: 100%; "></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <!-- Basic charts strats here-->
                                <div class="panel panel-warning">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            TOP NATIONALITIES
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

                            <div class="col-lg-6">
                                <!-- Basic charts strats here-->
                                <div class="panel panel-warning">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            TOP CITIES
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

                        <div class="row ">
                            <div class="col-md-6">
                                <div class="panel panel-info">
                                    <div class="panel-heading" style="background-color: #418bca;">
                                        <h3 class="panel-title">
                                            OPTIONAL INFORMATIONS VS NONE
                                        </h3>
                                        <span class="pull-right">
                        <i class="glyphicon glyphicon-chevron-up showhide clickable"></i>
                        <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                        </span>
                                    </div>
                                    <div class="panel-body">
                                        <canvas id="doughnut-chart-OPTIONAL-INFORMATIONS-VS-NONE"></canvas>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="panel panel-info">
                                    <div class="panel-heading" style="background-color: #418bca;">
                                        <h3 class="panel-title">
                                            VERIFIED VS NONE
                                        </h3>
                                        <span class="pull-right">
                        <i class="glyphicon glyphicon-chevron-up showhide clickable"></i>
                        <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                        </span>
                                    </div>
                                    <div class="panel-body">
                                        <canvas id="doughnut-chart-VERIFIED-VS-NONE"></canvas>
                                    </div>
                                </div>
                            </div>


                        </div>

                        <div class="row ">

                            <div class="col-md-12">
                                <div class="panel panel-info">
                                    <div class="panel-heading" style="background-color: #418bca;">
                                        <h3 class="panel-title">
                                            PERCENTAGE STAGE
                                        </h3>
                                        <span class="pull-right">
                        <i class="glyphicon glyphicon-chevron-up showhide clickable"></i>
                        <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                        </span>
                                    </div>
                                    <div class="panel-body">
                                        <canvas id="doughnut-chart-PERCENTAGE-STAGE" STYLE="max-width: 100%"></canvas>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row ">
                            <div class="col-lg-6">
                                <!-- Basic charts strats here-->
                                <div class="panel panel-warning">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            TOP PLATFORMS
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

                            <div class="col-lg-6">
                                <!-- Basic charts strats here-->
                                <div class="panel panel-warning">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            TOP OPERATING SYSTEM
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

                            <div class="col-lg-6">
                                <!-- Basic charts strats here-->
                                <div class="panel panel-warning">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            TOP BROWSERS
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

                            <div class="col-lg-6">
                                <!-- Basic charts strats here-->
                                <div class="panel panel-warning">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            TOP LANGUAGES

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

                        <div id="menuACTIVEUSER">

                            <div style="margin: 15px;
                            color: white;
    font-size: 20px;
    background-color: #9966ff;
    padding: 15px;    border-radius: 4px;
opacity: 0.6;">ACTIVE USER
                            </div>

                            <div class="row  ">

                                <div class="col-lg-4 col-md-6 col-sm-6 margin_10 animated fadeInLeftBig">
                                    <!-- Trans label pie charts strats here-->
                                    <div class="lightbluebg " style=" border-radius: 4px;">
                                        <div class="panel-body squarebox square_boxs"
                                             STYLE="    BACKGROUND-COLOR: #9966ff;    border-radius: 4px;">
                                            <div class="col-xs-12 pull-left nopadmar">
                                                <div class="row">
                                                    <div class="square_box col-lg-12 pull-left">
                                                        <span>AVS ATTENDANCE NUMBER</span>
                                                        <div class="number"
                                                             id="myTargetElement1">{{ $user_count }}</div>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6 col-sm-6 margin_10 animated fadeInLeftBig">
                                    <!-- Trans label pie charts strats here-->
                                    <div class="lightbluebg " style="    border-radius: 4px;">
                                        <div class="panel-body squarebox square_boxs"
                                             STYLE="    BACKGROUND-COLOR: #fcab10;    border-radius: 4px;">
                                            <div class="col-xs-12 pull-left nopadmar">
                                                <div class="row">
                                                    <div class="square_box col-ls-12 pull-left">
                                                        <span>AVG SESSIONS NUMBER</span>
                                                        <div class="number"
                                                             id="myTargetElement1">{{ $user_count }}</div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6 col-sm-6 margin_10 animated fadeInLeftBig">
                                    <!-- Trans label pie charts strats here-->
                                    <div class="lightbluebg " style="    border-radius: 4px;">
                                        <div class="panel-body squarebox square_boxs"
                                             STYLE="BACKGROUND-COLOR: #2b9eb3;    border-radius: 4px;">
                                            <div class="col-xs-12 pull-left nopadmar">
                                                <div class="row">
                                                    <div class="square_box col-ls-12 pull-left">
                                                        <span>AVG SESSION MINS</span>
                                                        <div class="number"
                                                             id="myTargetElement1">{{ $user_count }}</div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <!-- toggling series charts strats here-->
                                    <div class="panel panel-primary">
                                        <div class="panel-heading" style="background-color: #9966ff;">
                                            <h3 class="panel-title">
                                                ACTIVE HOURS
                                            </h3>
                                            <span class="pull-right">
                        <i class="glyphicon glyphicon-chevron-up showhide clickable"
                           title="Hide Panel content"></i>
                        <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                        </span>
                                        </div>
                                        <div class="panel-body">
                                            <canvas id="ACTIVE-HOURS"></canvas>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <!-- toggling series charts strats here-->
                                    <div class="panel panel-primary">
                                        <div class="panel-heading" style="background-color: #9966ff;">
                                            <h3 class="panel-title">
                                                ACTIVE DAYS
                                            </h3>
                                            <span class="pull-right">
                        <i class="glyphicon glyphicon-chevron-up showhide clickable"
                           title="Hide Panel content"></i>
                        <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                        </span>
                                        </div>
                                        <div class="panel-body">
                                            <canvas id="ACTIVE-DAYS"></canvas>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <!-- toggling series charts strats here-->
                                    <div class="panel panel-primary">
                                        <div class="panel-heading" style="background-color: #9966ff;">
                                            <h3 class="panel-title">
                                                ACTIVE MONTHS

                                            </h3>
                                            <span class="pull-right">
                        <i class="glyphicon glyphicon-chevron-up showhide clickable"
                           title="Hide Panel content"></i>
                        <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                        </span>
                                        </div>
                                        <div class="panel-body">
                                            <canvas id="ACTIVE-MONTHS"></canvas>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6">

                                </div>

                            </div>


                        </div>

                        <div id="menuSLEEPING">

                            <div style="margin: 15px;
    font-size: 20px;
    background-color: #2b9eb3;
    padding: 15px;
    border-radius: 4px;
color: white;
opacity: 0.6;">SLEEPING USER
                            </div>

                            <div class="row  ">

                                <div class="col-lg-3 col-md-6 col-sm-6 margin_10 animated fadeInLeftBig">
                                    <!-- Trans label pie charts strats here-->
                                    <div class="lightbluebg no-radius">
                                        <div class="panel-body squarebox square_boxs"
                                             STYLE="    BACKGROUND-COLOR: #2b9eb3;    border-radius: 4px;">
                                            <div class="col-xs-12 pull-left nopadmar">
                                                <div class="row">
                                                    <div class="square_box col-ls-12 pull-left">
                                                        <span>AVG SLEEPING DAYS</span>
                                                        <div class="number"
                                                             id="myTargetElement1">{{ $user_count }}</div>
                                                    </div>

                                                </div>
                                                {{--<div class="row">--}}
                                                {{--<div class="col-xs-2" style="margin-top: 5px">--}}
                                                {{--<svg height="25" version="1.1" width="30"--}}
                                                {{--style="overflow: hidden; position: relative; left: -0.5px; "--}}
                                                {{--id="canvas-for-livicon-47">--}}
                                                {{--<use xlink:href="svg/man.svg#Capa_1"></use>--}}
                                                {{--</svg>--}}
                                                {{--</div>--}}
                                                {{--<div class="col-xs-4" style=" padding-left: 5px;">--}}
                                                {{--<!--statics-num-->--}}

                                                {{--<small class="stat-label">MALE</small>--}}
                                                {{--<h4 id="myTargetElement1.1">{{$user_male}}%</h4>--}}
                                                {{--</div>--}}
                                                {{--<div class="col-xs-2" style="margin-top: 5px">--}}
                                                {{--<svg height="25" version="1.1" width="30"--}}
                                                {{--style="overflow: hidden; position: relative; left: -0.5px; "--}}
                                                {{--id="canvas-for-livicon-47">--}}
                                                {{--<use xlink:href="svg/girl.svg#Layer_1"></use>--}}
                                                {{--</svg>--}}
                                                {{--</div>--}}
                                                {{--<div class="col-xs-4" style=" padding-left: 5px;">--}}

                                                {{--<small class="stat-label">Female</small>--}}
                                                {{--<h4 id="myTargetElement1.1">{{$user_female}}%</h4>--}}
                                                {{--</div>--}}
                                                {{--</div>--}}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-6 col-sm-6 margin_10 animated fadeInLeftBig">
                                    <!-- Trans label pie charts strats here-->
                                    <div class="lightbluebg no-radius">
                                        <div class="panel-body squarebox square_boxs"
                                             STYLE="    BACKGROUND-COLOR: #fbc257;    border-radius: 4px;">
                                            <div class="col-xs-12 pull-left nopadmar">
                                                <div class="row">
                                                    <div class="square_box col-lg-12 pull-left">
                                                        <span>AVG VACATION DAYS</span>
                                                        <div class="number"
                                                             id="myTargetElement1">{{ $user_count }}</div>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>


                        </div>

                        <div id="menuDELETED">

                            <div style="margin: 15px;
    font-size: 20px;
    background-color: #d22f2f;
    color: white;
    padding: 15px;
    border-radius: 4px;
opacity: 0.6;">DELETED USER
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <!-- toggling series charts strats here-->
                                    <div class="panel panel-primary">
                                        <div class="panel-heading" style="background-color: #d22f2f;">
                                            <h3 class="panel-title">
                                                DELETE REASONS
                                            </h3>
                                            <span class="pull-right">
                        <i class="glyphicon glyphicon-chevron-up showhide clickable"
                           title="Hide Panel content"></i>
                        <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                        </span>
                                        </div>
                                        <div class="panel-body">
                                            <canvas id="DELETE-REASONS" style="max-width: 100%"></canvas>
                                        </div>
                                    </div>
                                </div>


                            </div>

                        </div>

                    </div>

                    <div id="menuNEWUSER" class="tab-pane fade  ">
                        <div class="row">
                            <div class="col-lg-6 col-md-12 col-sm-12 margin_10 animated fadeInRightBig">
                                <!-- Trans label pie charts strats here-->
                                <div class="palebluecolorbg no-radius">
                                    <div class="panel-body squarebox square_boxs">
                                        <div class="col-xs-12 pull-left nopadmar">
                                            <div class="row">
                                                <div class="square_box col-xs-7 pull-left">
                                                    <span>NEW USERS </span>
                                                    <div class="number" id="myTargetElement4">{{ $user_year }}</div>
                                                </div>
                                                <i class="livicon pull-right" data-hc="#fff" data-name="calendar"
                                                   data-size="50"
                                                   data-c="#fff" data-hc="#fff"></i>
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

                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <!-- Basic charts strats here-->
                                <div class="panel ">
                                    <div class="panel-heading" style="background-color: #00bc8c">
                                        <h4 class="panel-title">
                                            NEW USERS GROWTH
                                        </h4>
                                        <span class="pull-right">
                        <i class="fa fa-fw fa-chevron-up clickable"></i>
                        <i class="fa fa-fw fa-times removepanel clickable"></i>
                    </span>
                                    </div>
                                    <div class="panel-body">
                                        <div>
                                            <canvas id="line-chart-NEW-USERS-GROWTH"
                                                    style=" max-width: 100%;  "></canvas>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="row ">
                            <div class="col-md-6">
                                <div class="panel panel-primary">
                                    <div class="panel-heading" style="background-color: #00bc8c;">
                                        <h3 class="panel-title">
                                            REGISTRATION HOURS
                                        </h3>
                                        <span class="pull-right">
                        <i class="glyphicon glyphicon-chevron-up showhide clickable"></i>
                        <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                        </span>
                                    </div>
                                    <div class="panel-body">
                                        <canvas id="doughnut-chart-REGISTRATION-PERIOD" style="width: 100%; "></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="panel panel-primary">
                                    <div class="panel-heading" style="background-color: #00bc8c;">
                                        <h3 class="panel-title">
                                            REGISTRATION DAYS
                                        </h3>
                                        <span class="pull-right">
                        <i class="glyphicon glyphicon-chevron-up showhide clickable"></i>
                        <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                        </span>
                                    </div>
                                    <div class="panel-body">
                                        <canvas id="doughnut-chart-REGISTRATION-DAYS"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <!-- toggling series charts strats here-->
                                <div class="panel panel-primary">
                                    <div class="panel-heading" style="background-color: #00bc8c;">
                                        <h3 class="panel-title">
                                            REGISTRATION MONTHS
                                        </h3>
                                        <span class="pull-right">
                        <i class="glyphicon glyphicon-chevron-up showhide clickable"
                           title="Hide Panel content"></i>
                        <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                        </span>
                                    </div>
                                    <div class="panel-body">
                                        <canvas id="REGISTRATION_MONTHS"></canvas>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <!-- toggling series charts strats here-->
                                <div class="panel panel-primary">
                                    <div class="panel-heading" style="background-color: #00bc8c;">
                                        <h3 class="panel-title">
                                            REGISTRATION TYPE
                                        </h3>
                                        <span class="pull-right">
                        <i class="glyphicon glyphicon-chevron-up showhide clickable"
                           title="Hide Panel content"></i>
                        <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                        </span>
                                    </div>
                                    <div class="panel-body">
                                        <canvas id="REGISTRATION_TYPE"></canvas>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

            </div>

            <div id="menu2" class="tab-pane fade ">
                <!--startjosh-->
                <div class="row row-eq-height">
                    <div class="col-lg-3 col-md-6 col-sm-6 margin_10 animated fadeInLeftBig">
                        <!-- Trans label pie charts strats here-->
                        <div class="lightbluebg no-radius">
                            <div class="panel-body squarebox square_boxs">
                                <div class="col-xs-12 pull-left nopadmar">
                                    <div class="row">
                                        <div class="square_box col-xs-7 pull-left">
                                            <span> TOTAL POST</span>
                                            <div class="number"
                                                 id="myTargetElement1">{{ $user_count }}</div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-2" style="margin-top: 5px">
                                            <svg height="25" version="1.1" width="30"
                                                 style="overflow: hidden; position: relative; left: -0.5px; "
                                                 id="canvas-for-livicon-47">
                                                <use xlink:href="svg/man.svg#Capa_1"></use>
                                            </svg>
                                        </div>
                                        <div class="col-xs-4" style=" padding-left: 5px;">
                                            <!--statics-num-->

                                            <small class="stat-label">MALE</small>
                                            <h4 id="myTargetElement1.1">{{$user_male}}%</h4>
                                        </div>
                                        <div class="col-xs-2" style="margin-top: 5px">
                                            <svg height="25" version="1.1" width="30"
                                                 style="overflow: hidden; position: relative; left: -0.5px; "
                                                 id="canvas-for-livicon-47">
                                                <use xlink:href="svg/girl.svg#Layer_1"></use>
                                            </svg>
                                        </div>
                                        <div class="col-xs-4" style=" padding-left: 5px;">

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
                                            <span>NEW POSTS </span>
                                            <div class="number"
                                                 id="myTargetElement4">{{ $user_year }}</div>
                                        </div>
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
                                            <span>AGE POSTS</span>
                                            <div class="number"
                                                 id="myTargetElement3">{{$age_avg}}</div>
                                        </div>


                                    </div>
                                    <div class="row">
                                        <div class="col-xs-2" style="margin-top: 5px">
                                            <svg height="25" version="1.1" width="30"
                                                 style="overflow: hidden; position: relative; left: -0.5px; "
                                                 id="canvas-for-livicon-47">
                                                <use xlink:href="svg/man.svg#Capa_1"></use>
                                            </svg>
                                        </div>
                                        <div class="col-xs-4" style=" padding-left: 5px;">
                                            <!--statics-num-->

                                            <small class="stat-label">MALE</small>
                                            <h4 id="myTargetElement1.1">{{$user_male}}%</h4>
                                        </div>
                                        <div class="col-xs-2" style="margin-top: 5px">
                                            <svg height="25" version="1.1" width="30"
                                                 style="overflow: hidden; position: relative; left: -0.5px; "
                                                 id="canvas-for-livicon-47">
                                                <use xlink:href="svg/girl.svg#Layer_1"></use>
                                            </svg>
                                        </div>
                                        <div class="col-xs-4" style=" padding-left: 5px;">

                                            <small class="stat-label">Female</small>
                                            <h4 id="myTargetElement1.1">{{$user_female}}%</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row row-eq-height">
                    <div class="col-lg-3 col-sm-6 col-md-6 margin_10 animated fadeInDownBig" STYLE="    PADDING-TOP: 10PX;
    PADDING-BOTTOM: 10PX;">
                        <!-- Trans label pie charts strats here-->
                        <div class="goldbg no-radius" style="background-color: #4bc0c0">
                            <div class="panel-body squarebox square_boxs">
                                <div class="col-xs-12 pull-left nopadmar">
                                    <div class="row">
                                        <div class="square_box col-xs-10 pull-left">
                                            <span>AVG FRIENDS MENTION</span>
                                            <div class="number"
                                                 id="myTargetElement3">{{$age_avg}}</div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-2" style="margin-top: 5px">
                                            <svg height="25" version="1.1" width="30"
                                                 style="overflow: hidden; position: relative; left: -0.5px; "
                                                 id="canvas-for-livicon-47">
                                                <use xlink:href="svg/man.svg#Capa_1"></use>
                                            </svg>
                                        </div>
                                        <div class="col-xs-4" style=" padding-left: 5px;">
                                            <!--statics-num-->

                                            <small class="stat-label">MALE</small>
                                            <h4 id="myTargetElement1.1">{{$user_male}}%</h4>
                                        </div>
                                        <div class="col-xs-2" style="margin-top: 5px">
                                            <svg height="25" version="1.1" width="30"
                                                 style="overflow: hidden; position: relative; left: -0.5px; "
                                                 id="canvas-for-livicon-47">
                                                <use xlink:href="svg/girl.svg#Layer_1"></use>
                                            </svg>
                                        </div>
                                        <div class="col-xs-4" style=" padding-left: 5px;">

                                            <small class="stat-label">Female</small>
                                            <h4 id="myTargetElement1.1">{{$user_female}}%</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row row-eq-height">
                    <div class="col-lg-12">
                        <!-- Tracking charts strats here-->
                        <div class="panel ">
                            <div class="panel-heading" style="background-color: #00bc8c">
                                <h3 class="panel-title">

                                    NEW POSTS
                                </h3>
                                <span class="pull-right">
                                    <i class="glyphicon glyphicon-chevron-up showhide clickable"
                                       title="Hide Panel content"></i>
                                    <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                                </span>
                            </div>
                            <div class="panel-body">
                                <canvas id="line-chart-POSTS-GROWTH"
                                        STYLE="max-width: 100%;"></canvas>
                            </div>

                        </div>
                    </div>

                </div>

                <div class="row ">
                    <div class="col-lg-6">
                        <!-- Basic charts strats here-->
                        <div class="panel panel-danger">
                            <div class="panel-heading">
                                <h4 class="panel-title">

                                    POSTS TYPE
                                </h4>
                                <span class="pull-right">
                                    <i class="fa fa-fw fa-chevron-up clickable"></i>
                                    <i class="fa fa-fw fa-times removepanel clickable"></i>
                                </span>
                            </div>
                            <div class="panel-body">
                                <canvas id="pie-chart-POSTS-TYPE"></canvas>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="row row-eq-height">
                    <div class="col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">

                                    POST PERIOD BY HOURS
                                </h3>
                                <span class="pull-right">
                                    <i class="glyphicon glyphicon-chevron-up showhide clickable"></i>
                                    <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                                </span>
                            </div>
                            <div class="panel-body">
                                <canvas id="POST_PERIOD_BY_HOURS"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <!-- toggling series charts strats here-->
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">

                                    POST PERIOD BY DAYS
                                </h3>
                                <span class="pull-right">
                                    <i class="glyphicon glyphicon-chevron-up showhide clickable"
                                       title="Hide Panel content"></i>
                                    <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                                </span>
                            </div>
                            <div class="panel-body">
                                <canvas id="POST_PERIOD_BY_DAYS"></canvas>
                            </div>
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

                                    POST PERIOD BY MONTHS
                                </h3>
                                <span class="pull-right">
                                    <i class="glyphicon glyphicon-chevron-up showhide clickable"
                                       title="Hide Panel content"></i>
                                    <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                                </span>
                            </div>
                            <div class="panel-body">
                                <canvas id="POST_PERIOD_BY_MONTH"></canvas>
                            </div>
                        </div>
                    </div>
                </DIV>
                <!--endjosh-->
            </div>
        </div>


    </section>
@stop

@section('after_foot')

    @include('admin.statistics.chartjs')
{{--    @include('admin.statistics.custompiecharts')--}}

@stop