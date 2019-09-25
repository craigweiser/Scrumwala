$('body').on('click', '#add-subissue', function() {
    var input = $('#subissue-input input').val();
    var issue_id = $('#issue-edit-form').data('issueId');
    console.log('input: ' + input);
    console.log('issue_id: ' + issue_id);
    $.post( "/subissues", { subissue: input, issue_id: issue_id, "_token": "{{ csrf_token() }}"}, function( data ) {
        console.log( data.name ); // John
        console.log( data.time ); // 2pm
      }, "json");
});
$('body').on('click', '#remove-subissue', function() {
    alert('subissue remove button clicked')
});