<?php
	include 'db_connection.php';
	$idSchool = $_GET['id_school'];
	$consult = "select id_image, title, description, location from images where id_school = '$idSchool'";
	$result = mysqli_query($db_connection, $consult);
	$rows = array();
	$counter = 0;
	echo '[';
	while($row = mysqli_fetch_assoc($result)) {
		echo '{"id_image": "'.$row['id_image'].'",';
		echo '"title": "'.utf8_encode($row['title']).'",';
		echo '"description": "'.utf8_encode($row['description']).'",';
		echo '"location": "'.$row['location'].'"';
		++$counter;
		if ($counter == mysqli_num_rows($result)) {
			echo "}";
		} else {
			echo "},";
		}
	}
	echo "]";
//	print json_encode($rows);
?>