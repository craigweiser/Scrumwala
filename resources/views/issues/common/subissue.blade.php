<div id="subissues" data-issue-id="{!!$issue->id!!}">
    <strong>Sub Issues:</strong><br />
    <div id="subissue-items">
        @forelse ($issue->subissues->all() as $subissue)
            <div class="subisse-item">
            {!! Form::checkbox('subissue_checkbox', null, $subissue->done === 1, ['class'=>'subissue-checkbox']) !!}
            {{ $subissue->description }}
            @if($subissue->done)
                <span class="label label-success">
                    <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                </span>
            @endif
            <button type="button" class="btn btn-danger btn-xs remove-subisse-item" data-subissue-id="{!! $subissue->id !!}">
                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
            </button>
            </div>
        @empty
            <p>No Sub Issues</p>
        @endforelse
    </div>
    <div id="subissue-input" class="form-group">
        {!! Form::label('subissue', 'New Sub Issue:') !!}
        {!! Form::text('subissue', null, ['class' => 'form-control']) !!}
        <button type="button" class="btn btn-danger btn-xs pull-right" id="remove-subissue">
            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
        </button>
        <button type="button" class="btn btn-success btn-xs pull-right" id="add-subissue">
            <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
        </button>
    </div>
</div>