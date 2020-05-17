// JS code


// Table init code (JQuery)
var SERVER_SIDE_FUNC = "server_processing.php";
var table;

$(document).ready(function () {
    table = $('#scoreboardTable').DataTable({
            "destroy": true,
            "language": {
                "zeroRecords": "No Players Found",
                "processing": 'Loading...'
              },
            "order": [[2, "desc"]],
            "paging": false,
            "info": false,
            "hideCount": true,
            "searching": false,
            "responsive": true,
            "aaSorting": [],
            columnDefs: [{
                orderable: false,
                targets: []
            }],
            "processing": true,
            "serverSide": true,
            "ajax":SERVER_SIDE_FUNC,
            "columns": [ {"data" : "0"}, {"data" : "1"}, {"data" : "2"} ]
            
    });
    
    $('.dataTables_length').addClass('bs-select');
    
});

function reloadTable() {
    table.ajax.reload();
    console.log("%c Scoreboard refreshed!", cSuccess);
}

$(document).ready(function () {
    // Ajax for handling new player score sending
    // submit form and get new records
    $('#playerScore_form').on('submit', function (event) {
        event.preventDefault();
        console.log("SENDING!");

        if ($('#inputPlayerName').val() != '' && $('#inputScore').val() != '') {
            var form_data = $(this).serialize();

            $.ajax({
                url: "addScore.php",
                method: "POST",
                data: form_data,
                success: function (data) {
                    console.log("data: " + data);
                    $('#playerScore_form')[0].reset();
                    if ($.fn.load_unseen_notification) {
                        load_unseen_notification();
                    }
                    if (data === "Playername already exists!") {
                        console.log("%c Playername already taken!", cError);
                        showNotification("The name is already taken!", "alert-danger");
                    } else if (data === "Player highscore added!") {
                        console.log("%c New score added!", cSuccess);
                        showNotification("New player score added!", "alert-success");
                        reloadTable();
                    }

                },
                error: function(xhr, ajaxOptions, thrownError){
                    //alert(xhr.status);
                    console.log("%c AJAX ERROR: " + xhr.status +" - " + ajaxOptions + " !!! " + thrownError, 'background: #e3230e;');
                }
            });

        }
        else {
            alert("Both Fields are Required");
        }

    });

    
});



