<?php 
include("includes/header.php");
?>

<body>

<div class="container">
    <div class="row">
        <div class='col-sm-12'>
            <!--Table-->
            <table id="scoreboardTable" class="table">
                <!--Table head-->
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Player Name</th>
                        <th>Score</th>
                    </tr>
                </thead>
                <!--Table head-->
                <!--Table body-->
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>9000</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>500</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Larry</td>
                        <td>110</td>
                    </tr>
                </tbody>
                <!--Table body-->
            </table>
            <!--Table-->
        </div>
    </div>
</div>

</body>

<script>
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
</script>