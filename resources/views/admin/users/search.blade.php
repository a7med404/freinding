@extends('admin.layouts.app')
@section('title') Search all users
@stop
@section('head_content')
@include('admin.users.head')
@stop
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-info filterable">
            <div class="panel-heading clearfix">
                <h3 class="panel-title pull-left add_remove_title">
                    <i class=" fa fa-users"></i> Users List
                </h3>
                <div class="pull-right">
                    @if($user_create == 1)
                    <a class="btn btn-lg btn-success fa fa-plus " data-toggle="tooltip" data-placement="top" data-title="add user" href="{{ route('admin.users.create') }}">Add user</a>
                    @endif
                    <!--<a class="btn btn-primary fa fa-search" data-toggle="tooltip" data-placement="top" data-title="search user" href="{{ route('admin.users.search') }}"></a>-->
                    <!--<button type="button" class="btn btn-primary btn-sm" id="addButton">Add new user</button>-->
                    <!--<button type="button" class="btn btn-danger btn-sm" id="delButton">Delete row</button>-->
                </div>
            </div>
            <div class="panel-body table-responsive">
                <table class="table" id="table3">
                    @include('admin.users.table')   
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


