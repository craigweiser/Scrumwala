<ul id="{{$sprint->machine_name}}" class="connectedSortable list-unstyled sprint-list">
    @foreach($project->getActiveKanbanIssues() as $issue)
        @include('projects.common.issues')
    @endforeach
</ul>