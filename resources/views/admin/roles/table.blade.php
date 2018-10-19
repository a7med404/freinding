<thead>
    <tr>

        <th>ID</th>

        <!--<th>Name</th>-->

        <th>Dispaly Name</th>

        <!--<th>Description</th>-->

        <!--<th>Roles</th>-->
        
        <th>Settings</th>

    </tr>
</thead>

@foreach ($data as $key => $role)

<tr>

    <td>{{ $role->id }}</td>

    <!--<td>{{ $role->name }}</td>-->

    <td>{{ $role->display_name }}</td>
    
    <!--<td>{{ $role->description }}</td>-->

<!--    @if($role_edit == 1)
    <td>

        @if(!empty($role->permissions))

        @foreach($role->permissions as $v)

        <small class="label btn-success">{{ $v->display_name }}</small>

        @endforeach

        @endif

    </td>
    @endif-->
    
    <td>
        @if($role_edit == 1)
        <!--<a class="btn btn-info fa fa-eye-slash btn-user" href="{{ route('admin.roles.show',$role->id) }}"></a>-->

        <a class="btn btn-primary fa fa-edit btn-user" href="{{ route('admin.roles.edit',$role->id) }}"></a>
        @endif
        
        @if($role_delete == 1)

        <a id="delete" data-id='{{ $role->id }}' data-name='{{ $role->name }}' class="btn btn-danger fa fa-trash btn-user"></a>

        {!! Form::open(['method' => 'DELETE','route' => ['admin.roles.destroy', $role->id],'style'=>'display:inline']) !!}

        {!! Form::submit('Delete', ['class' => 'hide btn btn-danger delete-btn-submit','data-delete-id' => $role->id]) !!}

        {!! Form::close() !!}

        @endif
        
    </td>

</tr>

@endforeach

