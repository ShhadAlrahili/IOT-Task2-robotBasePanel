<?php

$conn1 = new mysqli('localhost','root','','robot_base_panel');

if($conn1->connect_error){
    echo "$conn1->connect_error";
    die("Connection Failed : ". $conn1->connect_error);
} else {
    
    if($_GET["sb"]=="forward"){
        $forwod = $_GET["sb"];
        $stmt = $conn1->prepare("insert into move(movement_direction	) values(?)");
		$stmt->bind_param("s", $forwod);
		$execval = $stmt->execute();
		echo $execval;
        echo "$forwod";
    }
    elseif($_GET["sb"]=="left"){
    $left = $_GET["sb"];
    $stmt = $conn1->prepare("insert into move(movement_direction	) values(?)");
    $stmt->bind_param("s", $left);
    $execval = $stmt->execute();
    echo $execval;
    echo "$left"; 
    }

    elseif($_GET["sb"]=="Right"){
        $Right = $_GET["sb"];
        $stmt = $conn1->prepare("insert into move(movement_direction	) values(?)");
        $stmt->bind_param("s", $Right);
        $execval = $stmt->execute();
        echo $execval;
        echo "$Right"; 
    }
    elseif($_GET["sb"]=="Backward") {
        $Backward = $_GET["sb"];
        $stmt = $conn1->prepare("insert into move(movement_direction	) values(?)");
        $stmt->bind_param("s", $Backward);
        $execval = $stmt->execute();
        echo $execval;
        echo "$Backward"; 
    }
    else {
        $stop = $_GET["sb"];
        $stmt = $conn1->prepare("insert into move(movement_direction	) values(?)");
        $stmt->bind_param("s", $stop);
        $execval = $stmt->execute();
        echo $execval;
        echo "$stop"; 
    }
}



















?>
