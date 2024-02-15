<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<title>Annai Saradha Tuition Centre</title>
		
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<link rel="stylesheet" href="../css/index.css">
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
	</head>

	<body>
		<header class="header fixed-top">

			<a href="#" class="logo">
				<img data-zs-logo="" src="{{ asset('/Logo1.gif') }}" style="padding-left:10px;height:70px;width:80.44px;">
				Annai Saradha Tuition Centre
			</a>

			<nav class="nav-items">
				<a href="#">Home</a>
				<a href="#">About</a>
				<a href="#">Contact</a>
				<a href="{{ url('/login') }}"><i class="fas fa-sign-in-alt"></i>  Login</a>
			</nav>
		</header>
		<main>
		  	<center>
		  	<div id="demo" class="carousel slide" data-ride="carousel">
				<div class="carousel-inner">
					<div class="carousel-item active">
						<img src="../images/5.jpg" alt="Chicago">
					</div>

					<div class="carousel-item">
						<img src="../images/9.jpeg" alt="New York">
					</div>
				</div>

				<a class="carousel-control-prev" href="#demo" data-slide="prev">
					<span class="carousel-control-prev-icon"></span>
				</a>
				<a class="carousel-control-next" href="#demo" data-slide="next">
					<span class="carousel-control-next-icon"></span>
				</a>
			</div>
			</center>
		</main>
		<div class="row px-5 mt-5">
			<center>
			<div class="col-md-4 px-2">
				<div class="card shadow-lg">
					<div class="card-body">
						<img src="https://images.unsplash.com/photo-1477862096227-3a1bb3b08330?ixlib=rb-1.2.1&auto=format&fit=crop&w=700&q=60" alt="" class="card-img-top">
						<div class="card-body">
							<h5 class="card-title">Sunset</h5>
							<p class="card-text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ut eum similique repellat a laborum, rerum voluptates ipsam eos quo tempore iusto dolore modi dolorum in pariatur. Incidunt repellendus praesentium quae!</p>
							<a href="" class="btn btn-outline-success btn-sm">Read More</a>
							<a href="" class="btn btn-outline-danger btn-sm"><i class="far fa-heart"></i></a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4 px-2">
				<div class="card shadow-lg">
					<div class="card-body">
						<img src="https://images.unsplash.com/photo-1477862096227-3a1bb3b08330?ixlib=rb-1.2.1&auto=format&fit=crop&w=700&q=60" alt="" class="card-img-top">
						<div class="card-body">
							<h5 class="card-title">Sunset</h5>
							<p class="card-text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ut eum similique repellat a laborum, rerum voluptates ipsam eos quo tempore iusto dolore modi dolorum in pariatur. Incidunt repellendus praesentium quae!</p>
							<a href="" class="btn btn-outline-success btn-sm">Read More</a>
							<a href="" class="btn btn-outline-danger btn-sm"><i class="far fa-heart"></i></a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4 px-2">
				<div class="card shadow-lg">
					<div class="card-body">
						<img src="https://images.unsplash.com/photo-1477862096227-3a1bb3b08330?ixlib=rb-1.2.1&auto=format&fit=crop&w=700&q=60" alt="" class="card-img-top">
						<div class="card-body">
							<h5 class="card-title">Sunset</h5>
							<p class="card-text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ut eum similique repellat a laborum, rerum voluptates ipsam eos quo tempore iusto dolore modi dolorum in pariatur. Incidunt repellendus praesentium quae!</p>
							<a href="" class="btn btn-outline-success btn-sm">Read More</a>
							<a href="" class="btn btn-outline-danger btn-sm"><i class="far fa-heart"></i></a>
						</div>
					</div>
				</div>
			</div>
			</center>
		</div>
		<footer class="footer mt-5">
			<div class="copy">&copy; 2022 My Team</div>
		</footer>
	</body>
</html>