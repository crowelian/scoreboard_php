<?php 
include("includes/header.php");
?>

<body>

<div class="container">

    <div class="row">
        <div class="col text-center">
            <h1 id="main-title">Scoreboard service</h1>


            <div id="scoreNotifications" class="dropdown float-right">
                <a href="#" class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="badge badge-danger count" style="border-radius:10px;"></span><i class="fa fa-bell"></i>
                </a>
                <div class="dropdown-menu text-center dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                <div class="dropdown-header">Latest players:</div> 
                    <!-- notifications here -->
                </div>
            </div>

        </div>
    </div>


    


    <div class="row">
        <div class='col'>
            <!--Table-->
            <table id="scoreboardTable" class="table">
                <!--Table head-->
                <thead>
                    <tr>
                        <th>Rank</th>
                        <th>Player</th>
                        <th>Score</th>
                    </tr>
                </thead>
                <!--Table head-->
                <!--Table body-->
                <tbody id="scoresHere">
                    
                </tbody>
                <!--Table body-->
            </table>
            <!--Table-->
        </div>
    </div>

    <div id="notify" class="row">
        <div id="n-msg" class="col-md-12 alert "></div>
    </div>

    <div id="submitNewPlayer" class="col card">
        <form method="post" id="playerScore_form">
        <div class="form-group">
            <label for="inputPlayerName">Name</label>
            <input type="text" name="inputPlayerName" class="form-control" id="inputPlayerName" aria-describedby="nameHelp" placeholder="Enter player name">
            <small id="nameHelp" class="form-text text-muted">Do not use already taken name!</small>
        </div>
        <div class="form-group">
            <label for="inputScore">Score</label>
            <input type="text" name="inputScore" class="form-control" id="inputScore" placeholder="Player score">
        </div>
        <button type="submit" class="btn btn-outline-success btn-block"><i class="fa fa-plus"></i> Add a new score <i class="fa fa-plus"></i></button>
        </form>
    </div>

</div> <!-- end of container -->



</body>

<?php include("includes/footer.php"); ?>