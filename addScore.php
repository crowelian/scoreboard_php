<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);


if(isset($_POST["inputPlayerName"]))
{
    include("config/db.php");

    

    $player = mysqli_real_escape_string($dbCon, $_POST["inputPlayerName"]);
    $score = mysqli_real_escape_string($dbCon, $_POST["inputScore"]);

    // Check user
    $player_check = mysqli_query($dbCon, "SELECT user FROM highscores WHERE user='$player'");
	$num_rows0 = mysqli_num_rows($player_check);
	if($num_rows0 > 0) {
        $_SESSION["ErrorMessage"] = "Playername already exists!";
        echo $_SESSION["ErrorMessage"];
	} else {
        $query = "INSERT INTO highscores(user, score)VALUES ('$player', '$score')";

        mysqli_query($dbCon, $query);

        $_SESSION["SuccessMessage"] = "Player highscore added!";
        echo $_SESSION["SuccessMessage"];
    }

    
     

}

?>