<!DOCTYPE html>
<html>
<head>
	<title>Payment Status</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link href='https://fonts.googleapis.com/css?family=Ubuntu+Mono' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
	

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	

	<link rel="stylesheet" type="text/css" href="{{url('/')}}/css/AccessLevel.css"/>
</head>
<body>
	 <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-primary">
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
	    <a class="navbar-brand" href="#">BOOK.com</a>
	    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
	      <li class="nav-item active">
	        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
	      </li>
	      
	    </ul>
	    <form class="form-inline my-2 my-lg-0">
	      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" id = "search">
					<!-- 	      		<button class="btn btn-outline-dark my-2 my-sm-0"  type="submit">Search</button>
					 -->	   
		</form>
	    <div style="color: white;">
	    	<i class="fa fa-shopping-cart fa-2x"><small><sup><sup><span id = "cart_count" class="badge badge-danger"><big>0</big></span></small></sup></sup></i>
	    	<a href="#" class="btn btn-danger ">Cart</a>
	    </div>
	  </div>
	</nav>
	 
 	<br>
 	<br>
 	<br>
	<div class="container">
		<div class="row" align="center">
			<div class="offset-md-2 col-md-8">
				<div class="card">
					<div class="card-body">
						@if($status == "success")
						<!-- success -->
						<i class="fa fa-check-circle fa-5x" aria-hidden="true"></i>
						<br>
						<h1 class="orderMsg">Order Successfully Placed</h1>
						<hr>
						<b><div>Your order number is <span class="red">#{{$payment_id}}</span></div></b>
						<hr>
						<div><small>You'll receive an email confirmation shortly on your associated email</small></div>
						<div class="container">
							<div class="row">
								<div class="offset-md-3 col-sm-3">
									<big>ORDER TOTAL</big>
								</div>
								<div class="col-sm-3">
									<big><b>{{$amount}}</b></big>
								</div>
							</div>

							<div class="row">
								<div class="offset-md-3 col-sm-3">
									<small>Payment Method</small>
								</div>
								<div class="col-sm-3">
									<small>{{$mode}}</small>
								</div>
							</div>
							<br>
							<br>
							<div class="row">
								<div class="offset-md-2 col-sm-4">
									<button type="button" class="btn btn-lg btn-outline-primary">MY ACCOUNT</button>
								</div>
								<div class="col-sm-4">
									<button type="button" class="btn btn-lg btn-dark">CONTINUE SHOPPING</button>
								</div>
							</div>
						</div>
						@else 
						<!-- failed -->
						<i style="color: red;" class="fa fa-times fa-5x" aria-hidden="true"></i>
						<br>
						<h1 style="color: red;" class="orderMsg">{{$status}}</h1>
						<hr>
						<b><div>Your order number is <span class="red">#{{$payment_id}}</span></div></b>
						<hr>
						<div><small>You'll receive an email confirmation shortly on your associated email</small></div>
						<div class="container">
							<div class="row">
								<div class="offset-md-3 col-sm-3">
									<big>ORDER TOTAL</big>
								</div>
								<div class="col-sm-3">
									<big><b>{{$amount}}</b></big>
								</div>
							</div>

							<br>
							<hr>
							<div class="row">
								<div align="right" class="offset-md-1 col-sm-5">
									<h4>Possible Reason</h4>
								</div>
								<div class="col-sm-5">
									<ul align="left">
										<li>Invalid Card Details</li>
										<li>Card Has Expired</li>
										<li>Insufficient funds</li>
										<li>Secure Authentication Unsucessful</li>
									</ul>
								</div>
									
							</div>
							<br>
							<div class="row">
								<div class="offset-md-2 col-sm-4">
									<button type="button" class="btn btn-lg btn-outline-primary">MY ACCOUNT</button>
								</div>
								<div class="col-sm-4">
									<button type="button" class="btn btn-lg btn-dark">CONTINUE SHOPPING</button>
								</div>
							</div>
						</div>
						@endif
					</div>
				</div>
			</div>
			
		</div>
	</div>
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script type="text/javascript" src="{{url('/')}}/js/AccessLevel/searchable.js"></script>
	<script type="text/javascript">
		$url ="{{url('/')}}";
	</script>
	
</body>
</html>