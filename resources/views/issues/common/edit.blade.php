<h2>Edit Issue: {!! $issue->title !!} </h2>
{!! Form::model($issue, ['method' =>'PATCH','action' => ['IssuesController@update',$issue->id]]) !!}
<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>
<div id="edit-subissues">
    @include('issues.common.subissue')
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
