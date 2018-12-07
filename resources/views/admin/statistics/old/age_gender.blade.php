@extends('admin.layouts.app')
@section('title')  Age/Gender Type Statistics Page
@stop
@section('head_content')
@include('admin.statistics.head')
@stop
@section('content')      
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
        <div class="col-lg-3 col-sm-6 col-md-6 margin_10 animated fadeInDownBig">
            <!-- Trans label pie charts strats here-->
            <div class="goldbg no-radius">
                <div class="panel-body squarebox square_boxs">
                    <div class="col-xs-12 pull-left nopadmar">
                        <div class="row">
                            <div class="square_box col-xs-7 pull-left">
                                <span>Users Male Number </span>
                                <div class="number" id="myTargetElement3"></div>
                            </div>
                            <i class="livicon pull-right" data-name="archive-add" data-l="true" data-c="#fff" data-hc="#fff" data-s="70"></i>
                        </div>
                        <div class="row">
                            <div class="col-xs-6">
                                <small class="stat-label statics-num">{{$male_count}}</small>
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
                                <span> Users Female Number </span>
                                <div class="number" id="myTargetElement1"></div>
                            </div>
                            <i class="livicon  pull-right" data-name="eye-open" data-l="true" data-c="#fff" data-hc="#fff" data-s="70"></i>
                        </div>
                        <div class="row">
                            <div class="col-xs-6">
                                <small class="stat-label statics-num">{{ $femal_count }}</small>
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
                <i class="livicon" data-name="home" data-size="14" data-color="#333" data-hovercolor="#333"></i> Age
            </a>
        </li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="panel-body table-responsive">
            <table class="table">
                <!--id="table3"-->
                @include('admin.statistics.tableage')  
            </table>
        </div>
    </div>
    <!--/row-->
</section>
@stop
