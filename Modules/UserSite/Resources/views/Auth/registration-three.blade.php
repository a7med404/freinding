@extends('usersite::Auth.app')
@section('title','Step Three')
@section('content')
<div class="container">
    <div class="row">
        <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <form method="post"  id="stepthree" action="{{url('update-user-three')}}">
                @csrf
                <div class="ui-block">

                    <div class="ui-block-title">
                        <h6 class="title">Registration Steps</h6>
                    </div>
                    <div class="ui-block-content">
                        <div class="crumina-module crumina-heading with-title-decoration">
                            <h5 class="heading-title">Step 3</h5>
                        </div>

                        @if($errors->any())
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li class="err">{{$error}}</li>
                                @endforeach
                            </ul>
                        @endif

                        <div class="row">
                            <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="form-group label-floating is-select">
                                    <label class="control-label">Relationship</label>
                                    <select class="selectpicker form-control" name="relationship">
                                        <option value="none">None</option>
                                        <option value="single">Single</option>
                                        <option value="relationship">In a Relationship</option>
                                        <option value="engaged">Engaged</option>
                                        <option value="married">Married</option>
                                    </select>
                                    @if ($errors->has('relationship'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('relationship') }}</strong>
                                        </span>
                                    @endif
                                </div>


                                <div class="form-group label-floating is-select">
                                    <label class="control-label" style="z-index: 11">Nationality</label>
                                    <select class="autocomplete form-control " data-letter="0" data-placeholder="Your Nationality"  name="nationality" >
                                        <option value=""></option>
                                        @foreach($countries as $country)
                                            <option value="{{$country->country}}">{{$country->country}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('nationality'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('nationality') }}</strong>
                                        </span>
                                    @endif
                                </div>





                                {{--<div style="display: block;text-align: center;margin-left: auto;margin-right: auto;" class="loader"><img class="loader"--}}
                                                         {{--src="{{ asset('olympus/img/loader.gif') }}"--}}
                                                         {{--alt="Loading....">--}}
                                {{--</div>--}}
                                <div class="form-group label-floating is-select">
                                    <label class="control-label" style="z-index: 11">City</label>
                                    <select name="livingcity" class="autocomplete form-control" data-placeholder="Your City">
                                        <option value=""></option>
                                        @foreach($cities as $city)
                                            <option value="{{$city->city_ascii}}">{{$city->city_ascii}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('livingcity'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('livingcity') }}</strong>
                                        </span>
                                    @endif
                                </div>



                            </div>
                        </div>


                    </div>
                </div>

                <br> <br>
                <div class="row">
                    <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <button class="btn btn-md btn-success" style="margin-left: auto; margin-right: auto;
display: block; background: #00c46a; padding: 10px 55px;" type="submit">Next
                        </button>

                    </div>

                </div>
            </form>

        </div>
    </div>
</div>
@endsection



