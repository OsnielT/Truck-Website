

		<!-- Navigation  -->
		<?php require_once "include/header.php"; ?>

			<div class="col-lg-10 py-4">
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
							<a role="button" class="btn btn-secondary " href="/Trucks"><i class="fas fa-undo"></i> Front Page</a>
						</div>
					</div>
				</form>
			</div>
<?php require_once "include/footer.php"; ?>
