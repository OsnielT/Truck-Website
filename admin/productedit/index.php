
<?php

require_once "../../include/db.php";

	$carid = $_GET['id'];

	$sth = $dbh->prepare("SELECT * FROM inventory WHERE id = ?");
	$sth->execute(array($carid));

	while($row = $sth->fetch(PDO::FETCH_ASSOC)){ 
							
		$searchString = ',';
		$whatIWant = $row['image'];
		if( strpos($whatIWant, $searchString) !== false ) {
			$whatIWant = substr($row['image'], strpos($row['image'], ",") + 1);
		}else{
			$whatIWant = $row['image'];
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

		<title><?php echo "" . $row['truck_name']; ?> - Trucks 4 Sale</title>

	</head>
<style type="text/css">
	.text-bold {
	    font-weight: 700!important;
	}
	.initialism, .text-uppercase {
	    text-transform: uppercase!important;
	}

	.text-gray {
	    color: #8c8c8c!important;
	}
	.text-sm {
	    font-size: 11px;
	}
	.cap-text{
		text-transform: capitalize;
	}
	.font3{
		    font-size: 2rem;
	    font-weight: 700;
	    color: #2196F3;
}
</style>
	<body>
<!-- nav here -->

	<form action="" method="POST" enctype="multipart/form-data" >
			<div class="container">

				<div class="p-3 row">
			
					<div class="col-md-12 row p-3 bg-light">

						<?php 
echo "<div class='col-md-8'><div class='form-group'><input type='text' class='form-control' name='truck_name' id='truck_name' placeholder='" .$row['truck_name'] . "'></div></div><div class='col-md-8'><img width='100%' height='auto' src='../pictures/".$whatIWant."'>  <div class='col-md-12 mt-3 pl-0'> <h5>Description:</h5></div>  </div><div class='col-md-4 bg-light '><h5>Price:</h5><div class='form-group'><input type='text' class='form-control' id='price' name='price' placeholder='$" .number_format($row['price']) . "'></div><h5 class='border-top pt-3 my-3 text-center' style='font-size:2rem;'>Contact Dealer!</h5><div class='form-row'><div class='form-group col-md-6'><input type='text' class='form-control' id='firstname' placeholder='First Name:' disabled></div><div class='form-group col-md-6'><input type='text' class='form-control' id='lastname' placeholder='Last Name:' disabled></div></div><div class='form-group'><input type='text' class='form-control' id='inputAddress' placeholder='City:' disabled></div><div class='form-group'><input type='text' class='form-control' id='inputAddress' placeholder='State:' disabled></div><div class='form-group'><input type='number' class='form-control' id='inputAddress' placeholder='Phone:' disabled></div><div class='form-group'><input type='text' class='form-control' id='inputAddress' placeholder='Email:' disabled></div><div class='form-group'><textarea id='textarea' class='form-control' rows='3' placeholder='Comment:' disabled></textarea></div><div class='form-group'><button class='btn btn-primary btn-lg btn-block' type='submit' disabled>Submit Form</button></div></div></div>"; 

if(isset($_POST['insert'])){
	$queryy = "UPDATE inventory SET";

	$comma = " ";
	$newArray = array();
	foreach($_POST as $key => $val) {

	    if( ! empty($val)) {

	        $queryy .= $comma . $key . " = ?";
			$comma = ", ";
			$newArray[] = $val;
	    }
	    $queryyy = $queryy . " WHERE id = ?";
	}
	$newArray[] = $carid;

	// echo $queryyy;
	// var_export($newArray);
	$stmt = $dbh->prepare($queryyy);
	$stmt->execute($newArray);
	// var_export($stmt->errorInfo());
}

					?>
				</div>

				<div class="row col-md-12 mb-3 bg-light ">

					<div class="col-md-6 margin-bottom-4">
						<div class="display-flex align-items-center row col-12 ">
							<div class="col-xs-4 col-sm-3 col-md-2 col-lg-3">
								<img class="img-responsive" src="http://localhost/Trucks/images/Mileage.svg">
							</div>
				
							<div class="col-xs-8 col-sm-9 col-md-10 col-lg-9">
								<div class="text-sm text-gray text-uppercase">MILEAGE</div>
								<div class="text-base text-bold"><?php echo "" . number_format($row['miles']); ?></div>
							</div>
			
						</div>
					</div>

					<div class="col-md-6 margin-bottom-4">
						<div class="display-flex align-items-center row col-12 ">
							<div class="col-xs-4 col-sm-3 col-md-2 col-lg-3">
								<img class="img-responsive" src="http://localhost/Trucks/images/MPG.svg">
							</div>
							<div class="col-xs-8 col-sm-9 col-md-10 col-lg-9">
								<div class="text-sm text-gray text-uppercase">MPG</div>
								<div class="text-base text-bold"><?php echo "".number_format($row['mpg_city']); ?> City / <?php echo "" . number_format($row['mpg_highway']); ?> Highway</div>
							</div>
						</div>
					</div>


					<div class="col-md-6 margin-bottom-4">
						<div class="display-flex align-items-center row col-12 ">
							<div class="col-xs-4 col-sm-3 col-md-2 col-lg-3">
								<img class="img-responsive" src="http://localhost/Trucks/images/color.svg">
							</div>
							<div class="col-xs-8 col-sm-9 col-md-10 col-lg-9">
								<div class="text-sm text-gray text-uppercase">Color</div>
								<div class="text-base text-bold cap-text text-capitalize"><?php echo "" . $row['color']; ?></div>
							</div>
						</div>
					</div>
					<div class="col-md-6 margin-bottom-4">
						<div class="display-flex align-items-center row col-12 ">
							<div class="col-xs-4 col-sm-3 col-md-2 col-lg-3">
								<img class="img-responsive" src="http://localhost/Trucks/images/color.svg">
							</div>
							<div class="col-xs-8 col-sm-9 col-md-10 col-lg-9">
								<div class="text-sm text-gray text-uppercase">Interior Color</div>
								<div class="text-base text-bold cap-text text-capitalize"><?php echo "" . $row['int_color']; ?></div>
							</div>
						</div>
					</div>


					<div class="col-md-6 margin-bottom-4">
						<div class="display-flex align-items-center row col-12 ">
							<div class="col-xs-4 col-sm-3 col-md-2 col-lg-3">
								<img class="img-responsive" src="http://localhost/Trucks/images/engine.svg">
							</div>
							<div class="col-xs-8 col-sm-9 col-md-10 col-lg-9">
								<div class="text-sm text-gray text-uppercase">Engine</div>
								<div class="text-base text-bold "><?php echo "" . $row['engine']; ?></div>
							</div>
						</div>
					</div>
					<div class="col-md-6 margin-bottom-4">
						<div class="display-flex align-items-center row col-12 ">
							<div class="col-xs-4 col-sm-3 col-md-2 col-lg-3">
								<img class="img-responsive" src="http://localhost/Trucks/images/drivetype.svg">
							</div>
							<div class="col-xs-8 col-sm-9 col-md-10 col-lg-9">
								<div class="text-sm text-gray text-uppercase">Drive Type</div>
								<div class="text-base text-bold text-capitalize"><?php echo "" . $row['drive_type']; ?></div>
							</div>
						</div>
					</div>


					<div class="col-md-6 margin-bottom-4">
						<div class="display-flex align-items-center row col-12 ">
							<div class="col-xs-4 col-sm-3 col-md-2 col-lg-3">
								<img class="img-responsive" src="http://localhost/Trucks/images/FuelType.svg">
							</div>
							<div class="col-xs-8 col-sm-9 col-md-10 col-lg-9">
								<div class="text-sm text-gray text-uppercase">Fuel Type</div>
								<div class="text-base text-bold cap-text text-capitalize"><?php echo "" . $row['fuel']; ?></div>
							</div>
						</div>
					</div>
					<div class="col-md-6 margin-bottom-4">
						<div class="display-flex align-items-center row col-12 ">
							<div class="col-xs-4 col-sm-3 col-md-2 col-lg-3">
								<img class="img-responsive" src="http://localhost/Trucks/images/Transmission.svg">
							</div>
							<div class="col-xs-8 col-sm-9 col-md-10 col-lg-9">
								<div class="text-sm text-gray text-uppercase">Transmission</div>
								<div class="text-base text-bold text-uppercase"><?php echo "" . $row['transmission']; ?></div>
							</div>
						</div>
					</div>
<div class='form-group'><button class='btn btn-primary btn-lg btn-block' id='insert' name="insert" type='submit' >Submit Form</button></div>

				</div>

				<?php
			}
			?>
	<!-- CONTAINER  END -->
			</div>


				<div class="col-lg-12 my-2">
					<a class="btn btn-secondary" href="http://localhost/Trucks"><i class="fas fa-undo"></i> Back</a>
				</div>

			</div>
</form>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

	</body>
</html>