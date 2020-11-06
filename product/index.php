
<?php

require_once "../include/db.php";

if(isset($_GET['id'])){

	$carid = $_GET['id'];

}else{
	header('location: /trucks');
}

// $sql = "SELECT * FROM Trucks WHERE id = '$carid'";


$sth = $dbh->prepare("SELECT * FROM inventory WHERE id = ?");
if(!$sth->execute(array($carid))){
	header("location: ../");
}

while($row = $sth->fetch(PDO::FETCH_ASSOC)){ 
							

?>

<!DOCTYPE html>
<html>
	<head>

		<meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	    <!-- Bootstrap CSS -->
	    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;600;700&display=swap" rel="stylesheet">
		<title><?php echo "" . $row['truck_name']; ?> - Trucks 4 Sale</title>

	</head>
<style type="text/css">
*{
	font-family: 'Source Sans Pro', sans-serif;
}
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
	<body class="bg-light">
<!-- nav here -->
<?php include_once "../navigation.php" ?>

	<div class="container">
		<div class="mt-4 col-md-12 row p-3 bg-white ">
			<div class="col-12 mb-3">
				<a class="text-muted" href="/Trucks"> <u> <i class="fas fa-long-arrow-alt-left"></i> Return to listing</u></a>						
			</div>
			<div class='col-md-8'>
				<div class="mb-4">
					<?php 
						// Car image
						$searchString = ',';
						$whatIWant = $row['image'];

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
						 echo '</div>';

						//  new/used status
						echo '<span class="badge badge-pill badge-secondary">New</span>';

						//  Title
						 echo "<h3 class='mt-0 mb-3 '>" .$row['truck_name'] . "</h3>";



					?>
					
					<?php echo "<h6 class='text-muted mb-0'>" .number_format($row['miles']) . " miles</h6>"; ?>
					<?php echo "<p class='h2 mt-0 font-weight-bold'>$" .number_format($row['price']) . "</p>"; ?>
					<div class='col-md-12 mt-3 mb-4 pl-0 '> 
						<p class="h5 font-weight-bold">Description:</p> 
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus et nibh at turpis sollicitudin eleifend a sit amet ipsum. Maecenas luctus sollicitudin laoreet. Quisque suscipit massa purus, vel elementum felis commodo ac. Maecenas accumsan, libero at tempus porttitor, purus felis posuere est, vitae efficitur felis nibh sed ante. Sed sagittis ac est a tincidunt. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam maximus semper scelerisque. Donec efficitur non est eget dignissim. Morbi vestibulum erat in bibendum accumsan.</p>
					</div>
					<p class="h5 font-weight-bold" >Specs</p>
					<table class="table table-hover table-sm col-md-8 col-sm-12">
						<tbody>
						<?php 
						echo '
							<tr>
								<td class="">Towing Capacity</td>
								<td>'.number_format($row['towing_capacity']).' lb</td>
							</tr>
							<tr>
								<td class="">Jacob</td>
								<td >'.number_format($row['miles']).'</td>
							</tr>
							<tr>
								<td class="">MPG</td>
								<td>'.number_format($row['mpg_city']).'/'.number_format($row['mpg_highway']).'</td>
							</tr>
							<tr>
								<td class="">Exterior Color</td>
								<td>'.$row['color'].'</td>
							</tr>
							<tr>
								<td class="">Interior Color</td>
								<td>'.$row['int_color'].'</td>
							</tr>
								<tr>
								<td class="">Engine</td>
								<td>'.$row['engine'].'</td>
							</tr>
							<tr>
								<td class="">Drive train</td>
								<td>'.$row['drive_type'].'</td>
							</tr>
							<tr>
								<td class="">Fuel Type</td>
								<td>'.$row['fuel'].'</td>
							</tr>
							<tr>
								<td class="">Transmission</td>
								<td>'.$row['transmission'].'</td>
							</tr>
							';
							?>
						</tbody>
					</table>

				</div>
				<div class='col-md-4 bg-light border'>
					<h3 class=' my-3 text-center ' >Contact Dealer</h3>
					<div class='form-row'>
						<div class='form-group col-md-6'>
							<input type='text' class='form-control form-control-sm' id='firstname' placeholder='First Name:'>
						</div>
						<div class='form-group col-md-6'>
							<input type='text' class='form-control form-control-sm' id='lastname' placeholder='Last Name:'>
						</div>
					</div>
					<div class='form-group'>
						<input type="tel" class='form-control form-control-sm' id='inputAddress' placeholder='Phone:'>
					</div>
					<div class='form-group'>
						<input type='text' class='form-control form-control-sm' id='inputAddress' placeholder='Email:'>
					</div>
					<div class='form-group'>
						<textarea id='textarea' class='form-control form-control-sm' rows='3' placeholder='Comment:'></textarea>
					</div>
					<div class='form-group'>
						<button class='btn btn-primary btn-md btn-block' type='submit' >Submit</button>
					</div>
					<p class="text-muted" style="font-size: 11px;">By clicking here, you authorize this dealer and its sellers/partners to contact you by texts/calls which may include marketing. Consent is not required to purchase goods/services.</p>
				</div>
					<!--END-->
			</div>

				<!-- <div class="row col-md-12 mb-3 bg-white ">

					
				</div> -->

				<?php
}
				?>
		
		</div>

		<div class="col-lg-12 my-2">
			<a class="btn btn-secondary" href="/Trucks/admin/"><i class="fas fa-key"></i></a>
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

