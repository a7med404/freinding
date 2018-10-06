<thead>
    <tr>

        <th>ID</th>
        <th>User Name</th>
        <th>Display Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Source</th>
        @if($user_role == 1)
        <th>Roles</th>
        @endif
        @if($user_edit == 1)
        <th>Status</th>
        @endif
        <th style="width: 105px;">Created At</th>
        @if($user_edit == 1 || $user_show == 1 || $user_delete == 1)
        <th style="width: 200px;">Settings</th>
        @endif
    </tr>
</thead>

@foreach ($data as $key => $user)

<tr>
    <td>{{ $user->id }}</td>
    <td>{{ $user->name }}</td>
    <td>{{ $user->display_name }}</td>
    <td>{{ $user->email }}</td>
    <td>{{ $user->phone }}</td>
    <td>{{ $user->site_register }}</td>
    @if($user_role == 1)
    <td>
        @if(!empty($user->roles))
        @foreach($user->roles as $v)
        <small class="label bg-green" style="color: #000;">{{ $v->display_name }}</small>
        @endforeach
        @endif
    </td>
    @endif
    @if($user_edit == 1)
    <td>
        @if($user->is_active == 0)
        <a class="poststatus fa fa-remove btn  btn-danger btn-state"  data-id='{{ $user->id }}' data-status='1' ></a>
        @else
        <a class="poststatus fa fa-check btn  btn-success btn-state"  data-id='{{ $user->id }}' data-status='0' ></a>
        @endif
    </td>
    @endif
    <td>{!!Time_Elapsed_String('@' . strtotime($user->created_at))!!}</td>
    @if($user_edit == 1 || $user_show == 1 || $user_delete == 1)
    <td>
        @if($user_show== 1)
        <!--<a class="btn btn-info fa fa-eye-slash btn-user" data-toggle="tooltip" data-placement="top" data-title="Show profile" href="{{ route('admin.users.show',$user->id) }}"></a>-->
        @endif
        @if($user_edit == 1)
        <a class="btn btn-primary fa fa-edit btn-user" data-toggle="tooltip" data-placement="top" data-title="update profile" href="{{ route('admin.users.edit',$user->id) }}"></a>
        @endif
        @if($user_delete == 1 && $user->id != 1 )
        <a id="delete" data-id='{{ $user->id }}' data-name='{{ $user->name }}' data-toggle="tooltip" data-placement="top" data-title="delete user" class="btn btn-danger fa fa-trash btn-user"></a>
        {!! Form::open(['method' => 'DELETE','route' => ['admin.users.destroy', $user->id],'style'=>'display:inline']) !!}
        {!! Form::submit('Delete', ['class' => 'hide btn btn-danger delete-btn-submit','data-delete-id' => $user->id]) !!}
        {!! Form::close() !!}
        @endif
    </td>
    @endif
</tr>
@endforeach

