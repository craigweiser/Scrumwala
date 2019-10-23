$('body').on('click', '#add-subissue', function() {
    var input = $('#subissue-input input').val();
    var issue_id = $('#subissues').data('issueId');
    console.log('input: ' + input);
    console.log('issue_id: ' + issue_id);
    $.post( "/subissues", { subissue: input, issue_id: issue_id, "_token": "{{ csrf_token() }}"}, function( data ) {
        console.log( data.description );
        console.log( data.done );
        console.log( data.issue_id ); 
        // add issue to list
        var newSubissue = $(
            '<div/>',
            {
                class: 'subissue-item',
                text: ' '+data.description+' '
            }
        ).prependTo('#subissue-items');
        var subissueCheckbox = $(
            '<input/>',
            {
                class: 'subissue-checkbox',
                name: 'subissue_checkbox',
                type: 'checkbox'
            }
        ).prependTo(newSubissue);
        var removeButton = $(
            '<button/>',
            {
                class: 'btn btn-danger btn-xs remove-subisse-item',
                type: 'button'
            }
        ).attr('data-subissue-id', data.id).appendTo(newSubissue);
        $(
            '<span/>',
            {
                class: 'glyphicon glyphicon-remove',
            }
        ).attr('aria-hidden', 'true').appendTo(removeButton);
        $('#subissue').val('');
      }, "json");
});
$('body').on('click', '.remove-subisse-item', function() {
    var subissueItemToDelete = $(this).parent();
    var subissue_id = subissueItemToDelete.data('subissueId');
    console.log('subissue_id to be deleted: ' + subissue_id);
    $.ajax( {
        type: "DELETE",
        url: "/subissues/" + subissue_id, 
        data: {"_token": "{{ csrf_token() }}", "_method": "DELETE"}
    }).done(function( result ) {
        console.log("Result of the delete request was: " + result.msg );
        // delete issue from list
        subissueItemToDelete.remove();
    });
});
$('body').on('click', '.subissue-checkbox', function() {
    var subissueItemToMarkAsDone = $(this).parent();
    var subissue_id = subissueItemToMarkAsDone.data('subissueId');
    if ($(this).is(":checked")) {
        console.log('subissue_id to be marked as done: ' + subissue_id);
        $.ajax( {
            type: "PUT",
            url: "/subissues/done/" + subissue_id, 
            data: {"_token": "{{ csrf_token() }}", "_method": "PUT"}
        }).done(function( result ) {
            console.log("Result of the put request was: " + result.msg );
            if(result.msg == 'ok') {
                // add done label
            }
        });
    } else {
        console.log('subissue is already done mark as not done: ' +  subissue_id);
        $.ajax( {
            type: "PUT",
            url: "/subissues/todo/" + subissue_id, 
            data: {"_token": "{{ csrf_token() }}", "_method": "PUT"}
        }).done(function( result ) {
            console.log("Result of the put request was: " + result.msg );
            if(result.msg == 'ok') {
                // remove done label
            }
        });
    }
});