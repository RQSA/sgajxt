<?php
		$Query = 'Select count(*) as AllNum from orders'; 
		$a     = mysqli_query( $conn, $Query ); 
		$b     = mysqli_fetch_assoc( $a ); 
		echo $b['AllNum']; //条数  

?>