<div class="row">
    <div class="col-sm-9 col-xs-9 col-lg-9">
        <div class="box">
            <div class="box-body">

                <div class="form-group">

                    <label>Name:</label>

                    {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control','required'=>'','data-parsley-type'=>'alphanum')) !!}
                </div>

                <div class="form-group">

                    <label>Display Name:</label>

                    {!! Form::text('display_name', null, array('placeholder' => 'Display Name','class' => 'form-control','required'=>'')) !!}
                </div>

                <div class="form-group">

                    <label>Description:</label>

                    {!! Form::text('description', null, array('placeholder' => 'description','class' => 'form-control')) !!}

                </div>

                @if(Auth::user()->can('access-all'))
                <div class="form-group">
                    <label>Roles:</label>
                    <div class="row">
                        @foreach ($permission as $key_rol => $val_rol)
                        <div class="col-sm-4 col-xs-6 col-lg-4">
                            <div class="checkbox">
                                <label><input name="permission[]" type="checkbox" class="custom-checkbox" value="{{$val_rol->id}}" @if(in_array($val_rol->id,$rolePermissions)) checked="" @endif>&nbsp; {{$val_rol->display_name}}</label>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
                <div class="box-footer text-center">
                    <!--<a href="{{$link_return}}" class="btn btn-info">Return</a>-->
                    <button type="submit" class="btn btn-success" >Save</button>
                    <button type="reset" value="Reset" class="btn btn-default">Reset</button>
                </div>
            </div>
        </div>
    </div>
</div>

