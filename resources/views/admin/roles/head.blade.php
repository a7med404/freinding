<section class="content-header">
    <div class="pull-left position-h1">
        <h1>Roles</h1>
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
                <a class="active" href="{{ route('admin.roles.index') }}">Roles List</a>
            </li>
            @endif
            <!--<li class="active">Roles List</li>-->
        </ol>
    </div>
</section>
