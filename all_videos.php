<?php
	include 'db_connection.php';
	$consult = "select * from videos";
	$result = mysqli_query($db_connection, $consult);
	$rows = array();
	$counter = 0;
	echo '[';
	while($row = mysqli_fetch_assoc($result)) {
		echo '{"id_video": "'.$row['id_video'].'",';
		echo '"title": "'.utf8_encode($row['title']).'",';
		echo '"url": "'.$row['url'].'"';
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