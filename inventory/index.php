<?php

require_once "../include/db.php";


$sth = new inventoryDB();

$TABLE = $sth->getTable();
$ROW_LIMIT = $sth->getRowLimit();

$db = $sth->dbh;
$db = $db->prepare("SELECT * FROM $TABLE");
$db->execute();


// $sql = "SELECT * FROM Trucks";
// $result = $conn->query($sql);
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
		<?php include_once "../navigation.php" ?>

		<!-- Listing  -->
		<div class="container-fluid">
			<h1 class="my-5 text-center">Inventory</h1>
			
		<div class="row">
			
		<p>
  <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseWidthExample" aria-expanded="false" aria-controls="collapseWidthExample">
    Filters
  </button>
</p>
<div class="row" >
  <div class="col-2 bg-light collapse collapse-horizontal show" id="collapseWidthExample">
    <div class="card card-body border-0 p-0 mt-3">

	<div class="accordion-item">
		<h2 class="accordion-header" id="panelsStayOpen-headingTwo">
		<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
			Make
		</button>
		</h2>
		<div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
			<div class="accordion-body">
				<div class="form-check">
					<input class="form-check-input" type="checkbox" value="" id="make-cb-1">
					<label class="form-check-label" for="cb-1">Dodge</label>
				</div>
				<div class="form-check">
					<input class="form-check-input" type="checkbox" value="" id="make-cb-2">
					<label class="form-check-label" for="cb-1">Ford</label>
				</div>
				<div class="form-check">
					<input class="form-check-input" type="checkbox" value="" id="make-cb-3">
					<label class="form-check-label" for="cb-1">Hino</label>
				</div>
				<div class="form-check">
					<input class="form-check-input" type="checkbox" value="" id="make-cb-4">
					<label class="form-check-label" for="cb-1">Isuzu</label>
				</div>
				<div class="form-check">
					<input class="form-check-input" type="checkbox" value="" id="make-cb-5">
					<label class="form-check-label" for="cb-1">Mack</label>
				</div>
				<div class="form-check">
					<input class="form-check-input" type="checkbox" value="" id="make-cb-6">
					<label class="form-check-label" for="cb-1">Peterbilt</label>
				</div>
			</div>
		</div>
	</div>
	<div class="accordion" id="accordionPanelsStayOpenExample">
		<div class="accordion-item">
			<h2 class="accordion-header" id="panelsStayOpen-headingOne">
			<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#bodystyle-collapse" aria-expanded="true" aria-controls="bodystyle-collapse">
				Body style
			</button>
			</h2>
			<div id="bodystyle-collapse" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
				<div class="accordion-body">
					<div class="form-check">
						<input class="form-check-input" type="checkbox" value="" id="bodyStyle-cb-1">
						<label class="form-check-label" for="cb-1">Box Truck</label>
					</div>
					<div class="form-check">
						<input class="form-check-input" type="checkbox" value="" id="bodyStyle-cb-2">
						<label class="form-check-label" for="cb-1">Dump Truck</label>
					</div>
					<div class="form-check">
						<input class="form-check-input" type="checkbox" value="" id="bodyStyle-cb-3">
						<label class="form-check-label" for="cb-1">Flatbed Truck</label>
					</div>
					<div class="form-check">
						<input class="form-check-input" type="checkbox" value="" id="bodyStyle-cb-4">
						<label class="form-check-label" for="cb-1">Heavy Duty Wrecker</label>
					</div>
					<div class="form-check">
						<input class="form-check-input" type="checkbox" value="" id="bodyStyle-cb-5">
						<label class="form-check-label" for="cb-1">Roll Back</label>
					</div>
					<div class="form-check">
						<input class="form-check-input" type="checkbox" value="" id="bodyStyle-cb-6">
						<label class="form-check-label" for="cb-1">Tow Wrecker</label>
					</div>
				</div>
			</div>
		</div>

		<div class="accordion-item">
			<h2 class="accordion-header" id="panelsStayOpen-headingThree">
			<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
				Color
			</button>
			</h2>
			<div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
				<div class="accordion-body">
					<div class="form-check">
						<input class="form-check-input" type="checkbox" value="" id="color-cb-1">
						<label class="form-check-label" for="cb-1">White</label>
					</div>
					<div class="form-check">
						<input class="form-check-input" type="checkbox" value="" id="color-cb-2">
						<label class="form-check-label" for="cb-1">Black</label>
					</div>
				</div>
			</div>
		</div>
	</div>



    </div>
  </div>

<div class="col-10 mx-auto row">

				
<?php 



while($row = $db->fetch()){

$searchString = ',';
$whatIWant = $row['image'];
echo '<div class="col-md-4 mb-4"><div class="card "><span class="img1">';
if( strpos($whatIWant, $searchString) !== false ) {

	// $whatIWant=preg_replace('/^([^,]*).*$/', '$1', $whatIWant);

$carimgs=explode(",",$whatIWant);



echo '<img class="lazy card-img-top" data-src="../admin/pictures/'. $carimgs[array_rand($carimgs)] . '" alt="Card image cap">';

 }else{

	echo '<img class="lazy card-img-top" data-src="../admin/pictures/'.$whatIWant. '" alt="Card image cap">';
 }



echo '</span><div class="card-body">
		<h5 class="card-title" style="text-transform: capitalize;">'.$row['truck_name'].'</h5>
	</div>
	<ul class="list-group list-group-flush">
		
		<li class="list-group-item"><strong>Miles:</strong> <span class="text-secondary">' .number_format($row['miles']). '</span></li>
		<li class="list-group-item"><strong>MPG:</strong> <span class="text-secondary">' .number_format($row['mpg_city']). ' City / ' .number_format($row['mpg_highway']). ' Highway</span></li>
		<li class="list-group-item"><strong>price:</strong> <span class="text-secondary">$' .number_format($row['price']). '</span></li>
	</ul>
	<div class="card-body">
		<a href="'.$link.'product/?id=' .$row['id']. '" class="btn btn-lg btn-warning btn-block">See Details</a>
	</div>
</div>
</div>';
	}


 ?>
</div>
		</div>
</div>
			<div class="col-lg-12 my-2">
				<a class="btn btn-secondary" href="admin/"><i class="fas fa-key"></i></a>
			</div>
		</div>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
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