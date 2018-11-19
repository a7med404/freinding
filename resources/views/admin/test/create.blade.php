@extends('admin.layouts.app')
@section('title') Add New User
@stop
@section('head_content')
@include('admin.users.head')
@stop
@section('content')

@include('admin.errors.errors')

@include('admin.test.form_upload')

@stop
@section('after_head')
<link rel="stylesheet" href="{{ asset('css/admin/jquery.fancybox.css') }}" >
@stop
@section('after_foot')
<script src="{{ asset('js/admin/jquery.repeater.min.js') }}"></script>
<script src="{{ asset('js/admin/jquery.fancybox.js') }}"></script>
<script src="{{ asset('js/admin/jquery.fancybox.pack.js') }}"></script>
@include('admin.users.repeater')
@stop

