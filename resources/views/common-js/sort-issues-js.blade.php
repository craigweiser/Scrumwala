var app = {};
app.sort = {};

/* Process Ajax request when a user updates an issue <-> sprint association via drag & drop */
$(function() {
    $( ".sprint-list" ).sortable({
        connectWith:".connectedSortable",
        stop: function( event, ui ) {}
    }).disableSelection();
});

$(".sprint-list").on("sortstart", function(event,ui)
{
    app.sort.issueId = $(ui.item[0]).attr('data-id');
    app.sort.currentNextIssueId = $('li[data-id=' + app.sort.issueId + ']').next().attr('data-id');
    app.sort.currentPrevIssueId = $('li[data-id=' + app.sort.issueId + ']').prev().attr('data-id');

});

$(".sprint-list").on("sortstop", function(event,ui)
{
    var draggedFromListId = $(this)[0].id;
    var draggedToListId = ui.item[0].parentElement.id;
    var issueId = $(ui.item[0]).attr('data-id');
    var projectId = $('#project-name').attr('data-id');

    // When an issue is dragged and dropped into a different sprint
    if(draggedFromListId !== draggedToListId)
    {
        $.ajax({
            type: "POST",
            cache: false,
            url: "/issues/sprintchange",
            data: {
                'issueId': issueId,
                'machineNameOfNewSprint':draggedToListId,
                'projectId':projectId,
                'nextIssueId': $('li[data-id=' + issueId + ']').next().attr('data-id'),
                'prevIssueId': $('li[data-id=' + issueId + ']').prev().attr('data-id'),
                '_token': "{{ csrf_token() }}"
            },
            success: function(result) {
                // Update issue counts for sprints - dragged from and to
                $('.sprint-name[data-machine-name=' + draggedFromListId + '] > span.issue-count')
                        .text('(' + $('#' + draggedFromListId + ' li').length + ')');
                $('.sprint-name[data-machine-name=' + draggedToListId + '] > span.issue-count')
                        .text('(' + $('#' + draggedToListId + ' li').length + ')');
            }
        });
    }

    // When an issue is dragged and dropped into same sprint
    if(draggedFromListId === draggedToListId)
    {
        $.ajax({
            type: "POST",
            cache: false,
            url: "/issues/priorityorder",
            data: {
                'issueId':issueId,
                'machineNameOfSprint':draggedToListId,
                'projectId':projectId,
                'currentPrevIssueId':app.sort.currentPrevIssueId,
                'currentNextIssueId':app.sort.currentNextIssueId,
                'newNextIssueId': $('li[data-id=' + issueId + ']').next().attr('data-id'),
                'newPrevIssueId': $('li[data-id=' + issueId + ']').prev().attr('data-id'),
                '_token': "{{ csrf_token() }}"
            },
            success: function(result) {
                // @todo display a notification?
            }
        });
    }
});