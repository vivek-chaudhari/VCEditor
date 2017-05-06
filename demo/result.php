<?php

$con = mysqli_connect('localhost','root','','demo_editor_db') or die('Cannot established connection');

if($_POST['submit'])
{
	$sql = "select * from demo_content";
	$result = mysqli_query($con,$sql);

	if (mysqli_num_rows($result) > 0) {
		// output data of each row
		echo "<table border='1' cellspacing='6' cellpadding='3'>";
		echo "<tr><th>ID</th><th>Description</th></tr>";
		while($row = mysqli_fetch_assoc($result)) {
			echo "<tr><td>".$row["id"]."</td><td>".$row["description"]."</td></tr>";
		}
		echo "</table>";
	} else {
		echo "0 results";
	}
}
?>