<?php
	require 'config/config.php';
	$conn = new connector();
	if(isset($_GET['q']))
	{	
		$query = "select * from hotel where hotelName like '%".$_GET['q']."%'";
		if (isset($_GET['s']))
		{
			$query = $query." order by ".$_GET['s']." ".$_GET['u'];
		}
		$result = $conn->executeQuery($query);
		$r = [];
		while($row = mysqli_fetch_assoc($result))
			$r['root'][] = $row;
		
		echo json_encode($r);
	}
	else
	{
		$query = "select * from hotel";
		$result = $conn->executeQuery($query);
		$r = [];
		while($row = mysqli_fetch_assoc($result))
			$r['root'][] = $row;
		echo json_encode($r);
	}
?>