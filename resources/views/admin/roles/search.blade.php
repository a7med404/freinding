@extends('admin.layouts.app')
@section('title') Search all roles
@stop
@section('head_content')
@include('admin.roles.head')
@stop
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-info filterable">
            <div class="panel-heading clearfix">
                <h3 class="panel-title pull-left add_remove_title">
                    <i class="fa fa-align-center"></i> Roles List
                </h3>
                <div class="pull-right">
                    @if($role_create > 0 )
                    <a class="btn btn-lg btn-success fa fa-plus " href="{{ route('admin.roles.create') }}"> Add Role</a>
                    @endif
                    <!--<a class="btn btn-primary fa fa-search" href="{{ route('admin.roles.search') }}"></a>-->
                </div>
            </div>
            <div class="panel-body table-responsive">
                <table class="table" id="table3">
                    @include('admin.roles.table')  
                </table>
            </div>
        </div>
    </div>
</div>
@stop

@section('after_head')
<link rel="stylesheet" type="text/css" href="{{ asset('css/admin/vendors/datatables/css/dataTables.bootstrap.css') }}">
<link href="{{ asset('css/admin/css/pages/tables.css') }}" rel="stylesheet" type="text/css">
@stop
@section('after_foot')
@include('admin.layouts.delete')
@include('admin.layouts.status')
@stop