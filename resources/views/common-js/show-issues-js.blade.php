$('.show-issue').on('click', function(e){
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