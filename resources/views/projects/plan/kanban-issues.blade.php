<ul id="{{$sprint->machine_name}}" class="connectedSortable list-unstyled sprint-list">
    @foreach(App\Project::find($project->id)->getActiveKanbanIssues() as $issue)
        @include('projects.common.issues')
    @endforeach
</ul>