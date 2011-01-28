<?php	
	$query = "select * from places";
	$result = mysql_query($query);
	while($row = mysql_fetch_array($result)) echo $row['placeid'];
?>