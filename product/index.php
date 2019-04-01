
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Trucks";

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error){
	die( 'There was an error: <br> <br> '.$conn->connect_error);
}

$carid = $_GET['id'];

$sql = "SELECT * FROM Trucks WHERE id = '$carid'";

$result = $conn->query($sql);

	

	if($result->num_rows>0){
		while($row = $result->fetch_assoc()){ 
							

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
.nonactive{
	display: inline-block;
	width: 25%;
	margin: .5rem auto;
	cursor: pointer;
	opacity: 0.5;
	transition: all .3s ease;
}
.nonactive:hover{
opacity: 1;
box-shadow: 0 0px 10px #888;
}
</style>
	<body>
<!-- nav here --><?php include_once "../navigation.php" ?>
	
			<div class="container">
				

				<div class="p-3 row">
			
					<div class="col-md-12 row p-3 bg-light">


<?php 

						$searchString = ',';
						$whatIWant = $row['image'];

						
						
						echo "<div class='col-md-12 mb-3'><h1 style='text-transform: capitalize; font-weight:800;'>" .$row['truck_name'] . "</h1></div><div class='col-md-8'>";

						if( strpos($whatIWant, $searchString) !== false ) {


							$carimg = explode( ',', $whatIWant );

							if (is_array($carimg)) {
								
								$count= '0';
								
								foreach($carimg as $key => $value){
									
									
									$count++;
									
									$active = "";

									if($count == '1'){ $active = "active";}else{ $active='nonactive'; }
									
									echo "<img width='100%' class='lazy " . $active . "'  height='auto' data-src='../admin/pictures/".$value."'> "; 
									if($count == '1'){ echo "<img width='100%' class='lazy nonactive'  height='auto' data-src='../admin/pictures/".$value."'> ";  $active = "active";}
								}

							}else{

								echo "<p style='color:red; font-size:1.3rem;'>Error with listing please contact dealer for more information.</p>";

							}

						 }else{
						 	$whatIWant = $row['image'];
						 	echo "<img class='lazy ' width='100%' height='auto' data-src='../admin/pictures/".$whatIWant."'> "; 
						 }

						

						echo "  <div class='col-md-12 mt-3 pl-0'> <h5>Description:</h5></div>  </div><div class='col-md-4 bg-light '><h5>Price:</h5><h4 class='font3'>$" .number_format($row['price']) . "</h4><h5 class='border-top pt-3 my-3 text-center' style='font-size:2rem;'>Contact Dealer!</h5><div class='form-row'><div class='form-group col-md-6'><input type='text' class='form-control' id='firstname' placeholder='First Name:'></div><div class='form-group col-md-6'><input type='text' class='form-control' id='lastname' placeholder='Last Name:'></div></div><div class='form-group'><input type='text' class='form-control' id='inputAddress' placeholder='City:'></div><div class='form-group'><input type='text' class='form-control' id='inputAddress' placeholder='State:'></div><div class='form-group'><input type='number' class='form-control' id='inputAddress' placeholder='Phone:'></div><div class='form-group'><input type='text' class='form-control' id='inputAddress' placeholder='Email:'></div><div class='form-group'><textarea id='textarea' class='form-control' rows='3' placeholder='Comment:'></textarea></div><div class='form-group'><button class='btn btn-primary btn-lg btn-block' type='submit'>Submit form</button></div></div></div>"; 

					?>
				</div>

				<div class="row col-md-12 mb-3 bg-light ">

					<div class="col-md-6 margin-bottom-4">
						<div class="display-flex align-items-center row col-12 ">
							<div class="col-xs-4 col-sm-3 col-md-2 col-lg-3">
								<img class="img-responsive" src="https://www.autotrader.com/resources/img/svgicons/Mileage.svg">
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
								<img class="img-responsive" src="../images/MPG.svg">
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
								<img class="img-responsive" src="../images/color.svg">
							</div>
							<div class="col-xs-8 col-sm-9 col-md-10 col-lg-9">
								<div class="text-sm text-gray text-uppercase">Color</div>
								<div class="text-base text-bold cap-text"><?php echo "" . $row['color']; ?></div>
							</div>
						</div>
					</div>
					<div class="col-md-6 margin-bottom-4">
						<div class="display-flex align-items-center row col-12 ">
							<div class="col-xs-4 col-sm-3 col-md-2 col-lg-3">
								<img class="img-responsive" src="../images/color.svg">
							</div>
							<div class="col-xs-8 col-sm-9 col-md-10 col-lg-9">
								<div class="text-sm text-gray text-uppercase">Interior Color</div>
								<div class="text-base text-bold cap-text"><?php echo "" . $row['int_color']; ?></div>
							</div>
						</div>
					</div>


					<div class="col-md-6 margin-bottom-4">
						<div class="display-flex align-items-center row col-12 ">
							<div class="col-xs-4 col-sm-3 col-md-2 col-lg-3">
								<img class="img-responsive" src="../images/engine.svg">
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
								<img class="img-responsive" src="../images/drivetype.svg">
							</div>
							<div class="col-xs-8 col-sm-9 col-md-10 col-lg-9">
								<div class="text-sm text-gray text-uppercase">Drive Type</div>
								<div class="text-base text-bold "><?php echo "" . $row['drive_type']; ?></div>
							</div>
						</div>
					</div>


					<div class="col-md-6 margin-bottom-4">
						<div class="display-flex align-items-center row col-12 ">
							<div class="col-xs-4 col-sm-3 col-md-2 col-lg-3">
								<img class="img-responsive" src="../images/FuelType.svg">
							</div>
							<div class="col-xs-8 col-sm-9 col-md-10 col-lg-9">
								<div class="text-sm text-gray text-uppercase">Fuel Type</div>
								<div class="text-base text-bold cap-text"><?php echo "" . $row['fuel']; ?></div>
							</div>
						</div>
					</div>
					<div class="col-md-6 margin-bottom-4">
						<div class="display-flex align-items-center row col-12 ">
							<div class="col-xs-4 col-sm-3 col-md-2 col-lg-3">
								<img class="img-responsive" src="../images/Transmission.svg">
							</div>
							<div class="col-xs-8 col-sm-9 col-md-10 col-lg-9">
								<div class="text-sm text-gray text-uppercase">Transmission</div>
								<div class="text-base text-bold cap-text"><?php echo "" . $row['transmission']; ?></div>
							</div>
						</div>
					</div>

				</div>

				<?php
						}
					}
							?>
	<!-- CONTAINER  END -->
			</div>

				<div class="col-lg-12 my-2">
					<a class="btn btn-secondary" href="/Trucks"><i class="fas fa-undo"></i> Back</a>
					<a class="btn btn-secondary" href="admin/"><i class="fas fa-key"></i></a>
				</div>
			</div>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>

<script type="text/javascript">
	
 $("img.nonactive").on('click', function() {

$('img.nonactive').click(function() {
    var thmb = this;
    var src = this.src;
    $('img.active').fadeOut(400,function(){
        thmb.src = this.src;
        $(this).fadeIn(400)[0].src = src;
    });
});



//  var srcc = $("img.active").attr("src");

// this.src = this.src.replace(srcc);


    // if ($(this).attr("class") == "nonactive") {
    //   this.src = this.src.replace("_off","_on");
    // } else {
    //   this.src = this.src.replace("_on","_off");
    // }
    // $(this).toggleClass("on");

  });

</script>
<script src="https://cdn.jsdelivr.net/npm/vanilla-lazyload@8.17.0/dist/lazyload.min.js"></script>
		<script type="text/javascript">
			// Make sure to put "lazy" on all <imgs> class & lazy CDN ^ 
			var myLazyLoad = new LazyLoad({
			    elements_selector: ".lazy"
			});

		</script>
	</body>
</html>

<?php $conn->close(); ?>