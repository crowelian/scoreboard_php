// Here needed code


//Table init code (JQuery)
$(document).ready(function () {
    $('#scoreboardTable').DataTable({
        "order": [[ 2, "desc" ]],
        "paging":   false,
        "info":     false,
        "searching": false,
        "responsive": true,
        "aaSorting": [],
            columnDefs: [{
            orderable: false,
            targets: [0, 1]
            }]
    });
    $('.dataTables_length').addClass('bs-select');
});