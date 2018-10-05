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
        <table class="table table-hover">
            <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Status</th>
                <th>Type</th>
                <th>Project</th>
                <th>Sprint</th>
            </tr>
            </thead>
            <tbody>
            @foreach($issues as $issue)
                <tr>
                    <td><a href="/issues/{{$issue->id}}">{{$issue->id}}</a></td>
                    <td><a href="/issues/{{$issue->id}}">{{$issue->title}}</a></td>
                    <td>{{$issue->issueStatus->label}}</td>
                    <td>{{$issue->issueType->label}}</td>
                    <td>{{$issue->project->name}}</td>
                    <td>{{$issue->sprint->name}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <?php echo $issues->render() ?>
    </div>
@endsection
