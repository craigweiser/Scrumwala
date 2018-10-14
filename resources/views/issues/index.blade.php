@extends('app')
@section('content')
    <div class="col-md-8">
        <h2>Issues @if($filter != 'active') <span style="font-size: 75%">(filtered - {{$filter}})</span>@endif</h2> 
        @if($filter != 'all')
        <a class="btn btn-default btn-sm" href="{{action('IssuesController@index', ['filter' => 'all'])}}">Show All</a>
        @endif
        @if($filter != 'active')
        <a class="btn btn-default btn-sm" href="{{url('issues/')}}">Active Only</a>
        @endif
        @if($filter != 'andCompleted')
        <a class="btn btn-default btn-sm" href="{{action('IssuesController@index', ['filter' => 'andCompleted'])}}">+ Completed</a>
        @endif
        <div class="col-md-12 project-plan main-content">
            <div class="container-fluid col-md-10">
                <ul class="connectedSortable list-unstyled sprint-list">
                    @foreach($issues as $issue)
                        @include('projects.common.issues')
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
@include('issues.js')
