<?php

include("db.php");
if(isset($_POST["from_date"], $_POST["to_date"]))
{

   $fdate = $_POST["from_date"];
   $todate = $_POST["to_date"];

  
   $fnewDate = date("d-m-Y", strtotime($fdate));
   $tonewDate = date("d-m-Y", strtotime( $todate));



    $stmt = $conn->prepare("SELECT m.mid,m.name,p.amount,pay.month,pay.year,pay.paid_date 
    FROM members m  INNER JOIN payment pay on m.mid = pay.mid INNER JOIN plan p on p.pid = pay.planid 
    WHERE pay.paid_date BETWEEN '" . $fnewDate . "' AND '" .  $tonewDate ."'"); 
    $stmt->bind_result($mid,$name,$amount,$month,$year,$paid_date);

if ($stmt->execute()) {
        while ($stmt->fetch()) {
            $output[] = array("mno"=> $mid,"name" => $name,"amount" => $amount,
            "month" => $month,"year" => $year,"paydate" => $paid_date);
        }

        echo json_encode($output);
    }
    $stmt->close();

}

