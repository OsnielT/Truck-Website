<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Trucks";

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error){
	die( 'There was an error: <br> <br> '.$conn->connect_error);
}

$sql = "SELECT * FROM Trucks";
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
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
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
			<div class="col-lg-3">
				<h3><i class="fas fa-filter"></i> Filter</h3>
				<div class="accordion" id="accordionExample">

				  <div class="card">
				    <div class="card-header" id="headingOne">
				      <h2 class="mb-0">
				        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
				          Year
				        </button>
				      </h2>
				    </div>

				    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
				      <div class="card-body">
				      	  <div class="form-group">
						    <!-- <label for="formControlRange">YEAR</label> -->
						    <input type="range" class="form-control-range" id="formControlRange">
						  </div>
				        </div>
				    </div>
				  </div>


				  <div class="card">
				    <div class="card-header" id="headingtwo">
				      <h2 class="mb-0">
				        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapsetwo" aria-expanded="true" aria-controls="collapsetwo">
				          Make
				        </button>
				      </h2>
				    </div>

				    <div id="collapsetwo" class="collapse show" aria-labelledby="headingtwo" data-parent="#accordionExample">
				      <div class="card-body">
				      	Stuff goes here!
				        </div>
				    </div>
				  </div>

				  <div class="card">
				    <div class="card-header" id="headingthree">
				      <h2 class="mb-0">
				        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#headingthree" aria-expanded="true" aria-controls="headingthree">
				          Model
				        </button>
				      </h2>
				    </div>

				    <div id="headingthree" class="collapse show" aria-labelledby="headingthree" data-parent="#accordionExample">
				      <div class="card-body">
				      	Stuff goes here!
				        </div>
				    </div>
				  </div>
				</div>
			</div>
			<div class="col-lg-9 mx-0 row">

				
<?php 



if($result->num_rows>0){
	while($row = $result->fetch_assoc()){

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
					    <a href="product/?id=' .$row['id']. '" class="btn btn-lg btn-warning btn-block">See Details</a>
					</div>
				</div>
			</div>';
	}
}

 ?>

		</div>
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