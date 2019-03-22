<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Grocery Shoppy an Ecommerce Category Bootstrap Responsive Web Template | Home :: w3layouts</title>
	<!--/tags -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Grocery Shoppy Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>

	<script src="{{ url('/') }}/js/jquery-2.1.4.min.js"></script>
	<!--//tags -->
	<link href="{{ url('/') }}/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="{{ url('/') }}/css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link href="{{ url('/') }}/css/font-awesome.css" rel="stylesheet">
	<!--pop-up-box-->
	<link href="{{ url('/') }}/css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
	<!--//pop-up-box-->
	<!-- price range -->
	<link rel="stylesheet" type="text/css" href="{{ url('/') }}/css/jquery-ui1.css">
	<!-- fonts -->
	<link href="{{ url('/') }}///fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">


	    <!-- Owl Stylesheets -->
    <link rel="stylesheet" href="{{ url('/') }}/assets/owlcarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ url('/') }}/assets/owlcarousel/assets/owl.theme.default.min.css">

    

</head>

<body>
	<!-- top-header -->
	

	<!-- //top-header -->
	<!-- header-bot-->

	<!-- shop locator (popup) -->
	<!-- Button trigger modal(shop-locator) -->



	<!-- Side navigation CSS -->
	<style>
body {
  font-family: "Lato", sans-serif;
}

.sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: white;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 20px;
  color: #7a7a7a;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: white;
  background-color: #00c5ff;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

.ban-top{
  	left: -10px;
  }

#cart {
	padding-top: 25px;
  	
  }

  #menu_col {

  	border-top-style: none;
  border-right-style: solid;
  border-bottom-style: none;
  border-left-style: none;
  border-width: 1px;
  border-color: #c6c6c6; height: 70px;
  }

  #area_col{
  	border-top-style: none;
  border-right-style: solid;
  border-bottom-style: none;
  border-left-style: none;
  border-width: 1px;
  border-color: #c6c6c6; height: 70px;
  }

  #search_col{
  	border-top-style: none;
  border-right-style: solid;
  border-bottom-style: none;
  border-left-style: none;
  border-width: 1px;
  border-color: #c6c6c6; height: 70px;
  }

  #cart {
  	
  }

  





@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}

  
}

@media screen and (max-width: 450px) {
 
  #search {
  	width: 0px;
  	visibility: hidden;
  }

  .ban-top{
  	left: 0px;
  }

  .agl_search{

  	top: -50px; padding-bottom: 100px; width: 0%;  left:  100px;
  }

  .dropdown-menu{

  	position: absolute;
  	left:-30px;
  	top:-150px;
  	z-index: 999;
  }

  

  #search {
  	position: absolute;

  	left:15px;
  	top:20px;
  }

  .agileits_search input[type="search"]{
    outline: none;
    
    background: #fff;
    border-right-color: transparent;
    color: #191e21;
    padding: 10px;
    font-size: 14px;
	float: left;
	width:0px;
	letter-spacing: 1px;

	visibility: hidden
}

.agileits_search .search_btn{

	position: absolute;
  	background-color: white;
  	color:black;
  	left:0px;
  	width:69px;
  	top:0px;
  	height: 68px;
  }

  .agileits_search .search_btn span{
  	color:black;
  	font-size: 20px;
  }

  .agileits_search .search_btn span :hover{
  	color:white;
  	font-size: 20px;
  }



  #menu_col {

  	width:50px;
  }

  #area_col{
  	width: 150px;
  }

  #search_col{
  	width: 71px;
  	  	border-top-style: none;
  border-right-style: solid;
  border-bottom-style: none;
  border-left-style: none;
  border-width: 1px;
  border-color: #c6c6c6; height: 70px;
  }


  #cart {
  	position: absolute;

  	left:10px;
  	top:0px;
  }
}


</style>


	
	<!-- //header-bot -->
	<!-- navigation -->
	<div id="mySidenav" class="sidenav" style="z-index: 3;">
		<img src="{{ url('/') }}/images/logos/full_logo.png" style=" height: 40px; position:relative; left:20px;top:-50px; " onclick="openNav()">
				
				<span href="{{ url('/') }}/javascript:void(0)" class="" onclick="closeNav()" style="position: absolute; left: 200px; top:10px; width: 50px; height: 50px; padding:0px; font-size: 35px; cursor: pointer;">&times;</span>

  <br><br>
  <a href="{{ url('/') }}/#"><i class="fa fa-user" aria-hidden="true" style="font-size: 28px; padding-right: 15px;"></i> Login or Signup</a>
</div>


	<div class="ban-top"  style="position: absolute; top:0px; z-index: 2; position: fixed; background-color: white; width: 100%;  height: 70px;">
		<div class="">

			<div class="row row-divided">

				<div class="col-xs-1" id="menu_col" style="padding-left: 2%; padding-top: 10px;  height: 70px;">
					<img src="{{ url('/') }}/images/logos/short_logo.png" style=" height: 40px;" onclick="openNav()">

					
  	<!--<span style="font-size:25px;cursor:pointer; position: absolute; top:10px; left: 25px;" >&#9776;&nbsp;</span> -->
 
					

				</div>

				<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>

				
				

	

				<style type="text/css">


					#cart div {
						padding-left: 5px; left:20px; top:15px;
					}

					.agileits_search_popup form{
						border-style:solid;
						border-width: 1px;
						border-color: #d6d6d6;
					}



					.product_search_modal-dialog {
						  width: 450px;
						  left:43%;
						  top:2%;
						  margin: 0;
						  padding: 0;
					}

					.product_search_modal-content{
					  height: auto;
					  min-height: 50%;
					  border-radius: 0;

					}




					











					.agileits_search_popup input[type="search"]{
							width:370px;
							height: 40px;
							border-style: none;
							border-width: 0px;
							padding-left: 10px;
							
						}

						.agileits_search_popup .btn{
							border-radius: 0px;
							height: 40px;
							float: right;
							background-color: #38acff;
							color: white;
							border-width: 0px;
						}

						.agileits_search_popup .search_result_div{
							height: 100px;
							width: 447px;
							background-color: white; 
							text-align: center;
						}

						

					@media screen and (max-width: 450px) {

						#cart div {
						padding-left: 5px; left:5px; top:15px;
							}


						.product_search_modal-dialog {
							  
							  width: 100%;
							  top:3%;
							  left:2%;
							  margin: 0;
							  padding: 0;
						}

						.product_search_modal-content{
							height: auto;
							top:20%;
							width: 100%;
						    min-height: 50%;
						    border-radius: 0;

						}


						.agileits_search_popup input[type="search"]{
							width:200px;
							height: 40px;
							border-width: 1px;
						}

						.agileits_search_popup .btn{
							border-radius: 0px;
							height: 40px;
							float: right;
							background-color: #38acff;
							color: white;
							border-width: 0px;
						}

						.agileits_search_popup .search_result_div{
							height: 100px;
							width: 100%;
							background-color: white; 
							text-align: center;
						}

						.agileits_search_popup .btn :hover{
							border-radius: 0px;
							height: 40px;
							float: right;
							background-color: #ff6937;
							color: white;
							border-width: 0px;
						}	




					}

					#location_modal-dialog {
					  width: 105%;
					  height: 100%;
					  margin: 0;
					  padding: 0;
					}

					#location_modal-content {
					  height: auto;
					  min-height: 105%;
					  border-radius: 0;
					}

					



					.close {
					    color: white; 
					    opacity: 1;
					}

					.close :hover{
					    color: white; 
					    opacity: 1;
					}

				</style>

				<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.0/css/bootstrap.min.css">

				<style>

				 

.funkyradio .funkyradio-default {
  
  overflow: hidden;
font-size: 30px;


}

.funkyradio label {
  width: 100%;
  border-radius: 3px;
  border: 1px solid #D1D3D4;
  font-weight: normal;
  padding-left: 100px;
  font-size: 30px;
  height: 150px;




}

.funkyradio input[type="radio"]:empty,
.funkyradio input[type="checkbox"]:empty {
  display: none;
font-size: 30px;


}

.funkyradio input[type="radio"]:empty ~ label,
.funkyradio input[type="checkbox"]:empty ~ label {
  position: relative;
  line-height: 2.5em;
  text-indent: 3.25em;
  margin-top: 2em;
  cursor: pointer;
  -webkit-user-select: none;
     -moz-user-select: none;
      -ms-user-select: none;
          user-select: none;
          font-size: 30px;


}

.funkyradio input[type="radio"]:empty ~ label:before,
.funkyradio input[type="checkbox"]:empty ~ label:before {
  position: absolute;
  display: block;
  top: 0;
  bottom: 0;
  left: 0;
  content: '';
  width: 2.5em;
  background: #D1D3D4;
  border-radius: 3px 0 0 3px;
   width: 100px;
   font-size: 30px;



}

.funkyradio input[type="radio"]:hover:not(:checked) ~ label,
.funkyradio input[type="checkbox"]:hover:not(:checked) ~ label {
  color: #888;

font-size: 30px;


}

.funkyradio input[type="radio"]:hover:not(:checked) ~ label:before,
.funkyradio input[type="checkbox"]:hover:not(:checked) ~ label:before {
  content: '\2714';
  text-indent: .9em;
  color: #C2C2C2;
  font-size: 30px;


  

}

.funkyradio input[type="radio"]:checked ~ label,
.funkyradio input[type="checkbox"]:checked ~ label {
  color: #777;
  font-size: 30px;


  

}

.funkyradio input[type="radio"]:checked ~ label:before,
.funkyradio input[type="checkbox"]:checked ~ label:before {
  content: '\2714';
  text-indent: .9em;
  color: #333;
  background-color: #ccc;
}

.funkyradio input[type="radio"]:focus ~ label:before,
.funkyradio input[type="checkbox"]:focus ~ label:before {
  box-shadow: 0 0 0 3px #999;
}

.funkyradio-default input[type="radio"]:checked ~ label:before,
.funkyradio-default input[type="checkbox"]:checked ~ label:before {
  color: #333;
  background-color: #ccc;
}

.funkyradio-primary input[type="radio"]:checked ~ label:before,
.funkyradio-primary input[type="checkbox"]:checked ~ label:before {
  color: #fff;
  background-color: #337ab7;
  width: 100px;
}

.funkyradio-success input[type="radio"]:checked ~ label:before,
.funkyradio-success input[type="checkbox"]:checked ~ label:before {
  color: #fff;
  background-color: #5cb85c;
}

.funkyradio-danger input[type="radio"]:checked ~ label:before,
.funkyradio-danger input[type="checkbox"]:checked ~ label:before {
  color: #fff;
  background-color: #d9534f;
}

.funkyradio-warning input[type="radio"]:checked ~ label:before,
.funkyradio-warning input[type="checkbox"]:checked ~ label:before {
  color: #fff;
  background-color: #f0ad4e;
}

.funkyradio-info input[type="radio"]:checked ~ label:before,
.funkyradio-info input[type="checkbox"]:checked ~ label:before {
  color: #fff;
  background-color: #5bc0de;
}
</style>

<style type="text/css">
	

	.shop_card{
		position: relative;
		left: 0px;
	}
	.shop_card .image{
		padding-left:0px; border-style-:solid; border-color:black; border-width:1px; height:120px; border-radius: 100px;
		
	}

	.shop_card .heading{
		font-size: 25px;
		line-height: 10px;
		font-weight: 600;
		color: black;
	}

	.shop_card .price {
		font-size: 15px;
		line-height: 3px;

	}

	.small_break{
		line-height: 1px;
		margin-top: 1px;
	}

	.shop_card .col-xs-3{
		width: 40%;
	}

	.shop_card .col-xs-4{
		width: 60%;
		padding-left: 150px;
		padding-top: 30px;
	}

	.shop_card .price_span{
		font-size: 25px;
		line-height: 10px;
		color: black;
	}

	.shop_card .address{
		font-size: 15px;
		line-height: 10px;
	}


	@media screen and (max-width: 450px) {


	.shop_card{
		position: relative;
		left: -50px;
	}
	.shop_card .image{
		padding-left:40px; border-style-:solid; border-color:black; border-width:1px; height:80px; border-radius: 100px;
		
	}

	.shop_card .heading{
		font-size: 15px;
		line-height: 3px;
		font-weight: 600;
		color: black;
	}

	.shop_card .price {
		font-size: 10px;
		line-height: 3px;

	}

	.small_break{
		line-height: 1px;
		margin-top: 1px;
	}

	.shop_card .col-xs-3{
		width: 50px;
	}

	.shop_card .col-xs-4{
		width: 400px;
		padding-left: 0px;
		padding-top: 0px;
	}

	.shop_card .price_span{
		font-size: 15px;
		line-height: 3px;
		color: black;
	}

	.shop_card .address{
		font-size: 10px;
		line-height: 3px;
	}



	}
</style>

				
			</div>
			
			
		</div>
	</div>









<!-- STEP 1
				    <div class="funkyradio">
 <div class="funkyradio-primary" style="height: 150px;">
            <input type="radio" name="radio" id="radio1"  />
            <label for="radio1" style="height: 150px;">
            	<div class="row shop_card">
					<div class="col-xs-3" style="width: 50px;">
						<img class="image" src="{{ url('/') }}/images/m1.jpg" style="">
					</div>
					<div class="col-xs-4" style="">
						<h4 class="heading">Bansi Ram Retailer Shop</h4>
						
						<p class="address" >Some Address</p>
						
						<p class="price" >  Total Price - <span class="price_span" >Rs. 586 /- </span></p>
					</div>

				</div>
            </label>
        </div> 
<br>


         <div class="funkyradio-primary" style="height: 150px;">
            <input type="radio" name="radio" id="radio2"  />
            <label for="radio2" style="height: 150px;">
            	<div class="row shop_card">
					<div class="col-xs-3" style="width: 50px;">
						<img class="image" src="{{ url('/') }}/images/m1.jpg" style="">
					</div>
					<div class="col-xs-4" style="">
						<h4 class="heading">Bansi Ram Retailer Shop</h4>
						
						<p class="address" >Some Address</p>
						
						<p class="price" >  Total Price - <span class="price_span" >Rs. 586 /- </span></p>
					</div>

				</div>
            </label>
        </div> 
        <br>
        <div class="funkyradio-primary" style="height: 150px;">
            <input type="radio" name="radio" id="radio3"  />
            <label for="radio3" style="height: 150px;">
            	<div class="row shop_card">
					<div class="col-xs-3" style="width: 50px;">
						<img class="image" src="{{ url('/') }}/images/m1.jpg" style="">
					</div>
					<div class="col-xs-4" style="">
						<h4 class="heading">Bansi Ram Retailer Shop</h4>
						
						<p class="address" >Some Address</p>
						
						<p class="price" >  Total Price - <span class="price_span" >Rs. 586 /- </span></p>
					</div>

				</div>
            </label>
        </div> 
        <br>
 <div class="funkyradio-primary" style="height: 150px;">
            <input type="radio" name="radio" id="radio4"  />
            <label for="radio4" style="height: 150px;">
            	<div class="row shop_card">
					<div class="col-xs-3" style="width: 50px;">
						<img class="image" src="{{ url('/') }}/images/m1.jpg" style="">
					</div>
					<div class="col-xs-4" style="">
						<h4 class="heading">Bansi Ram Retailer Shop</h4>
						
						<p class="address" >Some Address</p>
						
						<p class="price" >  Total Price - <span class="price_span" >Rs. 586 /- </span></p>
					</div>

				</div>
            </label>
        </div> 
 -->


<!-- STEP 2  <div style="position:relative; padding-left :20%; padding-top: 10%;">
					<h3><span style="font-size: 15px;">Your Phone -</span> 9973070316</h3>
					<input class="form-control" type="text" name="" placeholder="enter your phone..." style="width: 80%;">
					<br>
				<button class="form-control btn-primary btn lg" style="width: 80%;">SEND OTP</button>

				</div> -->




				<!-- STEP 3 <div style="position:relative; padding-left :20%; padding-top: 10%;">
					<h3>Address details</h3>
					<input class="form-control" type="text" name="" placeholder="district" style="width: 80%;">
					<input class="form-control" type="text" name="" placeholder="area" style="width: 80%;">
					<input class="form-control" type="text" name="" placeholder="street" style="width: 80%;">
					<input class="form-control" type="text" name="" placeholder="timing" style="width: 80%;">
					<br>
				<button class="form-control btn-primary btn lg" style="width: 80%;">Save Address</button>

				</div>  -->


				<!-- STEP 4 <div style="position:relative; padding-left :20%; padding-top: 10%;">
					<p>Your ordered a deal of total <span style="font-size: 25px; color:#38c002; ">543 Rs</span>. Which will be delivered <span style="font-size: 25px; color:#ffb900;">within 24 hrs</span>.</p>
					
				<button class="form-control btn-primary btn-lg" style="width: 80%; height: 50px;">OKAY</button>

				</div>  -->






	<div class="container" style="background-color: white; padding-top: 100px; padding-bottom: 100px;">

		<div class="panel panel-primary">
			<div class="panel-heading"><span style="font-weight: 600;">Finalising order.</span> <span class="step_heading" style="font-size: 12px; ">STEP 1 - Select retailers in your area.</span></div>
			<div class="finalise_order_frame funkyradio" style="height: 350px; overflow-y: scroll; overflow-x:hidden;">







 <div class="funkyradio-primary" style="height: 150px;">
            <input type="radio" name="radio" id="radio1"  />
            <label for="radio1" style="height: 150px;">
            	<div class="row shop_card">
					<div class="col-xs-3" style="width: 50px;">
						<img class="image" src="{{ url('/') }}/images/m1.jpg" style="">
					</div>
					<div class="col-xs-4" style="">
						<h4 class="heading">Bansi Ram Retailer Shop</h4>
						
						<p class="address" >Some Address</p>
						
						<p class="price" >  Total Price - <span class="price_span" >Rs. 586 /- </span></p>
					</div>

				</div>
            </label>
        </div> 
<br>


         <div class="funkyradio-primary" style="height: 150px;">
            <input type="radio" name="radio" id="radio2"  />
            <label for="radio2" style="height: 150px;">
            	<div class="row shop_card">
					<div class="col-xs-3" style="width: 50px;">
						<img class="image" src="{{ url('/') }}/images/m1.jpg" style="">
					</div>
					<div class="col-xs-4" style="">
						<h4 class="heading">Bansi Ram Retailer Shop</h4>
						
						<p class="address" >Some Address</p>
						
						<p class="price" >  Total Price - <span class="price_span" >Rs. 586 /- </span></p>
					</div>

				</div>
            </label>
        </div> 
        <br>
        <div class="funkyradio-primary" style="height: 150px;">
            <input type="radio" name="radio" id="radio3"  />
            <label for="radio3" style="height: 150px;">
            	<div class="row shop_card">
					<div class="col-xs-3" style="width: 50px;">
						<img class="image" src="{{ url('/') }}/images/m1.jpg" style="">
					</div>
					<div class="col-xs-4" style="">
						<h4 class="heading">Bansi Ram Retailer Shop</h4>
						
						<p class="address" >Some Address</p>
						
						<p class="price" >  Total Price - <span class="price_span" >Rs. 586 /- </span></p>
					</div>

				</div>
            </label>
        </div> 
        <br>
 <div class="funkyradio-primary" style="height: 150px;">
            <input type="radio" name="radio" id="radio4"  />
            <label for="radio4" style="height: 150px;">
            	<div class="row shop_card">
					<div class="col-xs-3" style="width: 50px;">
						<img class="image" src="{{ url('/') }}/images/m1.jpg" style="">
					</div>
					<div class="col-xs-4" style="">
						<h4 class="heading">Bansi Ram Retailer Shop</h4>
						
						<p class="address" >Some Address</p>
						
						<p class="price" >  Total Price - <span class="price_span" >Rs. 586 /- </span></p>
					</div>

				</div>
            </label>
        </div> 







				
				
				
    </div>
				
				

			</div>
			<nav aria-label="..." style="padding-left:50px; padding-right: 50px;">
			  <ul class="pager">
			    <li class="previous" step_num="0"><a href="#"><span aria-hidden="true">&larr;</span> Back</a></li>
			    <li class="next" step_num="2"><a href="#">Next Step <span aria-hidden="true">&rarr;</span></a></li>
			  </ul>
			</nav>
		</div>
	</div>






















	<!-- copyright -->
	<div class="copy-right">
		<div class="container">
			<p>© 2017 Grocery Shoppy. All rights reserved | Design by
				<a href="{{ url('/') }}/http://w3layouts.com"> W3layouts.</a>
			</p>
		</div>
	</div>
	<!-- //copyright -->

	<!-- js-files -->
	<!-- jquery -->
	
	<!-- //jquery -->

	<script type="text/javascript">
		
		$(function(){

			//the method below shows the step 1
			function showStepOne(){

				$('.step_heading').html("STEP 1 - Select retailer in your area.");

				  $resultString = "";
  $resultString+='<div class="funkyradio">'+"\n";
  $resultString+=' <div class="funkyradio-primary" style="height: 150px;">'+"\n";
  $resultString+='            <input type="radio" name="radio" id="radio1"  />'+"\n";
  $resultString+='            <label for="radio1" style="height: 150px;">'+"\n";
  $resultString+='            	<div class="row shop_card">'+"\n";
  $resultString+='					<div class="col-xs-3" style="width: 50px;">'+"\n";
  $resultString+='						<img class="image" src="{{ url("/") }}/images/m1.jpg" style="">'+"\n";
  $resultString+='					</div>'+"\n";
  $resultString+='					<div class="col-xs-4" style="">'+"\n";
  $resultString+='						<h4 class="heading">Bansi Ram Retailer Shop</h4>'+"\n";
  $resultString+='						'+"\n";
  $resultString+='						<p class="address" >Some Address</p>'+"\n";
  $resultString+='						'+"\n";
  $resultString+='						<p class="price" >  Total Price - <span class="price_span" >Rs. 586 /- </span></p>'+"\n";
  $resultString+='					</div>'+"\n";
  $resultString+=''+"\n";
  $resultString+='				</div>'+"\n";
  $resultString+='            </label>'+"\n";
  $resultString+='        </div> '+"\n";
  $resultString+='<br>'+"\n";
  $resultString+=''+"\n";
  $resultString+=''+"\n";
  $resultString+='         <div class="funkyradio-primary" style="height: 150px;">'+"\n";
  $resultString+='            <input type="radio" name="radio" id="radio2"  />'+"\n";
  $resultString+='            <label for="radio2" style="height: 150px;">'+"\n";
  $resultString+='            	<div class="row shop_card">'+"\n";
  $resultString+='					<div class="col-xs-3" style="width: 50px;">'+"\n";
  $resultString+='						<img class="image" src="{{ url("/") }}/images/m1.jpg" style="">'+"\n";
  $resultString+='					</div>'+"\n";
  $resultString+='					<div class="col-xs-4" style="">'+"\n";
  $resultString+='						<h4 class="heading">Bansi Ram Retailer Shop</h4>'+"\n";
  $resultString+='						'+"\n";
  $resultString+='						<p class="address" >Some Address</p>'+"\n";
  $resultString+='						'+"\n";
  $resultString+='						<p class="price" >  Total Price - <span class="price_span" >Rs. 586 /- </span></p>'+"\n";
  $resultString+='					</div>'+"\n";
  $resultString+=''+"\n";
  $resultString+='				</div>'+"\n";
  $resultString+='            </label>'+"\n";
  $resultString+='        </div> '+"\n";
  $resultString+='        <br>'+"\n";
  $resultString+='        <div class="funkyradio-primary" style="height: 150px;">'+"\n";
  $resultString+='            <input type="radio" name="radio" id="radio3"  />'+"\n";
  $resultString+='            <label for="radio3" style="height: 150px;">'+"\n";
  $resultString+='            	<div class="row shop_card">'+"\n";
  $resultString+='					<div class="col-xs-3" style="width: 50px;">'+"\n";
  $resultString+='						<img class="image" src="{{ url("/") }}/images/m1.jpg" style="">'+"\n";
  $resultString+='					</div>'+"\n";
  $resultString+='					<div class="col-xs-4" style="">'+"\n";
  $resultString+='						<h4 class="heading">Bansi Ram Retailer Shop</h4>'+"\n";
  $resultString+='						'+"\n";
  $resultString+='						<p class="address" >Some Address</p>'+"\n";
  $resultString+='						'+"\n";
  $resultString+='						<p class="price" >  Total Price - <span class="price_span" >Rs. 586 /- </span></p>'+"\n";
  $resultString+='					</div>'+"\n";
  $resultString+=''+"\n";
  $resultString+='				</div>'+"\n";
  $resultString+='            </label>'+"\n";
  $resultString+='        </div> '+"\n";
  $resultString+='        <br>'+"\n";
  $resultString+=' <div class="funkyradio-primary" style="height: 150px;">'+"\n";
  $resultString+='            <input type="radio" name="radio" id="radio4"  />'+"\n";
  $resultString+='            <label for="radio4" style="height: 150px;">'+"\n";
  $resultString+='            	<div class="row shop_card">'+"\n";
  $resultString+='					<div class="col-xs-3" style="width: 50px;">'+"\n";
  $resultString+='						<img class="image" src="{{ url("/") }}/images/m1.jpg" style="">'+"\n";
  $resultString+='					</div>'+"\n";
  $resultString+='					<div class="col-xs-4" style="">'+"\n";
  $resultString+='						<h4 class="heading">Bansi Ram Retailer Shop</h4>'+"\n";
  $resultString+='						'+"\n";
  $resultString+='						<p class="address" >Some Address</p>'+"\n";
  $resultString+='						'+"\n";
  $resultString+='						<p class="price" >  Total Price - <span class="price_span" >Rs. 586 /- </span></p>'+"\n";
  $resultString+='					</div>'+"\n";
  $resultString+=''+"\n";
  $resultString+='				</div>'+"\n";
  $resultString+='            </label>'+"\n";
  $resultString+='        </div>'+"\n";

  				  $('.finalise_order_frame').html('');
				  $('.finalise_order_frame').html($resultString);

			}

			//the method below shows the step 2 function
			function showStepTwo(){

					$('.step_heading').html("STEP 2 - Verify your phone number.");

				  $resultString = "";
				  $resultString+='<div style="position:relative; padding-left :20%; padding-top: 10%;">'+"\n";
				  $resultString+='					<h3><span style="font-size: 15px;">Your Phone -</span> 9973070316</h3>'+"\n";
				  $resultString+='					<input class="form-control" type="text" name="" placeholder="enter your phone..." style="width: 80%;">'+"\n";
				  $resultString+='					<br>'+"\n";
				  $resultString+='				<button class="form-control btn-primary btn lg" style="width: 80%;">SEND OTP</button>'+"\n";
				  $resultString+=''+"\n";
				  $resultString+='				</div>'+"\n";
				  

				  $('.finalise_order_frame').html('');
				  $('.finalise_order_frame').html($resultString);


			}


			//the method below shows the step 3
			function showStepThree(){
					$('.step_heading').html("STEP 1 - Give your delivery address.");

				  $resultString = "";
				  $resultString+='<div style="position:relative; padding-left :20%; padding-top: 0%;">'+"\n";
				  $resultString+='					<h3>Address details</h3>'+"\n";
				  $resultString+='					<input class="form-control" type="text" name="" placeholder="district" style="width: 80%;">'+"\n";
				  $resultString+='					<input class="form-control" type="text" name="" placeholder="area" style="width: 80%;">'+"\n";
				  $resultString+='					<input class="form-control" type="text" name="" placeholder="street" style="width: 80%;">'+"\n";
				  $resultString+='					<input class="form-control" type="text" name="" placeholder="timing" style="width: 80%;">'+"\n";
				  $resultString+='					<br>'+"\n";
				  $resultString+='				<button class="form-control btn-primary btn lg" style="width: 80%;">Save Address</button>'+"\n";
				  $resultString+=''+"\n";
				  $resultString+='				</div>'+"\n";
				  

				  $('.finalise_order_frame').html('');
				  $('.finalise_order_frame').html($resultString);


			}

			//the method below show the step four
			function showStepFour(){

				$('.step_heading').html("STEP 1 - Finalise your order.");

				  $resultString = "";
				  $resultString+='<div style="position:relative; padding-left :20%; padding-top: 10%;">'+"\n";
				  $resultString+='					<p>Your ordered a deal of total <span style="font-size: 25px; color:#38c002; ">543 Rs</span>. Which will be delivered <span style="font-size: 25px; color:#ffb900;">within 24 hrs</span>.</p>'+"\n";
				  $resultString+='					'+"\n";
				  $resultString+='				<button class="form-control btn-primary btn-lg" style="width: 80%; height: 50px;">OKAY</button>'+"\n";
				  $resultString+=''+"\n";
				  $resultString+='				</div>'+"\n";
				  

				  $('.finalise_order_frame').html('');
				  $('.finalise_order_frame').html($resultString);



			}


			$('.previous').attr('style',"visibility:hidden;");
			//the method below circulates through steps
			function circulateForwardThroughSteps(){

				var nextStepNum = $('.next').attr('step_num');
				var previousStepNum = $('.previous').attr('step_num');

				var updateNextStep = parseInt(nextStepNum);

				if(nextStepNum==2){
					showStepTwo();
					updateNextStep = updateNextStep+1;

					previousStepNum = parseInt(previousStepNum) +1; 
					$('.previous').attr('style',"visibility:visible;");

				}

				if(nextStepNum==3){
					showStepThree();
					updateNextStep = updateNextStep+1;
					previousStepNum = parseInt(previousStepNum) +1; 
				}

				if(nextStepNum==4){
					showStepFour();
					previousStepNum = parseInt(previousStepNum) +1; 
					updateNextStep = updateNextStep+1;
					//hide button
					$('.next').attr('style',"visibility:hidden;");
				}



				console.log("Next Step - "+updateNextStep);
				console.log("Previous Step - "+previousStepNum);


				//button button attr
				$('.next').attr('step_num',updateNextStep);
				$('.previous').attr('step_num', previousStepNum);
			}




			//the method below circulate backard through steps
			function ciriculateBackwardThroughSteps(){

				var nextStepNum = $('.next').attr('step_num');
				var previousStepNum = $('.previous').attr('step_num');

				nextStepNum = parseInt(nextStepNum);

				var updatepreviousStep = parseInt(previousStepNum);

				if(previousStepNum==1){
					showStepOne();
					updatepreviousStep = parseInt(updatepreviousStep)-1;

					nextStepNum = nextStepNum-1;
					$('.previous').attr('style',"visibility:hidden;");

				}

				if(previousStepNum==2){
					showStepTwo();
					updatepreviousStep = parseInt(updatepreviousStep)-1;
					nextStepNum = nextStepNum-1;
				}

				if(previousStepNum==3){
					showStepThree();
					updatepreviousStep = parseInt(updatepreviousStep)-1;
					nextStepNum = nextStepNum-1;
					$('.next').attr('style',"visibility:visible;");
				}

				if(previousStepNum==4){
					showStepFour();
					updatepreviousStep = parseInt(updatepreviousStep)-1;
					nextStepNum = nextStepNum-1;
					//hide button


					
				}


				console.log("Next Step - "+nextStepNum);
				console.log("Previous Step - "+updatepreviousStep);

				//button button attr
				$('.next').attr('step_num',nextStepNum);
				$('.previous').attr('step_num', updatepreviousStep);
			}



			$('.next').on('click',function(){
				circulateForwardThroughSteps();
			});
			$('.previous').on('click',function(){
				ciriculateBackwardThroughSteps();
			});

		});
	</script>

	<!-- popup modal (for signin & signup)-->
	<script src="{{ url('/') }}/js/jquery.magnific-popup.js"></script>
	<script>
		$(document).ready(function () {
			$('.popup-with-zoom-anim').magnificPopup({
				type: 'inline',
				fixedContentPos: false,
				fixedBgPos: true,
				overflowY: 'auto',
				closeBtnInside: true,
				preloader: false,
				midClick: true,
				removalDelay: 300,
				mainClass: 'my-mfp-zoom-in'
			});

		});
	</script>
	<!-- Large modal -->
	<!-- <script>
		$('#').modal('show');
	</script> -->
	<!-- //popup modal (for signin & signup)-->

	<!-- cart-js -->
	<script src="{{ url('/') }}/js/minicart.js"></script>
	<script>
		paypalm.minicartk.render(); //use only unique class names other than paypalm.minicartk.Also Replace same class name in css and minicart.min.js

		paypalm.minicartk.cart.on('checkout', function (evt) {
			var items = this.items(),
				len = items.length,
				total = 0,
				i;

			// Count the number of each item in the cart
			for (i = 0; i < len; i++) {
				total += items[i].get('quantity');
			}

			if (total < 3) {
				alert('The minimum order quantity is 3. Please add more to your shopping cart before checking out');
				evt.preventDefault();
			}
		});
	</script>
	<!-- //cart-js -->

	<!-- price range (top products) -->
	<script src="{{ url('/') }}/js/jquery-ui.js"></script>
	<script>
		//<![CDATA[ 
		$(window).load(function () {
			$("#slider-range").slider({
				range: true,
				min: 0,
				max: 9000,
				values: [50, 6000],
				slide: function (event, ui) {
					$("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
				}
			});
			$("#amount").val("$" + $("#slider-range").slider("values", 0) + " - $" + $("#slider-range").slider("values", 1));

		}); //]]>
	</script>
	<!-- //price range (top products) -->

	<!-- flexisel (for special offers) -->
	<script src="{{ url('/') }}/js/jquery.flexisel.js"></script>
	<script>
		$(window).load(function () {
			$("#flexiselDemo1").flexisel({
				visibleItems: 3,
				animationSpeed: 1000,
				autoPlay: true,
				autoPlaySpeed: 3000,
				pauseOnHover: true,
				enableResponsiveBreakpoints: true,
				responsiveBreakpoints: {
					portrait: {
						changePoint: 480,
						visibleItems: 1
					},
					landscape: {
						changePoint: 640,
						visibleItems: 2
					},
					tablet: {
						changePoint: 768,
						visibleItems: 2
					}
				}
			});

		});
	</script>
	<!-- //flexisel (for special offers) -->

	<!-- password-script -->
	<script>
		window.onload = function () {
			document.getElementById("password1").onchange = validatePassword;
			document.getElementById("password2").onchange = validatePassword;
		}

		function validatePassword() {
			var pass2 = document.getElementById("password2").value;
			var pass1 = document.getElementById("password1").value;
			if (pass1 != pass2)
				document.getElementById("password2").setCustomValidity("Passwords Don't Match");
			else
				document.getElementById("password2").setCustomValidity('');
			//empty string means no validation error
		}
	</script>
	<!-- //password-script -->

	<!-- smoothscroll -->
	<script src="{{ url('/') }}/js/SmoothScroll.min.js"></script>
	<!-- //smoothscroll -->

	<!-- start-smooth-scrolling -->
	<script src="{{ url('/') }}/js/move-top.js"></script>
	<script src="{{ url('/') }}/js/easing.js"></script>
	<script>
		jQuery(document).ready(function ($) {
			$(".scroll").click(function (event) {
				event.preventDefault();

				$('html,body').animate({
					scrollTop: $(this.hash).offset().top
				}, 1000);
			});
		});
	</script>
	<!-- //end-smooth-scrolling -->

	<!-- smooth-scrolling-of-move-up -->
	<script>
		$(document).ready(function () {
			/*
			var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
			};
			*/
			$().UItoTop({
				easingType: 'easeOutQuart'
			});

		});
	</script>
	<!-- //smooth-scrolling-of-move-up -->

	<!-- for bootstrap working -->
	<script src="{{ url('/') }}/js/bootstrap.js"></script>
	<!-- //for bootstrap working -->
	<!-- //js-files -->


</body>

</html>

