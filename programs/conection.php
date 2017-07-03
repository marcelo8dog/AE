
<?php
	function conection()
	{
		$con=mysqli_connect("localhost","root","","ae");
		mysqli_set_charset($con,"utf8");
		return $con;
	}
?>
