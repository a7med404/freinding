@extends('admin.layouts.app')
@section('title') update Role
@stop
@section('head_content')
@include('admin.roles.head')
@stop
@section('content')
@include('admin.errors.errors')
{!! Form::model($role, ['method' => 'PATCH','route' => ['admin.roles.update', $role->id],'data-parsley-validate'=>""]) !!}
@include('admin.roles.form')
{!! Form::close() !!}
@stop

@section('after_head')
<link rel="stylesheet" type="text/css" href="{{ asset('css/admin/vendors/select2/css/select2.min.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('css/admin/vendors/select2/css/select2-bootstrap.css') }}" />
@stop
@section('after_foot')
<script type="text/javascript" src="{{ asset('css/admin/vendors/select2/js/select2.js') }}"></script>
@stop