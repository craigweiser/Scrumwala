// Display the inline form for adding an issue
var dWidth = $(window).width() > 640 ? 600 : 'auto'
$("#action-add-issue-body").dialog({
    autoOpen: false,
    title: "Add Issue",
    modal: true,
    width: dWidth,
    minWidth: 320,
    maxWidth: 640,
    show: {
      effect: "fade",
      duration: 500
    },
});
$("#action-add-issue").on('click', function() {
    $("#action-add-issue-body").dialog("open");
});
$('body').on('click', '.edit-issue', function(e){
    e.preventDefault();
    var issueUrl = $(this).attr('href');
    var issueDialog = $('<div style="display:none" class="loading">...loading</div>').appendTo('body');
    var dWidth = $(window).width() > 640 ? 600 : 'auto'
    issueDialog.dialog({
        close: function(event, ui) {
            issueDialog.remove();
        },
        modal: true,
        width: dWidth,
        minWidth: 320,
        maxWidth: 640
    });
    issueDialog.load(
        issueUrl, 
        function (responseText, textStatus, XMLHttpRequest) {
            issueDialog.removeClass('loading');
        }
    );
});
