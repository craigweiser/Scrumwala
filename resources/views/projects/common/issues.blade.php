<li class="ui-state-default" data-id="{{$issue->id}}">
    <p><a href="/issues/{{$issue->id}}" class="show-issue">
        <span class="issue-id">#{{$issue->id}}</span>
        <span class="@if($issue->issueStatus->label  == 'Complete') strikethrough @endif">
            {{$issue->title}}
        </span>
    </a>
    </p>
    @if(!isset($project))
    <p>
        {{$issue->project->name}}
    </p>
    @endif
    <div class="row issue-actions-attributes">
        <div class="col-md-4 issue-actions">
            <div class="btn-group pull-left">
                <a href="/issues/{{$issue->id}}/edit" class="edit-issue btn btn-default btn-sm">Edit</a>
                <a href="#" class="btn btn-default btn-sm archive-issue">Archive</a>
            </div>
        </div>
        <div class="col-md-4">

        </div>
        <div class="col-md-4">
            <div class="btn-group pull-right">
                @if($issue->deadline)
                    <span class="issue-deadline">
                        <img alt="deadline" title="deadline" width="18" height="18" src="{{asset('css/icons/ic_schedule_black_36dp.png')}}"/>
                        <span>
                            {{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $issue->deadline)->diffForHumans()}}
                        </span>
                    </span>
                @endif
                <span class="issue-type {{$issue->issueType->machine_name}}">
                    {{$issue->issueType->label}}
                </span>
                <span class="issue-status {{$issue->issueType->machine_name}}">
                    {{$issue->issueStatus->label}}
                </span>
                <span class="issue-estimation">
                    {{$issue->estimation or '-'}}
                </span>
            </div>
        </div>
    </div>
</li>