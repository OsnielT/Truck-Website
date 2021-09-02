<?php
require_once "include/db.php";


$sth = new inventoryDB();

$TABLE = $sth->getTable();
$ROW_LIMIT = $sth->getRowLimit();

$db = $sth->dbh;
$db = $db->prepare("SELECT id, image, truck_name, price, towing_capacity, miles, mpg_city, mpg_highway FROM $TABLE LIMIT $ROW_LIMIT");
$db->execute();

?>
<!doctype html>
<html lang="en">
	<head>

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	   
		<!-- Bootstrap CSS -->
	    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
		
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700;900&display=swap" rel="stylesheet">
		
		<title>Trucks 4 Sale</title>

	</head>
	<style type="text/css">

		.img-logo-body{
			margin:1rem auto;
			display: block;
		}
		.carousel-inner{
			max-height: 645px;
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
		.card span.img1 {
		    overflow: hidden;
		    height: 179px;
		    position: relative;
			display: block;
			
			background-repeat: no-repeat;
			background-position: top center;
			background-size: cover;
		}

	</style>
	<body>
		<!-- Navigation -->
		<?php include_once "navigation.php" ?>

		<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
			<div class="carousel-inner">
				<div class="carousel-item active">
				<img src="images/trucks1-1.jpg" class="d-block w-100" alt="...">
				</div>
				<div class="carousel-item">
				<img src="images/Trucks1.jpg" class="d-block w-100" alt="...">
				</div>
				<div class="carousel-item">
				<img src="images/Trucks2.jpg" class="d-block w-100" alt="...">
				</div>
			</div>
			<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="visually-hidden">Previous</span>
			</button>
			<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="visually-hidden">Next</span>
			</button>
		</div>


		<!-- <div id="Carousel001" class="carousel slide" data-bs-ride="Carousel001">
			<div class="carousel-inner">
				<div class="carousel-item active">
					<img class="lazy d-block w-100" src="images/trucks1-1xs.jpg" data-src="images/trucks1-1.jpg" alt="First slide">

				</div>
				<div class="carousel-item">
					<img class="d-block w-100" src="images/Trucks1.jpg" alt="Second slide">

				</div>
				<div class="carousel-item">
					<img class="d-block w-100" src="images/Trucks2.jpg" alt="Third slide">

				</div>
			</div>
			<button class="carousel-control-prev" type="button" data-bs-target="#Carousel001" data-bs-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="visually-hidden">Previous</span>
			</button>
			<button class="carousel-control-next" type="button" data-bs-target="#Carousel001" data-bs-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="visually-hidden">Next</span>
			</button>
		</div> -->



		<!-- Listing  -->
		<div class="container">
			<!-- <img class='img-logo-body' src="images/logo.png" height='auto' width="400px"> -->
			<p class="h1 mt-4 text-center">Featured Trucks</p>
			<div class="col-lg-12 mx-0 row">

				
<?php 

while($row = $db->fetch(PDO::FETCH_ASSOC)){

	$searchString = ',';

	$whatIWant = $row['image'];

	echo '
	<div class="col-lg-3 col-md-6 col-sm-12 mt-4">
		<div class="card ">';
		
		if( strpos($whatIWant, $searchString) !== false ) {
			
			$carimgs=explode(",",$whatIWant);
			
			echo '<span class="img1" style="admin/pictures/'. $carimgs[array_rand($carimgs)] . '">';
			// echo '<img class="lazy card-img-top" data-src="admin/pictures/'. $carimgs[array_rand($carimgs)] . '" alt="Card image cap">';
			
		}else{
			echo '<span class="img1" style="background-image: url(admin/pictures/'.$whatIWant. ');">';

			// echo '<img class="lazy card-img-top" data-src="admin/pictures/'.$whatIWant. '" alt="Card image cap">';
	}

	echo '
			</span>
			<div class="card-body">
				<h5 class="card-title" style="text-transform: capitalize;">'.$row['truck_name'].'</h5>
			</div>
			<ul class="list-group list-group-flush">
				<li class="list-group-item"><strong>Miles:</strong> <span class="text-secondary">' .number_format($row['miles']). '</span></li>
				<li class="list-group-item"><strong>MPG:</strong> <span class="text-secondary">' .number_format($row['mpg_city']). ' City / ' .number_format($row['mpg_highway']). ' Highway</span></li>
				<li class="list-group-item"><strong>Price:</strong> <span class="text-secondary">$' .number_format($row['price']). '</span></li>
			</ul>
			<div class="card-body">
				<a href="product/?id=' .$row['id']. '" class="btn btn-md btn-warning btn-block">See Details</a>
			</div>
		</div>
	</div>';
}

 ?>

		</div>

			<div class="col-lg-12 my-2">
				<a class="btn btn-secondary" href="admin/"><i class="fas fa-key"></i></a>
			</div>
		</div>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>		<script src="https://cdn.jsdelivr.net/npm/vanilla-lazyload@8.17.0/dist/lazyload.min.js"></script>
		<script type="text/javascript">
			// Make sure to put "lazy" on all <imgs> class & lazy CDN ^ 
			var myLazyLoad = new LazyLoad({
			    elements_selector: ".lazy"
			});

		</script>
	</body>
</html>

