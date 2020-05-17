<?php
include("config/db.php");

// initilize all variable

$params = $columns = $totalRecords = $data = array();
$params = $_REQUEST;
$direction = $params['order'][0]['dir'];


//define index of column name
$columns = array(
    0 =>'id',
    1 =>'user',
    2 =>'score',
);

$where = $sqlTot = $sqlRec = "";

// getting total number records without any search
$sql = "SELECT id, user, score FROM highscores ORDER BY score ".$params['order'][0]['dir']." LIMIT 99";
$sqlTot .= $sql;
$sqlRec .= $sql;

//concatenate search sql if value exist
if(isset($where) && $where != '') {
    $sqlTot .= $where;
    $sqlRec .= $where;
}


$queryTot = mysqli_query($dbCon, $sqlTot) or die("database error:". mysqli_error($dbCon));

$totalRecords = mysqli_num_rows($queryTot);

$queryRecords = mysqli_query($dbCon, $sqlRec) or die("error to fetch scores data");

$i = 1;
if ($direction == "asc") {
    $z = $totalRecords;
}


while( $row = mysqli_fetch_row($queryRecords) ) {
    
    if ($direction == "asc") {
    $row[0] = $z;
    } else {
        $row[0] = $i;  
    }
    
    $data[] = $row;

    if ($direction == "asc") {
        $z--;
    } else {
        $i++;
    }
}

$json_data = array(
        "draw"            => intval( $params['draw'] ),
        "recordsTotal"    => intval( $totalRecords ),
        "recordsFiltered" => intval($totalRecords),
        "data"            => $data   // total data array
        );

echo json_encode($json_data);  // send data as json format
?>