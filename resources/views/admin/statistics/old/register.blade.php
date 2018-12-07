@extends('admin.layouts.app')
@section('title')  Registration Period Type Statistics Page
@stop
@section('head_content')
@include('admin.statistics.head')
@stop
@section('content')      
<!-- Main content -->
<section class="content-header">
    <ol class="breadcrumb">
        <li class="active">
            <a>
                <i class="livicon" data-name="home" data-size="14" data-color="#333" data-hovercolor="#333"></i> Hours
            </a>
        </li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 margin_10 animated fadeInRightBig">
            <!-- Trans label pie charts strats here-->
            <div class="palebluecolorbg no-radius">
                <div class="panel-body squarebox square_boxs">
                    <div class="col-xs-12 pull-left nopadmar">
                        <div class="row">
                            <div class="square_box col-xs-7 pull-left">
                                <span> Morning Period  Number </span>
                                <div class="number" id="myTargetElement4"></div>
                            </div>
                            <i class="fa fa-fw fa-adjust pull-right statics-icon" data-l="true" data-c="#fff" data-hc="#fff" data-s="70"></i>
                        </div>
                        <div class="row">
                            <div class="col-xs-6">
                                <small class="stat-label">06 Morning  :  12 Afternoon</small>
                                <h4 id="myTargetElement4.1"></h4>
                            </div>
                            <div class="col-xs-6">
                                <small class="stat-label statics-num">{{ $morning_count }}</small>
                                <h4 id="myTargetElement4.1"></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 margin_10 animated fadeInUpBig">
            <!-- Trans label pie charts strats here-->
            <div class="redbg no-radius">
                <div class="panel-body squarebox square_boxs">
                    <div class="col-xs-12 pull-left nopadmar">
                        <div class="row">
                            <div class="square_box col-xs-7 pull-left">
                                <span> Afternoon Period  Number </span>
                                <div class="number" id="myTargetElement2"></div>
                            </div>
                            <i class="fa fa-users pull-right statics-icon" data-l="true" data-c="#fff" data-hc="#fff" data-s="70"></i>
                        </div>
                        <div class="row">
                            <div class="col-xs-6">
                                <small class="stat-label">12 Afternoon  :  06 Night</small>
                                <h4 id="myTargetElement4.1"></h4>
                            </div>
                            <div class="col-xs-6">
                                <small class="stat-label statics-num">{{$afternoon_count}}</small>
                                <h4 id="myTargetElement2.1"></h4>
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
                                <span> Night Period  Number </span>
                                <div class="number" id="myTargetElement3"></div>
                            </div>
                            <i class="livicon pull-right" data-name="archive-add" data-l="true" data-c="#fff" data-hc="#fff" data-s="70"></i>
                        </div>
                        <div class="row">
                            <div class="col-xs-6">
                                <small class="stat-label">06 Night  :  12 Midnight</small>
                                <h4 id="myTargetElement4.1"></h4>
                            </div>
                            <div class="col-xs-6">
                                <small class="stat-label statics-num">{{$night_count}}</small>
                                <h4 id="myTargetElement3.1"></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 margin_10 animated fadeInLeftBig">
            <!-- Trans label pie charts strats here-->
            <div class="lightbluebg no-radius">
                <div class="panel-body squarebox square_boxs">
                    <div class="col-xs-12 pull-left nopadmar">
                        <div class="row">
                            <div class="square_box col-xs-7 pull-left">
                                <span> Midnight Period  Number </span>
                                <div class="number" id="myTargetElement1"></div>
                            </div>
                            <i class="livicon  pull-right" data-name="eye-open" data-l="true" data-c="#fff" data-hc="#fff" data-s="70"></i>
                        </div>
                        <div class="row">
                            <div class="col-xs-6">
                                <small class="stat-label">12 Midnight  :  06 Morning</small>
                                <h4 id="myTargetElement4.1"></h4>
                            </div>
                            <div class="col-xs-6">
                                <small class="stat-label statics-num">{{ $midnight_count }}</small>
                                <h4 id="myTargetElement1.1"></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/row-->
</section>
<!--****************************-->
<section class="content-header">
    <ol class="breadcrumb">
        <li class="active">
            <a>
                <i class="livicon" data-name="home" data-size="14" data-color="#333" data-hovercolor="#333"></i> Day
            </a>
        </li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 margin_10 animated fadeInRightBig">
            <!-- Trans label pie charts strats here-->
            <div class="palebluecolorbg no-radius">
                <div class="panel-body squarebox square_boxs">
                    <div class="col-xs-12 pull-left nopadmar">
                        <div class="row">
                            <div class="square_box col-xs-7 pull-left">
                                <span> Saturday  Number </span>
                                <div class="number" id="myTargetElement4"></div>
                            </div>
                            <i class="fa fa-fw fa-leaf pull-right statics-icon" data-l="true" data-c="#fff" data-hc="#fff" data-s="70"></i>
                        </div>
                        <div class="row">
                            <div class="col-xs-6">
                                <small class="stat-label statics-num">{{ $saturday_count }}</small>
                                <h4 id="myTargetElement2.1"></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 margin_10 animated fadeInUpBig">
            <!-- Trans label pie charts strats here-->
            <div class="redbg no-radius">
                <div class="panel-body squarebox square_boxs">
                    <div class="col-xs-12 pull-left nopadmar">
                        <div class="row">
                            <div class="square_box col-xs-7 pull-left">
                                <span>Sunday Number </span>
                                <div class="number" id="myTargetElement2"></div>
                            </div>
                            <i class="fa fa-circle pull-right statics-icon" data-l="true" data-c="#fff" data-hc="#fff" data-s="70"></i>
                        </div>
                        <div class="row">
                            <div class="col-xs-6">
                                <small class="stat-label statics-num">{{$Sunday_count}}</small>
                                <h4 id="myTargetElement2.1"></h4>
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
                                <span> Monday  Number </span>
                                <div class="number" id="myTargetElement3"></div>
                            </div>
                            <i class="fa fa-fw fa-asterisk pull-right statics-icon" data-l="true" data-c="#fff" data-hc="#fff" data-s="70"></i>
                        </div>
                        <div class="row">
                            <div class="col-xs-6">
                                <small class="stat-label statics-num">{{$Monday_count}}</small>
                                <h4 id="myTargetElement3.1"></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 margin_10 animated fadeInLeftBig">
            <!-- Trans label pie charts strats here-->
            <div class="lightbluebg no-radius">
                <div class="panel-body squarebox square_boxs">
                    <div class="col-xs-12 pull-left nopadmar">
                        <div class="row">
                            <div class="square_box col-xs-7 text-right">
                                <span> Tuesday Number </span>
                                <div class="number" id="myTargetElement1"></div>
                            </div>
                            <i class="fa fa-fw fa-bolt pull-right statics-icon" data-l="true" data-c="#fff" data-hc="#fff" data-s="70"></i>
                        </div>
                        <div class="row">
                            <div class="col-xs-6">
                                <small class="stat-label statics-num">{{ $Tuesday_count }}</small>
                                <h4 id="myTargetElement1.1"></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 margin_10 animated fadeInRightBig">
            <!-- Trans label pie charts strats here-->
            <div class="palebluecolorbg no-radius">
                <div class="panel-body squarebox square_boxs">
                    <div class="col-xs-12 pull-left nopadmar">
                        <div class="row">
                            <div class="square_box col-xs-7 pull-left">
                                <span> Wednesday  Number </span>
                                <div class="number" id="myTargetElement4"></div>
                            </div>
                            <i class="fa fa-fw fa-bullseye pull-right statics-icon" data-l="true" data-c="#fff" data-hc="#fff" data-s="70"></i>
                        </div>
                        <div class="row">
                            <div class="col-xs-6">
                                <small class="stat-label statics-num">{{ $Wednesday_count }}</small>
                                <h4 id="myTargetElement4.1"></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 margin_10 animated fadeInUpBig">
            <!-- Trans label pie charts strats here-->
            <div class="redbg no-radius">
                <div class="panel-body squarebox square_boxs">
                    <div class="col-xs-12 pull-left nopadmar">
                        <div class="row">
                            <div class="square_box col-xs-7 pull-left">
                                <span>Thursday Number </span>
                                <div class="number" id="myTargetElement2"></div>
                            </div>
                            <i class="fa fa-fw fa-certificate pull-right statics-icon" data-l="true" data-c="#fff" data-hc="#fff" data-s="70"></i>
                        </div>
                        <div class="row">
                            <div class="col-xs-6">
                                <small class="stat-label statics-num">{{$Thursday_count}}</small>
                                <h4 id="myTargetElement2.1"></h4>
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
                                <span> Friday  Number </span>
                                <div class="number" id="myTargetElement3"></div>
                            </div>
                            <i class="fa fa-fw fa-cogs pull-right statics-icon" data-l="true" data-c="#fff" data-hc="#fff" data-s="70"></i>
                        </div>
                        <div class="row">
                            <div class="col-xs-6">
                                <small class="stat-label statics-num">{{$Friday_count}}</small>
                                <h4 id="myTargetElement3.1"></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/row-->
</section>
<!--****************************-->
<section class="content-header">
    <ol class="breadcrumb">
        <li class="active">
            <a>
                <i class="livicon" data-name="home" data-size="14" data-color="#333" data-hovercolor="#333"></i> Month
            </a>
        </li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="panel-body table-responsive">
            <table class="table">
                <!--id="table4"-->
                @include('admin.statistics.tablemonth')  
            </table>
        </div>
    </div>
    <!--/row-->
</section>
<!--****************************-->
<section class="content-header">
    <ol class="breadcrumb">
        <li class="active">
            <a>
                <i class="livicon" data-name="home" data-size="14" data-color="#333" data-hovercolor="#333"></i> Years
            </a>
        </li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="panel-body table-responsive">
            <table class="table">
                 <!--id="table3"-->
                @include('admin.statistics.tableyear')  
            </table>
        </div>
    </div>
    <!--/row-->
</section>
@stop
