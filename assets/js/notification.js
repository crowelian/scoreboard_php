// Simple notification system for scoreboard
let debugIsOn = true;
cError = [
    'background: #e3230e',
    'border: 1px solid #3E0E02',
    'color: white',
    'display: block',
    'text-shadow: 0 1px 0 rgba(0, 0, 0, 0.3)',
    'box-shadow: 0 1px 0 rgba(255, 255, 255, 0.4) inset, 0 5px 3px -5px rgba(0, 0, 0, 0.5), 0 -13px 5px -10px rgba(255, 255, 255, 0.4) inset',
    'line-height: 20px',
    'text-align: center',
    'font-weight: bold'
].join(';');
let newData = "";


$(document).ready(function () {

    // updating the view with notifications using ajax
    function load_unseen_notification(view = '') {
        if (debugIsOn) {
            //console.log("Debug: loading notifications...");
        }

        $.ajax({
            url: "getNotifications.php",
            method: "POST",
            data: { view: view },
            dataType: "json",
            success: function (data) {
                //console.log("data:" + data);
                $('.dropdown-menu').html(data.notification);

                if (data.unseen_notification > 0) {

                    $('.count').html(data.unseen_notification);

                    if (debugIsOn) {
                        //console.log("Debug: loaded new notifications...");
                    }
                }

            },
            error: function(xhr, ajaxOptions, thrownError){
                //alert(xhr.status);
                console.log("%c AJAX ERROR: " + xhr.status +" - " + ajaxOptions + " !!! " + thrownError, cError);
            }

        });

    }

    load_unseen_notification();


    // load new notifications
    $(document).on('click', '.dropdown-toggle', function () {

        $('.count').html('');

        let notifSeen = false;
        load_unseen_notification('yes');

    });

    setInterval(function () {
        load_unseen_notification();
    }, 5000);

});



function reloadTable() {
    console.log("%c DEBUG", cError);
}



