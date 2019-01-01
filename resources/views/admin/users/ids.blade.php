@extends('admin.layouts.app')
@section('title') All users
@stop
@section('head_content')
    <div class="pull-left position-h1">
        <h1>Verification Account</h1>
    </div>
    <div class="pull-right">
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('admin.index') }}">
                    <i class="fa fa-home" data-size="14" data-loop="true"></i> Dashboard
                </a>
            </li>
            @if(Auth::user()->can('access-all', 'user-all','user-list'))
                <li>
                    <a class="active" href="{{ route('admin.users_ids.index') }}">Verification Account</a>
                </li>
        @endif
        <!--<li class="active">Users List</li>-->
        </ol>
    </div>


@stop
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-info filterable">
                <div class="panel-heading clearfix">
                    <h3 class="panel-title pull-left add_remove_title">
                        <i class=" fa fa-users"></i> Verification Account
                    </h3>
                </div>
                @include('admin.errors.alerts')
                <div class="panel-body table-responsive">
                    <table class="table" id="table3">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>User Name</th>
                            <th>Request Date</th>
                            <th>ID</th>
                            <th>Verification</th>
                            <th>Action</th>
                        </tr>
                        </thead>


                        @foreach ($data as $key => $user)
                            <?php $imgname=explode("/",$user->id_image)?>
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->user->name }}</td>
                                <td>{{ $user->created_at }}</td>
                                <td class="showimg" data-id="{{ $user->user_id }}"><?php echo $imgname[1] ?></td>
                                <td>
                                    @if($user->status == 'underprocess')
                                        <label class="switch">
                                            <input class="radimg" data-name="{{ $user->user->name }}" data-id="{{ $user->user_id }}" type="checkbox">
                                            <span class="slider round"></span>
                                        </label>


                                    @elseif($user->status=='verified')
                                        <label class="switch">
                                            <input class="radimg" data-name="{{ $user->user->name }}" data-id="{{ $user->user_id }}" type="checkbox" checked>
                                            <span class="slider round"></span>
                                        </label>

                                    @elseif ($user->status=='unverified')

                                        <label class="switch">
                                            <input class="radimg" data-name="{{ $user->user->name }}"  data-id="{{ $user->user_id }}" type="checkbox">
                                            <span class="sliderred round"></span>
                                        </label>


                                    @endif




                                </td>

                                <td>
                                        <a class="btn btn-primary fa fa-send btn-user" data-toggle="tooltip" data-placement="top" data-title="Send Message" href="#"></a>
                                        <a id="delete" data-id='{{ $user->user_id }}' data-name='{{ $user->user_id }}' data-toggle="tooltip" data-placement="top" data-title="delete user image" class="btn btn-danger fa fa-trash btn-user"></a>
                                </td>


                                <div class="modal fade"  id="show-img{{ $user->user_id }}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title"> IDimage {{$user->user->name}}</h4>
                                            </div>
                                            <div class="modal-body">
                                                <img src="/{{ $user->id_image }}" class="imgid">
                                            </div>
                                            <div class="modal-footer">

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </tr>
                        @endforeach






                    </table>
                    {{  $data->links() }}
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="verify-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Verification Account</h4>
                </div>
                <div class="modal-body">
                    What do you want to this image ?
                </div>
                <input type="hidden" id="csfr" value="{{ csrf_token() }}">
                <div class="modal-footer">
                    <button id="unconfirm-verify" type="button" class="btn btn-danger" data-dismiss="modal">Unverify</button>
                    <button id="confirm-verify" type="button" class="btn btn-success" data-dismiss="modal">Verify</button>
                </div>
            </div>
        </div>
    </div>



@stop

@section('after_head')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin/vendors/datatables/css/dataTables.bootstrap.css') }}">
    <link href="{{ asset('css/admin/css/pages/tables.css') }}" rel="stylesheet" type="text/css">
@stop
@section('after_foot')
    @include('admin.layouts.status')


    <div class="modal fade" id="delete-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Delete {{$type_action}}</h4>
                </div>
                <div class="modal-body">
                    Do you want to confirm the delete ? {{$type_action}} ؟
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                    <button id="confirm-delete" type="button" class="btn btn-danger">Yes</button>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            $('body').on('click', '#delete', function(){
                $('#delete-modal').modal('show');
                $('#confirm-delete').attr('data-id', $(this).attr('data-id'));
                var title_h=' Delete {{$type_action}}'+' : '+$(this).attr('data-name');
                var text_div=' Do you want to confirm the delete ? {{$type_action}} '+' : '+$(this).attr('data-name');
                $( "h4.modal-title" ).text(title_h);
                $( "div.modal-body" ).text(text_div);
            });

            $('body').on('click', '#confirm-delete', function(){
                $('#delete-modal').modal('hide');
                 id=$(this).attr('data-id');
                $("a[data-id="+id+"]").closest('tr').hide('slow');
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('#csfr').val()
                    },
                    url: "/deleteimgid/"+id,
                    method: "get",
                    dataType: 'JSON',
                    success: function (data) {
                        $('#message').css('display', 'block');
                        $('#message').html(data.message);
                    }
                });
            });

        });
    </script>

    <script>

        $(document).ready(function () {
            $('body').on('click', '.showimg', function(){
              var  id=$(this).attr('data-id');
                $('#show-img'+id).modal('show');
            });



            $('body').on('click', '.radimg', function(event){
                event.preventDefault();
                event.stopPropagation();
                id=$(this).attr('data-id');
                $('#verify-modal').modal('show');
                $('#confirm-verify').attr('data-id', $(this).attr('data-id'));
                $('#unconfirm-verify').attr('data-id', $(this).attr('data-id'));
                var text_div='What do you want to '+$(this).attr('data-name')+" image?";
                $( "h4.modal-title" ).text(title_h);
                $( "div.modal-body" ).text(text_div);
        });
            $('body').on('click', '#confirm-verify', function(){
                $('#verify-modal').modal('hide');
                user_id =$(this).attr('data-id');
                status='verified';
                $(".radimg[data-id="+user_id+"]").prop('checked', true);

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('#csfr').val()
                    },
                    url: "{{ route('postverification') }}",
                    method: "POST",
                    data: {user_id:user_id,status:status},
                    dataType: 'JSON',
                    success: function (data) {
                       $('#message').css('display', 'block');
                       $('#message').html(data.message);
                    }
                });



            });
            $('body').on('click', '#unconfirm-verify', function(){
                $('#verify-modal').modal('hide');
                user_id =$(this).attr('data-id');
                status='unverified';
                $(".radimg[data-id="+user_id+"]").prop('checked', false);
                $('.round').removeClass('slider').addClass('sliderred');
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('#csfr').val()
                    },
                    url: "{{ route('postverification') }}",
                    method: "POST",
                    data: {user_id:user_id,status:status},
                    dataType: 'JSON',
                    success: function (data) {
                        $('#message').css('display', 'block');
                        $('#message').html(data.message);
                    }
                });
            });
        });
    </script>
@stop

<style>
    img.imgid {
        width: 250px;
        display: block;
        margin-left: auto;
        margin-right: auto;
    }

    /* The switch - the box around the slider */
    .switch {
        position: relative;
        display: inline-block;
        width: 55px;
        height: 23.8px;
    }

    /* Hide default HTML checkbox */
    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    /* The slider */
    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
    }
    .sliderred {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: red;
        -webkit-transition: .4s;
        transition: .4s;
    }
    .sliderred:before {
        position: absolute;
        content: "";
        height: 16px;
        width: 18px;
        left: 5px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
    }

    input:checked + .sliderred {
        background-color: #2196F3;
    }

    input:focus + .sliderred {
        box-shadow: 0 0 1px #2196F3;
    }

    input:checked + .sliderred:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
    }







    .slider:before {
        position: absolute;
        content: "";
        height: 16px;
        width: 18px;
        left: 5px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
    }

    input:checked + .slider {
        background-color: #00bc8c;
    }

    input:focus + .slider {
        box-shadow: 0 0 1px #2196F3;
    }

    input:checked + .slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
        border-radius: 34px;
    }
    .sliderred.round {
        border-radius: 34px;
    }

    .sliderred.round:before {
        border-radius: 50%;
    }

    .slider.round:before {
        border-radius: 50%;
    }

    td.showimg {
        cursor: pointer;
        color: #4343de;
        text-decoration: underline;
    }
    .panel-info > .panel-heading{
        background-color: #00bc8c !important;
        border-color: #00bc8c !important;
    }
</style>


