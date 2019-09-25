<h2>Edit Issue: {!! $issue->title !!} </h2>
{!! Form::model($issue, ['method' =>'PATCH','action' => ['IssuesController@update',$issue->id], 'data-issue-id' => $issue->id, 'id'=>'issue-edit-form']) !!}
<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>
<div id="subissues">
    <div id="subissue-items">

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
<div class="form-group">
    {!! Form::label('project_id', 'Project:') !!}
    {!! Form::select('project_id', $projectNames, null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('status_id', 'Status:') !!}
    {!! Form::select('status_id', $issueStatusLabels, null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('type_id', 'Type:') !!}
    {!! Form::select('type_id', $issueTypeLabels, null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
        {!! Form::label('estimation', 'Estimate:') !!}
        {!! Form::input('number', 'estimation', $estimation, ['class' => 'form-control']) !!}
</div>
    
<div class="form-group">
    {!! Form::label('deadline', 'Deadline:') !!}
    {!! Form::input('date', 'deadline', $deadline, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit('Update Issue', ['class' => 'btn btn-primary']) !!}
</div>
{!! Form::close() !!}
