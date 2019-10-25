<div class="subissues" data-issue-id="{!!$issue->id!!}">
    <strong>Sub Issues:</strong><br />
    <div class="subissue-items">
        @forelse ($issue->subissues->all() as $subissue)
            <div class="subisse-item" data-subissue-id="{!! $subissue->id !!}">
            {!! Form::checkbox('subissue_checkbox', null, $subissue->done === 1, ['class'=>'subissue-checkbox']) !!}
            {{ $subissue->description }}
            @if($subissue->done)
                <span class="label label-success">
                    <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                </span>
            @endif
            <button type="button" class="btn btn-danger btn-xs remove-subisse-item">
                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
            </button>
            </div>
        @empty
            <p>No Sub Issues</p>
        @endforelse
    </div>
    <div class="subissue-input form-group">
        {!! Form::label('subissue', 'New Sub Issue:') !!}
        {!! Form::text('subissue', null, ['class' => 'form-control subissue-text']) !!}
        <button type="button" class="btn btn-danger btn-xs pull-right remove-subissue">
            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
        </button>
        <button type="button" class="btn btn-success btn-xs pull-right add-subissue">
            <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
        </button>
    </div>
</div>