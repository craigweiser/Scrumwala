<ul id="{{$status}}" class="connectedSortable list-unstyled sprint-list">
    @foreach($issues as $issue)
        <li class="ui-state-default" data-id="{{$issue->id}}">
            <a href="/issues/{{$issue->id}}" class="show-issue" data-issue-id="{{$issue->id}}">
                <span class="issue-id">#{{$issue->id}}</span>
                <span @if($status == 'complete') class="strikethrough" @endif>
                    {{$issue->title}}
                </span>
            </a>
            @include('issues.issue.deadline')
            <div class="row">
                <div class="col-md-6">
                    <a href="/issues/{{$issue->id}}/edit" class="edit-issue btn btn-default btn-xs">
                        Edit
                    </a>
                </div>
                <div class="col-md-6">
                    <div class="btn-group pull-right">
                        <span class="issue-type {{$issue->issueType->machine_name}}">
                            {{$issue->issueType->label}}
                        </span>
                        <span class="issue-estimation">
                            {{$issue->estimation or '-'}}
                        </span>
                    </div>
                </div>
            </div>
        </li>
    @endforeach
</ul>
