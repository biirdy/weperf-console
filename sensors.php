<?php
	// Opens a connection to a MySQL server
	$con = mysqli_connect("localhost","root","root","tnp");
	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	//if sensor_id is set only get individual sensor
	$query = '';
	if(isset($_GET['sensor_id'])){
		$query = "SELECT * FROM sensors WHERE sensor_id = " . $_GET['sensor_id'];
	}else{
		$query = "SELECT * FROM sensors";
	}
	
	$results = mysqli_query($con, $query);
	if (!$results) {
	  die('Invalid query: ' . mysqli_error());
	}

	$data = array();

    while ($row = @mysqli_fetch_assoc($results)){
    	$data[] = $row;
    }

    echo json_encode($data);

    mysqli_close($con);
?>