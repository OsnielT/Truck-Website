<style type="text/css">
		.navbar-dark .navbar-brand {
		    color: #FFC107;
		    font-weight: 800;

		}
		.bg-dark {
		    background-color: #111111!important;
		}
		.logo-top{
			height: auto;
		    margin: 0 .5rem 0 0;
		    width: 105px;
		    padding: 0;
		}
		.navbar{
			padding: 0 1rem; 
		}
		.navbar-dark .navbar-toggler-icon{
			background-image: url("data:image/svg+xml;charset=utf8,<svg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'><path stroke='rgba(0, 0, 0, 1)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/></svg>");
		}
		.navbar-toggler{
    		background-color: #FFC107;
		}
		* {
			font-family: 'Source Sans Pro', sans-serif;
			border-radius: 0 !important;
		}
		@media screen and (max-width: 995px){
			
			.logo-top{
				margin: auto;
			}
			span.img1 {
			    height: 230px;
			}
		}
</style>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top"><div class="container">
	<a class="navbar-brand mx-auto" href="/Trucks">
		<img class="navbar-brand logo-top" alt='Trucks 4 Sale' src='/Trucks/images/logo-y.png' onerror="this.src='../images/logo-y.png'">
	</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarTogglerDemo03">
		<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
			<li class="nav-item ">
				<a class="nav-link" href="/Trucks">Home <span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#">About</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#">Contact</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="inventory/">Inventory</a>
			</li>
		</ul>
		<form class="form-inline my-2 my-lg-0">
			<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
			<button class="btn btn-outline-warning my-2 my-sm-0" type="submit">Search</button>
		</form>
	</div></div>
</nav>