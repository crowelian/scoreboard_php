<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);


if(isset($_POST["inputPlayerName"]))
{
    include("config/db.php");

    $player = mysqli_real_escape_string($dbCon, $_POST["inputPlayerName"]);
    $score = mysqli_real_escape_string($dbCon, $_POST["inputScore"]);
    $query = "INSERT INTO highscores(user, score)VALUES ('$player', '$score')";

    mysqli_query($dbCon, $query);

}

?>