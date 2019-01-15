@extends('usersite::Auth.app')
@section('title','Suggestions Users')
@section('content')
    <h2 style="text-align: center;font-weight: 500;"> Suggestions Users</h2>
    <br><br>
    <div class="container">
        <form action="{{route('suggestion-friends')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                @foreach($users as $user)
                    <div class=" col-xl-3 col-lg-6 col-xs-12">
                        <div class="ui-block">

                            <!-- Friend Item -->

                            <div class="friend-item">
                                <div class="friend-header-thumb">
                                    <img src="{{ asset('olympus/img/friend7temp.jpg') }}" alt="friend">
                                </div>

                                <div class="friend-item-content">
                                    <div class="friend-avatar">
                                        <div class="author-thumb">
                                            <img style="width: 100px;height: 100px;"
                                                 src="{{ isset($user->image)?asset($user->image):asset('olympus/img/avatar7temp.jpg') }}"
                                                 alt="author">
                                        </div>
                                        <div class="author-content">
                                            <a href="#" class="h5 author-name">{{$user->display_name}}</a>
                                            <div class="country">{{$user->nationality}}</div>
                                        </div>
                                    </div>

                                </div>
                                <div class="checkbox" style="text-align: center;">
                                    <label>
                                        <input type="checkbox" name="friends[{{$user->id}}]">
                                        Check
                                    </label>
                                </div>
                            </div>

                            <!-- ... end Friend Item -->
                        </div>
                    </div>
                @endforeach


            </div>
            <div class="row">
                <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <button type="submit" class="btn btn-md btn-success" style="margin-left: auto; margin-right: auto;
display: block; background: #00c46a; padding: 10px 55px;width: 250px;margin-bottom: 100px; margin-top: 30px;">Add
                        & Finish
                    </button>
                </div>

            </div>
        </form>
    </div>

@endsection
@section('styles')
    <style>
        div#header--standard {
            background: #ff5e3a;
            padding: 16px 2px !important;
        }
    </style>
    @stop










