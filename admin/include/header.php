<!DOCTYPE html>
<html>
<head>
	
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<title>dashboard</title>
</head>
<style type="text/css">
    div#Sidebar-wrapper {
        transition: all .3s ease;
        flex: unset;
        width: 335px;
        background: #454545;
        font-size: 1.2rem;
        left: 0;
    }

    .toggled {
        width: 10px !important;
        overflow: hidden;
        /* display: block !important;
        flex: unset; */
        left: -335px !important;
        
    }
    .sidebar-nav li {
        border-top: 1pt solid #333;
        
        transition: all .3s ease;
    }
    ul.sidebar-nav a {
        color: #fff !important;
        text-decoration: none;
        padding: .5rem;
    }

    ul.sidebar-nav {
        list-style-type: none;
        padding: 0;
        margin: 0;
    }

    .click td {
        vertical-align: middle;
    }
    html, body {
        height: 100%;
    }
</style>
<body>


	<!-- Content -->
	<div id="wrapper" class="container-fluid d-flex h-100 flex-column">
		<div class="row flex-grow-1">
<div id="Sidebar-wrapper" class="col-lg-2 p-0 py-4">
    <p class="h3 text-white m-2">Admin</p>
    <ul class="sidebar-nav">
    
        <li><a href="index.php">Dashboard</a></li>
        <li><a href="inventory.php">Inventory</a></li>
        <li><a href="addVehicle.php">Add Vehicle</a></li>
        <li><a href="#">Settings</a></li>
        <li><a href="#">Logout</a></li>
    </ul>

</div>