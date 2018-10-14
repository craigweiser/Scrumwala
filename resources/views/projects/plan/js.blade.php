@section('beforebodyend')
<script>
    jQuery(document).ready(function($) {

        @include('common-js.sort-issues-js');

        /* When the "Activate" button is clicked, display the inline form to activate a sprint */
        $("button.sprint-activate").on('click', function() {
            $(this).next('.sprint-activate-form').fadeIn();
        });

        // Display the inline form for adding a sprint
        $("#action-add-sprint").on('click', function() {
            $("#action-add-sprint-body").fadeIn().show();
            $("#action-add-sprint-body form").find("input").filter(":visible").first().focus();
        });

        //@include('common-js.add-issues-js')

        // When the close icon is clicked, close the parent section (for inline forms)
        $(".close").on('click', function() {
            $(this).parent().parent().fadeOut();
        })

        // Archive an issue
        $('.archive-issue').on('click', function() {
            if (confirm('Are you sure?')) {
                var issueId = $.trim($(this).parents('li').attr('data-id'));
                $.ajax({
                    type: "POST",
                    cache: false,
                    url: "/issues/statuschange",
                    data: {
                        'issueId': issueId,
                        'machineNameOfNewIssueStatus':'archive',
                        'nextIssueId': $('li[data-id=' + issueId + ']').next().attr('data-id'),
                        'prevIssueId': $('li[data-id=' + issueId + ']').prev().attr('data-id'),
                        '_token': "{{ csrf_token() }}"
                    },
                    success: function(result) {
                        $('li[data-id=' + issueId + ']').fadeOut('slow');
                        var sprintMachineName = $('li[data-id=' + issueId + ']').parent().attr('id');
                        var issueCountInSprint = $('#' + sprintMachineName + ' li:visible').length - 1;
                        $('.sprint-name[data-machine-name=' + sprintMachineName + '] > span.issue-count')
                                .text('(' + issueCountInSprint + ')');
                    }
                });
            }
        });

        // Complete a sprint
        $('.sprint-complete').on('click', function() {
            $.ajax({
                type: "POST",
                cache: false,
                url: "/sprints/complete",
                data: {
                    '_token': "{{ csrf_token() }}",
                    'projectId':$.trim($(this).attr('data-project-id')),
                    'sprintMachineName': $.trim($(this).attr('data-id'))
                },
                success: function(result) {
                    if(result.status === 1)
                    {
                        $('#' + result.sprintMachineName).fadeOut(3500);
                        $('.sprint-complete').fadeOut(35000);
                        $('.sprint-header[data-machine-name=' + result.sprintMachineName + ']').fadeOut(3500);
                    }
                    else {
                        //
                    }
                    $('body').append('<div title="Please Note" id="sprint-complete-request-message">' + result.message + '</div>');
                    $(function() {
                        $("#sprint-complete-request-message").dialog();
                      });
                }
            });
        });


        // Toggle: show/hide sprint
        $(".toggle").on("click", function() {
          var listId = $(this).parent('h3').attr('data-machine-name');
          $("#" + listId).slideToggle();
        });

        @include('common-js.show-issues-js')

        @include('common-js.add-issues-js')

    });
</script>
@endsection