<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Trucks";

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error){
	die( 'There was an error: <br> <br> '.$conn->connect_error);
}

$sql = "SELECT id, image, truck_name, price, towing_capacity, miles, mpg_city, mpg_highway FROM Trucks";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
	<head>

		<meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	    <!-- Bootstrap CSS -->
	    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

		<title>Trucks 4 Sale</title>

	</head>
	<style type="text/css">
	.img-logo-body{
		margin:1rem auto;
		display: block;
	}
		.carousel-inner{
			max-height: 550px;
		}
		.list-group-item {
			padding: .25rem 1.25rem;
		}
		.card-img-top {
		    left: 50%;
		    top: 50%;
		    transform: translate(-50%, -50%);
		    position: absolute;
		}
		span.img1 {
		    overflow: hidden;
		    height: 179px;
		    position: relative;
		    display: block;
		}

	</style>
	<body>
		<!-- Navigation -->
		
<!-- nav here --><?php include_once "navigation.php" ?>

		<!-- Banner -->
		<div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
			<div class="carousel-inner">
                 <div class="carousel-item active">
					<img class="lazy d-block w-100" src="images/trucks1-1xs.jpg" data-src="images/trucks1-1.jpg" alt="First slide">
				</div>
<!-- 				<div class="carousel-item ">
					<img class="lazy d-block w-100" src="images/trucks2.jpg" alt="Second slide">
				</div> -->
			</div>
			<a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
		<!-- Listing  -->
		<div class="container">
			<!-- <h1 class="my-4 text-center" style="transform: scale(1.3);font-weight: 600;color: #6d6d6d;font-family: 'montserrat';"> Trucks-<span style="font-size: 4rem;color: #FFC107;font-weight: 800;font-family: 'montserrat';padding: 0rem .5rem;margin: 0 .5rem;">4</span>-Sale!</h1> -->
<img class='img-logo-body' src="images/logo.png" height='auto' width="400px">
			<div class="col-lg-12 mx-0 row">

				
<?php 



if($result->num_rows>0){
	while($row = $result->fetch_assoc()){

$searchString = ',';
$whatIWant = $row['image'];
echo '<div class="col-md-4 mt-4"><div class="card shadow-lg"><span class="img1">';
if( strpos($whatIWant, $searchString) !== false ) {

	// $whatIWant=preg_replace('/^([^,]*).*$/', '$1', $whatIWant);

$carimgs=explode(",",$whatIWant);



echo '<img class="lazy card-img-top" data-src="admin/pictures/'. $carimgs[array_rand($carimgs)] . '" alt="Card image cap">';

 }else{

	echo '<img class="lazy card-img-top" data-src="admin/pictures/'.$whatIWant. '" alt="Card image cap">';
 }



echo '</span><div class="card-body">
					    <h5 class="card-title" style="text-transform: capitalize;">'.$row['truck_name'].'</h5>
					</div>
					<ul class="list-group list-group-flush">
					    
					    <li class="list-group-item"><strong>Towing Capacity:</strong> <span class="text-secondary">' .number_format($row['towing_capacity']). 'lbs</span></li>
					    <li class="list-group-item"><strong>MPG:</strong> <span class="text-secondary">' .number_format($row['mpg_city']). ' City / ' .number_format($row['mpg_highway']). ' Highway</span></li>
						<li class="list-group-item"><strong>price:</strong> <span class="text-secondary">$' .number_format($row['price']). '</span></li>
						<li class="list-group-item"><strong>Miles:</strong> <span class="text-secondary">' .number_format($row['miles']). '</span></li>
					</ul>
					<div class="card-body">
					    <a href="product/?id=' .$row['id']. '" class="btn btn-lg btn-warning btn-block">Learn More</a>
					</div>
				</div>
			</div>';
	}
}

 ?>

		</div>

			<div class="col-lg-12 my-2">
				<a class="btn btn-secondary" href="admin/"><i class="fas fa-key"></i></a>
			</div>
		</div>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/vanilla-lazyload@8.17.0/dist/lazyload.min.js"></script>
		<script type="text/javascript">
			// Make sure to put "lazy" on all <imgs> class & lazy CDN ^ 
			var myLazyLoad = new LazyLoad({
			    elements_selector: ".lazy"
			});

		</script>
	</body>
</html>

<?php $conn = null; ?>