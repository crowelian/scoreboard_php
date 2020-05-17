<?php


include("config/db.php");



//if(isset($_POST['view'])){

    $i = 1;

    
    if($_POST["view"] != '')
    {
        $update_query = "UPDATE highscores SET notification_status = 1 WHERE notification_status=0";
        mysqli_query($dbCon, $update_query);
    }
    

    $query = "SELECT * FROM highscores ORDER BY id DESC LIMIT 3";
    $result = mysqli_query($dbCon, $query);
    $output = '';



    if(mysqli_num_rows($result) > 0)
    {
        //$output .= "{ 'data': [";

            
            $output .= '<span class="s-span">Latest Players:</span><br>';
        while($row = mysqli_fetch_array($result))
        {

            $output .= '
  
            <button class="btn btn-dark" style="width: 100%;" onClick="reloadTable" class="dropdown-item">
            <strong>'.$row["user"].'</strong><br />
            <small><em>'.$row["score"].'</em></small>
            </button>
            
          
            ';
        }
    }

    else{
        $output .= '<h2>No Players were found!</h2>';
    }

    $status_query = "SELECT * FROM highscores WHERE notification_status=0";
    $result_query = mysqli_query($dbCon, $status_query);
    $count = mysqli_num_rows($result_query);

    $data = array(
    'notification' => $output,
    'unseen_notification'  => $count
    );

    echo json_encode($data);

//}

?>
