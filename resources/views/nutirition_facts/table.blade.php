<div style="margin: 100px">
    <table class="table table-bordered table-responsive-sm" id="nutiritionFacts-table">
    <thead>
        <tr align="center">
            <th>Title</th>
        <th align="center">Name</th>
        <th align="center">Calorie</th>
        <th align="center">Source</th>
        @if($role !== "guest")
            <th colspan="3">Action</th>
        @endif
        </tr>
    </thead>
    <tbody>
    @foreach($nutiritionFacts as $nutiritionFact)
        <tr>
            <td align="center">{!! $nutiritionFact->title !!}</td>
            <td align="center">{!! $nutiritionFact->name !!}</td>
            <td align="center">{!! $nutiritionFact->calorie !!}</td>
            <td align="center">{!! $nutiritionFact->source !!}</td>

            @if($role !== "guest")
            <td align="center">
                {!! Form::open(['route' => ['nutiritionFacts.destroy', $nutiritionFact->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('nutiritionFacts.show', [$nutiritionFact->id]) !!}" class='btn btn-default btn-xs'>
                        <i class="fas fa-info"></i>
                    </a>
                    <a href="{!! route('nutiritionFacts.edit', [$nutiritionFact->id]) !!}" class='btn btn-default btn-xs'>
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
