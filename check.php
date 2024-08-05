<?php
include("db.php");
$str = "SELECT  mid,planid,paid_date,expire_date FROM payment";
$result=mysqli_query($conn,$str);
$num=mysqli_num_rows($result);
$output = [];
$today = strtotime(date("Y/m/d"));
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
{ 
    $mid =   $row['mid'];
    $planid = $row['planid'];
    $paid_date = $row['paid_date'];
    $expire_date = $row['expire_date'];
    if($today < strtotime($expire_date)) 
    {
        $status = "Active"; 
    }
    else 
    {
        $status = "Expired";
    }
    $output[] = ['mid' => $mid, 'planid' => $planid,'paid_date' => $paid_date,'expire_date' => $expire_date,'status' => $status];
} 
echo json_encode($output);
?>


