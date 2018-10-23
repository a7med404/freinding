<div class="container">
    <div class="row display-flex">
        <div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
            <div class="landing-content">
                @include('auth.form_title')
                <a href="{{ route('register') }}" class="btn btn-md btn-border c-white">Register Now!</a>
            </div>
        </div>
        <div class="col col-xl-5 col-lg-6 col-md-12 col-sm-12 col-12">
            <!-- Login-Registration Form  -->
            <div class="registration-login-form">
                <!-- Nav tabs -->
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active" id="profile" role="tabpanel" data-mh="log-tab">
                        @include('auth.form_login')
                    </div>
                </div>
            </div>
            <!-- ... end Login-Registration Form  -->	
        </div>
    </div>
</div>
