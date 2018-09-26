<ul id="{{$sprint->machine_name}}" class="connectedSortable list-unstyled sprint-list">
    @foreach(App\Project::find($project->id)->getIssuesFromSprint($sprint->id) as $issue)
        @include('projects.common.issues')
    @endforeach
</ul>