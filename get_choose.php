<?php
include("db.php");
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
}

    
    $stmt = $conn->prepare("select pid,planname,validity,amount from plan  where pid =?");
    $plan = $_POST["plan"];
    $stmt->bind_param("s", $plan);
    
    $stmt->bind_result($pid,$planname,$validity,$amount);

    if ($stmt->execute()) {
        while ( $stmt->fetch() ) {
            $output[] = array ("pid"=>$pid,"planname"=>$planname,"validity"=>$validity,"amount"=>$amount);
        }
        echo json_encode( $output );
    }
    $stmt->close();




