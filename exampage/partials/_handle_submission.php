<?php
include '/xampp/htdocs/EntranceMS/database/connectdb.php';
session_start();
if(isset($_POST)){
    $data=file_get_contents("php://input"); // json string
    $resultData=json_decode($data,true); // return a php array
    $marks= $resultData['marks'];
    $symbol = $_SESSION['symbolNo'];

    $sql = "UPDATE `stuinfo` SET `result` = '$marks' WHERE `Symbol_No` = '$symbol' ";

    //execute query
    $result = $conn->query(query: $sql);  
    echo $marks; 


}
?>
