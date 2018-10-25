@extends('site.layouts.app')
@section('content')
    @if(empty($user_key))
        @include('site.home.pagelogout')
    @else
        @include('posts::content_news')
    @endif
@endsection
@section('after_foot')
    @include('posts::script_news')
@stop
