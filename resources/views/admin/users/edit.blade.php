@extends('admin.layouts.app')
@section('title') update user
@stop
@section('head_content')
@include('admin.users.head')
@stop
@section('content')
@include('admin.errors.errors')
@include('admin.users.form')
@stop
@section('after_head')

<link href="{{ asset('css/admin/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('css/admin/vendors/x-editable/css/bootstrap-editable.css') }}" rel="stylesheet" type="text/css" />

<link href="{{ asset('css/admin/vendors/daterangepicker/css/daterangepicker.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('css/admin/vendors/datetimepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('css/admin/vendors/clockface/css/clockface.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('css/admin/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet" type="text/css" />


<link href="{{ asset('css/admin/css/pages/user_profile.css') }}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="{{ asset('css/admin/vendors/select2/css/select2.min.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('css/admin/vendors/select2/css/select2-bootstrap.css') }}" />
<link rel="stylesheet" href="{{ asset('css/admin/jquery.fancybox.css') }}" >
@stop
@section('after_foot')
<script src="{{ asset('css/admin/vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}" type="text/javascript"></script>
<script src="{{ asset('css/admin/vendors/jquery-mockjax/js/jquery.mockjax.js') }}" type="text/javascript"></script>
<script src="{{ asset('css/admin/vendors/x-editable/js/bootstrap-editable.js') }}" type="text/javascript"></script>

<script src="{{ asset('css/admin/vendors/moment/js/moment.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('css/admin/vendors/daterangepicker/js/daterangepicker.js') }}" type="text/javascript"></script>
<script src="{{ asset('css/admin/vendors/datetimepicker/js/bootstrap-datetimepicker.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('css/admin/vendors/clockface/js/clockface.js') }}" type="text/javascript"></script>
<script src="{{ asset('css/admin/vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/admin/pages/datepicker.js') }}" type="text/javascript"></script>

<!--<script src="{{ asset('js/admin/pages/user_profile.js') }}" type="text/javascript"></script>-->
<script src="{{ asset('js/admin/jquery.repeater.min.js') }}"></script>
<!--<script src="{{ asset('js/admin/tinymce/tinymce.min.js') }}"></script>-->
<script src="{{ asset('js/admin/jquery.fancybox.js') }}"></script>
<script src="{{ asset('js/admin/jquery.fancybox.pack.js') }}"></script>

@include('admin.users.repeater')
<script type="text/javascript">
    $('body').on('click', '.data_form', function () {
        var id = $(this).attr('data-id');
            $(this).addClass('hidden');
            $('#'+id).removeClass('hidden');
            $('.'+id+'_div').removeClass('hidden');
    });
</script>
@stop
