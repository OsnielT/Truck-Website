<?php

	$servername = "localhost";
	$username = "root";
	$password = "";

	$link = mysqli_connect("localhost", "root", "", "Trucks");

if ($link) {
$select = " DELETE from trucks where id='".$_GET['del_id']."'";
$query = mysqli_query($link, $select) or die($select);
header("location: http://localhost/Trucks/admin/");
}

?>