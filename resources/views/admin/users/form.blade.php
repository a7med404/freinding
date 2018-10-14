<!--section ends-->
<section class="content">
    <div class="row">
        <div class="col-lg-12">
            <ul class="nav  nav-tabs ">
                <li class="active">
                    <a href="#tab1" data-toggle="tab">
                        <i class="livicon" data-name="user" data-size="16" data-c="#000" data-hc="#000" data-loop="true"></i> Basic Information</a>
                </li>
                <li>
                    <a href="#tab2" data-toggle="tab">
                        <i class="livicon" data-name="key" data-size="16" data-loop="true" data-c="#000" data-hc="#000"></i> Change Password</a>
                </li>
                <li>
                    <a href="#tab3" data-toggle="tab">
                        <i class="livicon" data-name="pencil" data-size="16" data-loop="true" data-c="#000" data-hc="#000"></i> Additional Information</a>
                </li>
                <li>
                    <a href="#tab4" data-toggle="tab">
                        <i class="livicon" data-name="history" data-size="16" data-loop="true" data-c="#000" data-hc="#000"></i>Hidden Information</a>
                </li>
                <!--                <li>
                                    <a href="">
                                        <i class="livicon" data-name="gift" data-size="16" data-loop="true" data-c="#000" data-hc="#000"></i> Advanced User Profile</a>
                                </li>-->
            </ul>
            <div class="tab-content mar-top">
                <div id="tab1" class="tab-pane fade active in">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel">
                                <div class="panel-heading">
                                    <h3 class="panel-title">
                                        User Image
                                    </h3>
                                </div>
                                <div class="panel-body">
                                    @if($new==1)
                                    {!! Form::open(array('route' => 'admin.users.store','method'=>'POST','data-parsley-validate'=>"",'class'=>'form-horizontal')) !!}
                                    @else
                                    {!! Form::model($user, ['method' => 'PATCH','route' => ['admin.users.update', $user->id],'data-parsley-validate'=>"",'class'=>'form-horizontal']) !!}
                                    @endif
                                    @include('admin.users.form_profile')
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="tab2" class="tab-pane fade">
                    <div class="row">
                        <div class="col-md-12 pd-top">
                            @if($new==1)
                            {!! Form::open(array('route' => 'admin.users.storePassword','method'=>'POST','data-parsley-validate'=>"",'class'=>'form-horizontal')) !!}
                            @else
                            {!! Form::model($user, ['method' => 'PATCH','route' => ['admin.users.updatePassword', $user->id],'data-parsley-validate'=>"",'class'=>'form-horizontal']) !!}
                            @endif
                            @include('admin.users.form_password')
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
                <div id="tab3" class="tab-pane fade">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel">
                                <div class="panel-heading">
                                    <h3 class="panel-title">
                                        Verification Image
                                    </h3>
                                </div>
                                <div class="panel-body">
                                    @if($new==1)
                                    {!! Form::open(array('route' => 'admin.users.storeAdditional','method'=>'POST','data-parsley-validate'=>"",'class'=>'form-horizontal')) !!}
                                    @else
                                    {!! Form::model($user, ['method' => 'PATCH','route' => ['admin.users.updateAdditional', $user->id],'data-parsley-validate'=>"",'class'=>'form-horizontal']) !!}
                                    @endif
                                    @include('admin.users.form_additional')
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="tab4" class="tab-pane fade">
                    <div class="row">
                        <div class="col-md-12 pd-top">
                            @if($new==1)
                            {!! Form::open(array('route' => 'admin.users.storeHidden','method'=>'POST','data-parsley-validate'=>"",'class'=>'form-horizontal')) !!}
                            @else
                            {!! Form::model($user, ['method' => 'PATCH','route' => ['admin.users.updateHidden', $user->id],'data-parsley-validate'=>"",'class'=>'form-horizontal']) !!}
                            @endif
                            @include('admin.users.form_hidden')
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- content -->
