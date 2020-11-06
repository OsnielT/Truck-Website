<?php

	require_once "../include/db.php";

if ($dbh) {
	
	if(isset($_POST['insert'])){

		$truck_name = $_POST['name'];

		//$truck_image = array_filter($_FILES['image']['name']);

		$price = $_POST['price'];
		$towingcap = $_POST['TowingCap'];
		$miles = $_POST['miles'];
		$mpg_city = $_POST['city'];
		$mpg_highway = $_POST['highway'];
		$color = $_POST['color'];
		$int_color = $_POST['int_color'];
		$engine = $_POST['engine'];
		$drive_type = $_POST['drive_type'];
		$fuel = $_POST['fuel'];
		$transmission = $_POST['transmission'];

		// File upload configuration
		$targetDir = "pictures/";
		$allowTypes = array('jpg','png','jpeg');
		
		$statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = '';
		if(!empty(array_filter($_FILES['image']['name']))){
			foreach($_FILES['image']['name'] as $key=>$val){
				// File upload path
				$fileName = basename($_FILES['image']['name'][$key]);
				$targetFilePath = $targetDir . $fileName;
				
				// Check whether file type is valid
				$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

				if(in_array($fileType, $allowTypes)){
					// Upload file to server
					if(move_uploaded_file($_FILES["image"]["tmp_name"][$key], $targetFilePath)){
						// Image db insert sql
						$insertValuesSQL .= "".$fileName.",";
					}else{
						$errorUpload .= $_FILES['image']['name'][$key].', ';
					}
				}else{
					$errorUploadType .= $_FILES['image']['name'][$key].', ';
				}
			}
			
			if(!empty($insertValuesSQL)){
				$insertValuesSQL = trim($insertValuesSQL,',');

				$insert = $dbh->query("INSERT INTO inventory VALUES ('NUL', '$insertValuesSQL', '$truck_name','$price','$towingcap','$miles','$mpg_city','$mpg_highway', '$color', '$int_color', '$engine', '$drive_type', '$fuel', '$transmission') ");
				$insert->execute();
				if($insert){
					$errorUpload = !empty($errorUpload)?'Upload Error: '.$errorUpload:'';
					$errorUploadType = !empty($errorUploadType)?'File Type Error: '.$errorUploadType:'';
					$errorMsg = !empty($errorUpload)?'<br/>'.$errorUpload.'<br/>'.$errorUploadType:'<br/>'.$errorUploadType;
					$statusMsg = '<div class="alert alert-success alert-dismissible fade show" role="alert"> Your Vehicle was Added!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
				}else{
					$statusMsg = '<div class="alert alert-success alert-dismissible fade show" role="alert"> Your Vehicle was Added!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';

				}
				$_POST = null;
			}

		}else{
			$statusMsg = 'Please select a file to upload.';
		}
    

	};

}else {
	
	echo "no connection...";

}


?>