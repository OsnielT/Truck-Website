<?php
	$servername = "localhost";
	$username = "root";
	$password = "";

	$link = mysqli_connect("localhost", "root", "", "Trucks");

	if ($link) {

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


			$insert = $link->query("INSERT INTO trucks VALUES ('NUL', '$insertValuesSQL', '$truck_name','$price','$towingcap','$miles','$mpg_city','$mpg_highway', '$color', '$int_color', '$engine', '$drive_type', '$fuel', '$transmission') ");
			
			


            if($insert){
                $errorUpload = !empty($errorUpload)?'Upload Error: '.$errorUpload:'';
                $errorUploadType = !empty($errorUploadType)?'File Type Error: '.$errorUploadType:'';
                $errorMsg = !empty($errorUpload)?'<br/>'.$errorUpload.'<br/>'.$errorUploadType:'<br/>'.$errorUploadType;
                $statusMsg = '<div class="alert alert-success alert-dismissible fade show" role="alert"> Your Vehicle was Added!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
            }else{
                $statusMsg = '<div class="alert alert-success alert-dismissible fade show" role="alert"> Your Vehicle was Added!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';

            }
        }

    }else{
        $statusMsg = 'Please select a file to upload.';
    }
    

		};

	}else {
		
echo "no connection...";
	
	}


?>

<!DOCTYPE html>
<html>
<head>
	
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<title>Admin</title>
</head>
<style type="text/css">
div#Sidebar-wrapper {
    transition: all .3s ease;
    flex: unset;
    width: 335px;
    background: #454545;
    padding-top: 1rem;
    font-size: 1.5rem;
}
ul.sidebar-nav a {
    color: #fff !important;
    text-decoration: none;
}
.toggled {
    width: 10px !important;
    overflow: hidden;
    display: block !important;
    flex: unset;
}
.sidebar-nav li {
    border-top: 1pt solid #333;
    padding: 1rem;
    transition: all .3s ease;
}
.sidebar-nav li:hover {
background:#333;
}
ul.sidebar-nav {
    list-style-type: none;
    padding: 0;
    margin: 0;
}
.click:hover{
	cursor: pointer;
}
tr.click {
    padding: 1rem 0.8rem;
    transition: all .3s ease;
    margin: 3rem 0;
    border-radius: 1rem;
}
.click td {
	vertical-align: middle;
}
tr.click:hover {
	box-shadow: 0 0px 0px 2px rgba(0, 128, 230, 0.51), 0 0px 0px 5px rgba(107, 211, 255, 0.47);
}
table { border-collapse: separate; }


</style>
<body>


	<!-- Content -->
	<div id="wrapper" class="container-fluid">

		<div class="row">
			<div id="Sidebar-wrapper" class="col-lg-3">
				<ul class="sidebar-nav">
					<li><a href="#">Dashboard</a></li>
					<li><a href="#">Add Vehicle</a></li>
					<li><a href="#">Inventory</a></li>
					<li><a href="#">Settings</a></li>
					<li><a href="#">Logout</a></li>
				</ul>

			</div>
			<div class="col-lg-9">
				<a class='btn btn-success' id='menu-toggle' href="#">Toggle Menu</a>
			<fieldset>
	       		<legend style="font-size:2rem;border-bottom: 1pt solid #e7e7e7;"> Add Vehicles </legend>
	        </fieldset>
			<form id="addcarform" action="" method="POST" enctype="multipart/form-data" >
				<?php if(isset($statusMsg)){ echo "".$statusMsg; }?>

				<div class="col-lg-12 p-4">
				
						<div class="form-group">
							<input placeholder="Image:" type="file" class="form-control-file" name="image[]" multiple="multiple" id="image"/>
						</div>
						<div class=" form-group">
						    <input placeholder="Title" type="text" class="form-control" name="name" id="name">
						</div>
						<div class="form-row">
							<div class="col-md-4 mb-3">				
									<input placeholder="Price:" class="form-control" id="price" type="number" name="price">
								</div>
								<div class="col-md-8 mb-3">	
									<input placeholder="Towing Capacity:" class="form-control" type="number" id="TowingCap" name="TowingCap">
								</div>
							</div>
						<div class=" form-group">
							<input placeholder="Miles:" type="number" class="form-control" name="miles" id="miles">
						</div>
						<h6>MPG:</h6>
						<div class="form-row">
							<div class="col-md-6 mb-3">
								<input placeholder="City:" class="form-control " id="city" type="number" name="city"> 
							</div>
							<div class="col-md-6 mb-3">
								<input placeholder="Highway:" class="form-control " type="number" id="highway" name="highway">
							</div>
						</div>
						<div class="form-row">
							<div class="col-md-4 mb-3">
								<input placeholder="Color:" class="form-control " id="color" type="text" name="color"> 
							</div>
							<div class="col-md-4 mb-3">
							   <input placeholder="Interior Color:" class="form-control " id="int_color" type="text" name="int_color"> 
							</div>
							<div class="col-md-4 mb-3">
							   <input placeholder="Engine:" class="form-control " id="engine" type="text" name="engine"> 
							</div>
						</div>
						<div class="form-row">

							<div class="col-md-4 input-group mb-3">
								<div class="input-group-prepend">
									<label class="input-group-text" for="drive_type">Drive Type</label>
							  </div>
							  <select class="custom-select" name="drive_type" id="drive_type">
							  	<option selected>Choose...</option>
							    <option value="RWD">RWD</option>
							    <option value="AWD">AWD</option>
							  </select>
							</div>

							<div class="col-md-4 input-group mb-3">
								<div class="input-group-prepend">
									<label class="input-group-text" for="fuel">Fuel</label>
								</div>
								<select class="custom-select" name="fuel" id="fuel">
									<option selected>Choose...</option>
									<option value="Gasoline">Gasoline</option>
									<option value="Diesel">Diesel</option>
								</select>
							</div>

							<div class="col-md-4 input-group mb-3">
								<div class="input-group-prepend">
									<label class="input-group-text" for="transmission">Transmission</label>
								</div>
								<select class="custom-select" name="transmission" id="transmission">
									<option selected>Choose...</option>
									<option value="Automatic">Automatic</option>
									<option value="Manuel">Manuel</option>
								</select>
							</div>

						</div>

						<div class="col-md-12 my-3 submitbtn">
							<input class="btn btn-success btn-lg btn-block col-8 mx-auto" role="button" type="submit" placeholder="+ Add Vehicle" value="+ Add Vehicle" id="insert" name="insert">
						</div>


						<div class="col-md-12">
	<?php 

	$sqll = "SELECT id, image, truck_name, price, towing_capacity, miles, mpg_city, mpg_highway, color, int_color, engine, drive_type, fuel, transmission FROM Trucks";

	$result = $link->query($sqll);

	?>

			</fieldset>
	       	<legend style="font-size:2rem;border-bottom: 1pt solid #e7e7e7;"> Vehicle Listings </legend>
	        <fieldset>

	<table class="table table-borderless">
		<tbody>
		  	<tr>
				<td>ID</td>
				<td>Image</td>
				<td>Title</td>
				<td>Price</td>
			</tr>
	<?php


	  

	if($result->num_rows>0){
		while($row = $result->fetch_assoc()){

	$searchString = ',';
	$whatIWant = $row['image'];
	if( strpos($whatIWant, $searchString) !== false ) {
	     $whatIWant = substr($row['image'], strpos($row['image'], ",") + 1);
	 }else{
	 	$whatIWant = $row['image'];
	 }

	echo '<tr class="click" onClick="productlink('.$row['id'].')"><td style="width: 4%;" scope="row">'.$row['id'].'</td><td style="width: 25%;" >';

	if( strpos($whatIWant, $searchString) !== false ) {

		// $whatIWant=preg_replace('/^([^,]*).*$/', '$1', $whatIWant);

	$carimgs=explode(",",$whatIWant);



	echo '<img width="200px" height="auto" src="pictures/'. $carimgs[array_rand($carimgs)] . '" alt="Card image cap">';

	 }else{

		echo '<img width="200px" height="auto" src="pictures/'.$whatIWant. '" alt="Card image cap">';
	 }

	      echo '</td><td><span style="font-size:25px;">'.$row['truck_name'].'</span></td>
	      <td><span style="font-size:25px;">$'.number_format($row['price']).'</span></td>
	      <td><a style="font-size:21px; margin-right:15px;" href="productedit/?id='.$row['id'].'" ><i class="fas fa-edit"></i></a>
	      <i style="color:red; font-size:21px; cursor:pointer;" onClick="deleteme('.$row['id'].')" class="fas fa-trash-alt"></i></td>

	    </tr>'; 
		}
	}

	 ?>

	</tbody>
	</table>
		<a role="button" class="btn btn-secondary " href="/Trucks"><i class="fas fa-undo"></i> Go Back</a>
	</div>
	</div>
	</div>
	</form>
	</div>
	</div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<script type="text/javascript">
$( "#menu-toggle" ).click(function() {
  $('#Sidebar-wrapper').toggleClass( "toggled" );
});
	function deleteme(delid){
		if(confirm("Are you Sure?")){
			window.location.href='productedit/Delete.php?del_id=' +delid+'';
			return true;
		}
	}
function productlink(linkk){
	$(".click").on('click', function(){
     window.location.href='http://localhost/Trucks/product/?id=' +linkk+''; 

});
	

}

</script>
</body>
</html>

