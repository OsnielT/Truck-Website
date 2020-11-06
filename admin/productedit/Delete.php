<?php

	require_once "../../include/db.php";

if ($dbh) {

	try{

		$select = " DELETE from inventory where id=?";
		$stmt = $dbh->prepare($select);
		$stmt->execute(array($_GET['del_id']));
	}catch(PDOException $error){
		print "Error!: " . $e->getMessage() . "<br/>";
		die();
	}

// $query = mysqli_query($link, $select) or die($select);
header("location: http://localhost/Trucks/admin/");
}

?>