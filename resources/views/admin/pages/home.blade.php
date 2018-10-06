@extends('admin.layouts.app')
@section('title') الرئيسية@stop
@section('content')

@include('admin.errors.errors')
@include('admin.errors.alerts')

{!! Form::open(array('route' => 'admin.pages.home.store','method'=>'POST','data-parsley-validate'=>"")) !!}

<div class="row">
    <div class="col-sm-12">
        <div class="box">
            <div class="box-body">
                <div class="box-footer text-center">
                    <button type="submit" class="btn btn-primary">حفظ</button>
                </div>
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}
@stop
@section('after_foot')
@include('admin.layouts.tinymce')
@stop

