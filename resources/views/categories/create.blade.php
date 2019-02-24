@extends('app')

@section('content')
<div class="container-fluid col-md-4">    
    <h1>Create a Categorie</h1>
    {!! Form::model($categorie = new \App\Categorie, ['url' => 'categories']) !!}
        {!! Form::hidden('project_id', $project->id) !!}
    
        <div class="form-group">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
        </div>

        <div class="form-group">
                {!! Form::label('description', 'Description:') !!}
                {!! Form::text('description', null, ['class' => 'form-control', 'required']) !!}
            </div>
    
        <div class="form-group">
            {!! Form::label('color', 'Color(hex ): #') !!}
            {!! Form::text('color', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Create Categorie', ['class' => 'btn btn-primary']) !!}
        </div>
    {!! Form::close() !!}
    
</div>
@include('errors.list')
@endsection