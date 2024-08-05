<?php

include("db.php");
$stmt = $conn->prepare("select mid,name  from members where mid = ? ");

$barcode= $_POST["mno"];
$stmt->bind_param("s", $barcode);
$stmt->bind_result($mid,$name);

if ($stmt->execute())
 {
    while ( $stmt->fetch() ) 
    {
        $output[] = array ("id"=>$mid, "name"=>$name);
    }
 }
echo json_encode($output);
$stmt->close();

?>



