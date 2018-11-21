@extends('site.layouts.app')
@section('content')
<div class="container">
    <div class="row display-flex">
        <div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
            <div class="landing-content">
                @include('auth.form_title')
            </div>
        </div>
        <div class="col col-xl-5 col-lg-6 col-md-12 col-sm-12 col-12">
            <!-- Login-Registration Form  -->
            <div class="registration-login-form">
                <!-- Nav tabs -->
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active" id="home" role="tabpanel" data-mh="log-tab">
                        <div class="title h6">Register to Friending</div>
                        <form class="content" role="form" method="POST" action="">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                    @include('auth.form_register')
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- ... end Login-Registration Form  -->	
        </div>
    </div>
</div>
@endsection

