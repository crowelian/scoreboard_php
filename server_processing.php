<?php
include("config/db.php");

// initilize all variable
$params = $columns = $totalRecords = $data = array();
$params = $_REQUEST;
//define index of column name
$columns = array(
    0 =>'rank',
    1 =>'user',
    2 =>'score',
);

$where = $sqlTot = $sqlRec = "";

// getting total number records without any search
$sql = "SELECT id,user,score FROM highscores ORDER BY score ".$params['order'][0]['dir']." LIMIT 99";
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
while( $row = mysqli_fetch_row($queryRecords) ) {

    $row[0] = $i;

    $data[] = $row;

    $i++;
}

$json_data = array(
        "draw"            => intval( $params['draw'] ),
        "recordsTotal"    => intval( $totalRecords ),
        "recordsFiltered" => intval($totalRecords),
        "data"            => $data   // total data array
        );

echo json_encode($json_data);  // send data as json format
?>