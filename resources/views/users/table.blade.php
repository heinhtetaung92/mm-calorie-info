<div style="margin: 100px">
    <table class="table table-bordered table-responsive-sm" id="users-table">
    <thead>
        <tr align="center">
        <th align="center">Name</th>
        <th align="center">Email</th>
        <th align="center">Role</th>
        @if($role !== "guest")
            <th colspan="3">Action</th>
        @endif
        </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td align="center">{!! $user->name !!}</td>
            <td align="center">{!! $user->email !!}</td>
            <td align="center">{!! $user->role !!}</td>

            @if($role !== "guest")
            <td align="center">
                {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('users.show', [$user->id]) !!}" class='btn btn-default btn-xs'>
                        <i class="fas fa-info"></i>
                    </a>
                    <a href="{!! route('users.edit', [$user->id]) !!}" class='btn btn-default btn-xs'>
                        <i class="fas fa-pen"></i>
                    </a>
                    {!! Form::button('<i class="fas fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
            @endif
        </tr>
    @endforeach
    </tbody>
</table>
</div>
