@if($issue)
    <div class="clearfix container-fluid main-content">
        <h3 id="issue-title" data-id="{{$issue->id}}">{{$issue->title}}</h3>
        <a href="/issues/{{$issue->id}}/edit" class="edit-issue btn btn-default btn-sm">Edit</a>
        <p>Description: {{$issue->description}}</p>
        <div id="show-subissues">
            @include('issues.common.subissue')
        </div>
        <p>Status: {{App\IssueStatus::find($issue->status_id)->label}}</p>
        <p>Estimate: {{$issue->estimation or '-'}}</p>
        <?php $issueDeadline = $issue->deadline;?>
        @if($issueDeadline)
        <p>Deadline:   {{$issueDeadline->year}}-{{$issueDeadline->month}}-{{$issueDeadline->day}}</p>
        @endif
        <p>Project: {{App\Project::find($issue->project_id)->name}}</p>
    </div>
    <div id="action-messages" class="container-fluid">
    </div>
@endif
