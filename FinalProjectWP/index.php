<!DOCTYPE html>
<html>
<head>
	<title>Orhy Book Shelf</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
	<?php 
		include "connect.php";
		include "checktransaction.php";
		session_start();
	 ?>

	<!-- ================================== NAVBAR & JUMBOTRON ================================== -->
	<img src="img/blackbg.jpg" class="bg-us">
	<header>
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		  <a class="navbar-brand" href="index.php">Orhy Book Shelf</a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
		    <span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse" id="navbarSupportedContent">
		    <ul class="navbar-nav mr-auto">
		      <li class="nav-item active">
		        <a class="nav-link" href="index.php">Home</a>
		      </li>
		      <li class="nav-item dropdown">
		        <a class="nav-link dropdown-toggle" style="cursor: pointer;" id="navbarDropdown" data-toggle="dropdown">
		          Categories
		        </a>
		        <div class="dropdown-menu">
		        	<a class="dropdown-item" href="categories.php?cat=all">All</a>
		        	<?php 
		        		$sql = "SELECT * FROM categories";
		        		$data = mysqli_query($link, $sql);

		        		while ($row = mysqli_fetch_object($data)) {
		        			?>
		        				<a class="dropdown-item" href="categories.php?cat=<?=$row->CategoryId?>"><?=$row->CategoryName?></a>
		        			<?php 
		        		}
		        	 ?>
		        </div>
		      </li>		      
		      <li class="nav-item">
		        <a class="nav-link" href="about.php">About</a>
		      </li>
		    </ul>

		    <?php 
		    	if (!empty($_SESSION["nim"])) {
		    		$nim = $_SESSION["nim"];
		    		$sql = "SELECT * FROM members WHERE Nim = '$nim'";
		    		$data = mysqli_query($link, $sql);
		    		$row = mysqli_fetch_object($data);
		    		?>
		    		<a href="profile.php" class="text-warning" id="link">
		    			Hello, <?=$row->Name?>
				  	</a>
		    		<?php
		    	}
		    	else{
		    		?>
		    		<a href="signin.php">
		    			<button class="btn btn-outline-success my-2 my-sm-0 mr-1 rounded-0" type="submit">Sign in</button>
				  	</a>
		    		<?php
		    	}
		     ?>

		  </div>
		</nav>

		<div class="jumbotron jumbotron-fluid transparent m-0">
		  <div class="container">
		    <h1 class="display-4">Orhy Book Shelf</h1>
		    <p class="lead">Exclusive Book Shelf Collection for excellent reader</p>
		  </div>
		</div>
	
	</header>


	<!-- ================================== CATEGORY ================================== -->

	<main>
		<div class="container-fluid bg-white p-5">
			<h1 class="text-center text-dark m-4">Books</h1>
			<hr class="my-5" color="black">
			<div class="row">

			<?php 
			$i = 0;
			$sql = "SELECT * FROM categories";
		  $data = mysqli_query($link, $sql);
			while ($row = mysqli_fetch_object($data)) {
				if ($i == 3) {
					?>
						</div>
						<div class="row">
					<?php 
					$i = 0;
				}
				$sql2 = "SELECT * FROM books WHERE CategoryId = '$row->CategoryId' ORDER BY BookId DESC";
		  	$data2 = mysqli_query($link, $sql2);
		  	$row2 = mysqli_fetch_object($data2);
					 ?>
					 	<div class="col-4 p-0">
							<div class="p-3">
								<a href="categories.php?cat=<?=$row->CategoryId?>" id="link">
								<div class="cat cat-img" style="background-image: url(<?=$row2->Image?>)">
									<div class="transparent2 category">
							    	<h5 class="mx-auto display-4 text-center"><?=$row->CategoryName?></h5>
							  	</div>
								</div>
								</a>
							</div>
						</div>
					 <?php 
				
				$i++;
			}

			 ?>

			</div>
			<hr class="mt-5" color="black">
		</div>
	</main>

	<!-- ================================== ABOUT ================================== -->
	<div class="container-fluid bg-black p-4">
	<div class="index-blackbg">
		<div class="transparent">
			<div class="container p-4 center">
				<h1>About Us</h1>
				<br>
				<p>Website is created for educational purposes</p>
				<a href="about.php">
					<button type="button" class="btn btn-success text-Black">About</button>
				</a>
			</div>
		</div>
	</div>
	</div>

	<!-- ================================== FOOTER ================================== -->

	<footer class="bg-dark py-4">
		<div class="text-center">Copyright &copy; 2021 All Rights Reserved</div>
	</footer>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>