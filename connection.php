<?php


	$motor1   = $_POST['motor1'];
    $motor2   = $_POST['motor2'];
    $motor3   = $_POST['motor3'];
    $motor4   = $_POST['motor4'];
    $motor5   = $_POST['motor5'];
    $motor6   = $_POST['motor6'];
	$statevalue = "off";
	// $run = $_POST["run1"];
	// Dat6base connectio6
	$conn = new mysqli('localhost','root','','robot_arm_control');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
        
		if(isset($_POST['run1'])) {
			$statevalue = "on";
			if(isset($_POST['save'])){
				$stmt = $conn->prepare("insert into motor(motor1, motor2, motor3, motor4, motor5, motor6) values(?, ?, ?, ?, ?, ?)");
				$stmt->bind_param("iiiiii", $motor1, $motor2, $motor3, $motor4, $motor5, $motor6);
				$execval = $stmt->execute();
				echo $execval;
				$stmt->close();
				$stmt1 = $conn->prepare("insert into robot_arm_state(state) values(?)");
				$stmt1->bind_param("s", $statevalue);
				$execval1 = $stmt1->execute();
				echo $execval1;
				echo "Information saved successfully...and robot arm state is ON";
				$stmt1->close();
			
				}
			}

		elseif(isset($_POST['save']) and $statevalue=="off"){
		$stmt = $conn->prepare("insert into motor(motor1, motor2, motor3, motor4, motor5, motor6) values(?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("iiiiii", $motor1, $motor2, $motor3, $motor4, $motor5, $motor6);
		$execval = $stmt->execute();
		echo $execval;
		$stmt->close();
		$stmt1 = $conn->prepare("insert into robot_arm_state(state) values(?)");
		$stmt1->bind_param("s", $statevalue);
		$execval1 = $stmt1->execute();
		echo $execval1;
		echo "Information saved successfully...and robot arm state is OFF";
		$stmt1->close();
	
		}
		
		
		
		
	}

	

?>
