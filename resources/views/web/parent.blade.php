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
  z-index: 999;
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


	<div id="small-dialog1" class="mfp-hide" style="position:absolute; top:0px; left: 300px;">
		<div class="select-city">
			<h3>Please Select Your Location</h3>
			<select class="list_of_cities">
				<optgroup label="Popular Cities">
					<option selected style="display:none;color:#eee;">Select City</option>
					<option>Birmingham</option>
					<option>Anchorage</option>
					<option>Phoenix</option>
					<option>Little Rock</option>
					<option>Los Angeles</option>
					<option>Denver</option>
					<option>Bridgeport</option>
					<option>Wilmington</option>
					<option>Jacksonville</option>
					<option>Atlanta</option>
					<option>Honolulu</option>
					<option>Boise</option>
					<option>Chicago</option>
					<option>Indianapolis</option>
				</optgroup>
				
			</select>
			<div class="clearfix"></div>
		</div>
	</div>
	<!-- //shop locator (popup) -->
	<!-- signin Model -->
	<!-- Modal1 -->
	<div class="modal fade" id="myModal1" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body modal-body-sub_agile">
					<div class="main-mailposi">
						<span class="fa fa-envelope-o" aria-hidden="true"></span>
					</div>
					<div class="modal_body_left modal_body_left1">
						<h3 class="agileinfo_sign">Sign In </h3>
						<p>
							Sign In now, Let's start your Grocery Shopping. Don't have an account?
							<a href="{{ url('/') }}/#" data-toggle="modal" data-target="#myModal2">
								Sign Up Now</a>
						</p>
						<form action="#" method="post">
							<div class="styled-input agile-styled-input-top">
								<input type="text" placeholder="User Name" name="Name" required="">
							</div>
							<div class="styled-input">
								<input type="password" placeholder="Password" name="password" required="">
							</div>
							<input type="submit" value="Sign In">
						</form>
						<div class="clearfix"></div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			<!-- //Modal content-->
		</div>
	</div>
	<!-- //Modal1 -->
	<!-- //signin Model -->
	<!-- signup Model -->
	<!-- Modal2 -->
	<div class="modal fade" id="myModal2" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body modal-body-sub_agile">
					<div class="main-mailposi">
						<span class="fa fa-envelope-o" aria-hidden="true"></span>
					</div>
					<div class="modal_body_left modal_body_left1">
						<h3 class="agileinfo_sign">Sign Up</h3>
						<p>
							Come join the Grocery Shoppy! Let's set up your Account.
						</p>
						<form action="#" method="post">
							<div class="styled-input agile-styled-input-top">
								<input type="text" placeholder="Name" name="Name" required="">
							</div>
							<div class="styled-input">
								<input type="email" placeholder="E-mail" name="Email" required="">
							</div>
							<div class="styled-input">
								<input type="password" placeholder="Password" name="password" id="password1" required="">
							</div>
							<div class="styled-input">
								<input type="password" placeholder="Confirm Password" name="Confirm Password" id="password2" required="">
							</div>
							<input type="submit" value="Sign Up">
						</form>
						<p>
							<a href="{{ url('/') }}/#">By clicking register, I agree to your terms</a>
						</p>
					</div>
				</div>
			</div>
			<!-- //Modal content-->
		</div>
	</div>

	<br><br>
	<!-- //Modal2 -->
	<!-- //signup Model -->
	<!-- //header-bot -->
	<!-- navigation -->
	<div id="mySidenav" class="sidenav" style="z-index: 99;">
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

				
				<div class="col-xs-4" id="area_col" style="">



						@component('web.modules.area_search')
						@endcomponent


				</div>

				
				
				<div class="col-xs-6" id="search_col" style="">
							
						<div class="agileits_search">
					<form action="#" method="post">
						<input name="Search" type="search" data-toggle="modal" data-target="#product_search_modal"  id="search" placeholder="Search for products" required="" style="border-radius: 0px 0px 0px 0px; border-color: #c6c6c6; ">
						<button type="submit"  class="btn btn-default search_btn" data-toggle="modal"  data-target="#product_search_modal" aria-label="Left Align" style="width:70px;">
							<span class="fa fa-search" aria-hidden="true"> </span>
						</button>
					</form>
				</div>

					
					<br>
				</div>

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

				<div class="col-xs-1" id="cart_col">
					<div id="cart" style="width: 100px;" data-toggle="modal" data-target="#cart_modal">

						<div style="position: absolute; background-color: red; height: 17px; font-size:12px; width: 17px; border-radius: 10px; color: white; ">4</div>
						<i class="fa fa-shopping-cart" aria-hidden="true" style="font-size: 25px;"><span style="font-size: 15px;">&nbsp;₹ 123</span></i>
					</div>

				</div>
			</div>
			
			
		</div>
	</div>




@yield('body')



@component('web.modules.product_search')
@endcomponent

@component('web.modules.cart_popup')
@endcomponent

@component('web.modules.area_search_mobile')
@endcomponent



	<div class="footer-top">
		<div class="container-fluid">
			<div class="col-xs-8 agile-leftmk">
				<h2>Get your Groceries delivered from local stores</h2>
				<p>Free Delivery on your first order!</p>
				<form action="#" method="post">
					<input type="email" placeholder="E-mail" name="email" required="">
					<input type="submit" value="Subscribe">
				</form>
				<div class="newsform-w3l">
					<span class="fa fa-envelope-o" aria-hidden="true"></span>
				</div>
			</div>
			<div class="col-xs-4 w3l-rightmk">
				<img src="images/tab3.png" alt=" ">
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<!-- //newsletter -->
	<!-- footer -->
	<footer>
		<div class="container">
			<!-- footer first section -->
			<p class="footer-main">
				<span>"Grocery Shoppy"</span> Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur
				magni dolores eos qui ratione voluptatem sequi nesciunt.Sed ut perspiciatis unde omnis iste natus error sit voluptatem
				accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
				beatae vitae dicta sunt explicabo.</p>
			<!-- //footer first section -->
			<!-- footer second section -->
			<div class="w3l-grids-footer">
				<div class="col-xs-4 offer-footer">
					<div class="col-xs-4 icon-fot">
						<span class="fa fa-map-marker" aria-hidden="true"></span>
					</div>
					<div class="col-xs-8 text-form-footer">
						<h3>Track Your Order</h3>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="col-xs-4 offer-footer">
					<div class="col-xs-4 icon-fot">
						<span class="fa fa-refresh" aria-hidden="true"></span>
					</div>
					<div class="col-xs-8 text-form-footer">
						<h3>Free & Easy Returns</h3>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="col-xs-4 offer-footer">
					<div class="col-xs-4 icon-fot">
						<span class="fa fa-times" aria-hidden="true"></span>
					</div>
					<div class="col-xs-8 text-form-footer">
						<h3>Online cancellation </h3>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="clearfix"></div>
			</div>
			<!-- //footer second section -->
			<!-- footer third section -->
			<div class="footer-info w3-agileits-info">
				<!-- footer categories -->
				<div class="col-sm-5 address-right">
					<div class="col-xs-6 footer-grids">
						<h3>Categories</h3>
						<ul>
							<li>
								<a href="{{ url('/') }}/product.html">Grocery</a>
							</li>
							<li>
								<a href="{{ url('/') }}/product.html">Fruits</a>
							</li>
							<li>
								<a href="{{ url('/') }}/product.html">Soft Drinks</a>
							</li>
							<li>
								<a href="{{ url('/') }}/product2.html">Dishwashers</a>
							</li>
							<li>
								<a href="{{ url('/') }}/product.html">Biscuits & Cookies</a>
							</li>
							<li>
								<a href="{{ url('/') }}/product2.html">Baby Diapers</a>
							</li>
						</ul>
					</div>
					<div class="col-xs-6 footer-grids agile-secomk">
						<ul>
							<li>
								<a href="{{ url('/') }}/product.html">Snacks & Beverages</a>
							</li>
							<li>
								<a href="{{ url('/') }}/product.html">Bread & Bakery</a>
							</li>
							<li>
								<a href="{{ url('/') }}/product.html">Sweets</a>
							</li>
							<li>
								<a href="{{ url('/') }}/product.html">Chocolates & Biscuits</a>
							</li>
							<li>
								<a href="{{ url('/') }}/product2.html">Personal Care</a>
							</li>
							<li>
								<a href="{{ url('/') }}/product.html">Dried Fruits & Nuts</a>
							</li>
						</ul>
					</div>
					<div class="clearfix"></div>
				</div>
				<!-- //footer categories -->
				<!-- quick links -->
				<div class="col-sm-5 address-right">
					<div class="col-xs-6 footer-grids">
						<h3>Quick Links</h3>
						<ul>
							<li>
								<a href="{{ url('/') }}/about.html">About Us</a>
							</li>
							<li>
								<a href="{{ url('/') }}/contact.html">Contact Us</a>
							</li>
							<li>
								<a href="{{ url('/') }}/help.html">Help</a>
							</li>
							<li>
								<a href="{{ url('/') }}/faqs.html">Faqs</a>
							</li>
							<li>
								<a href="{{ url('/') }}/terms.html">Terms of use</a>
							</li>
							<li>
								<a href="{{ url('/') }}/privacy.html">Privacy Policy</a>
							</li>
						</ul>
					</div>
					<div class="col-xs-6 footer-grids">
						<h3>Get in Touch</h3>
						<ul>
							<li>
								<i class="fa fa-map-marker"></i> 123 Sebastian, USA.</li>
							<li>
								<i class="fa fa-mobile"></i> 333 222 3333 </li>
							<li>
								<i class="fa fa-phone"></i> +222 11 4444 </li>
							<li>
								<i class="fa fa-envelope-o"></i>
								<a href="{{ url('/') }}/mailto:example@mail.com"> mail@example.com</a>
							</li>
						</ul>
					</div>
				</div>
				<!-- //quick links -->
				<!-- social icons -->
				<div class="col-sm-2 footer-grids  w3l-socialmk">
					<h3>Follow Us on</h3>
					<div class="social">
						<ul>
							<li>
								<a class="icon fb" href="{{ url('/') }}/#">
									<i class="fa fa-facebook"></i>
								</a>
							</li>
							<li>
								<a class="icon tw" href="{{ url('/') }}/#">
									<i class="fa fa-twitter"></i>
								</a>
							</li>
							<li>
								<a class="icon gp" href="{{ url('/') }}/#">
									<i class="fa fa-google-plus"></i>
								</a>
							</li>
						</ul>
					</div>
					<div class="agileits_app-devices">
						<h5>Download the App</h5>
						<a href="{{ url('/') }}/#">
							<img src="images/1.png" alt="">
						</a>
						<a href="{{ url('/') }}/#">
							<img src="images/2.png" alt="">
						</a>
						<div class="clearfix"> </div>
					</div>
				</div>
				<!-- //social icons -->
				<div class="clearfix"></div>
			</div>
			<!-- //footer third section -->
			<!-- footer fourth section (text) -->
			<div class="agile-sometext">
				<div class="sub-some">
					<h5>Online Grocery Shopping</h5>
					<p>Order online. All your favourite products from the low price online supermarket for grocery home delivery in Delhi,
						Gurgaon, Bengaluru, Mumbai and other cities in India. Lowest prices guaranteed on Patanjali, Aashirvaad, Pampers, Maggi,
						Saffola, Huggies, Fortune, Nestle, Amul, MamyPoko Pants, Surf Excel, Ariel, Vim, Haldiram's and others.</p>
				</div>
				<div class="sub-some">
					<h5>Shop online with the best deals & offers</h5>
					<p>Now Get Upto 40% Off On Everyday Essential Products Shown On The Offer Page. The range includes Grocery, Personal Care,
						Baby Care, Pet Supplies, Healthcare and Other Daily Need Products. Discount May Vary From Product To Product.</p>
				</div>
				<!-- brands -->
				<div class="sub-some">
					<h5>Popular Brands</h5>
					<ul>
						<li>
							<a href="{{ url('/') }}/product.html">Aashirvaad</a>
						</li>
						<li>
							<a href="{{ url('/') }}/product.html">Amul</a>
						</li>
						<li>
							<a href="{{ url('/') }}/product.html">Bingo</a>
						</li>
						<li>
							<a href="{{ url('/') }}/product.html">Boost</a>
						</li>
						<li>
							<a href="{{ url('/') }}/product.html">Durex</a>
						</li>
						<li>
							<a href="{{ url('/') }}/product.html"> Maggi</a>
						</li>
						<li>
							<a href="{{ url('/') }}/product.html">Glucon-D</a>
						</li>
						<li>
							<a href="{{ url('/') }}/product.html">Horlicks</a>
						</li>
						<li>
							<a href="{{ url('/') }}/product2.html">Head & Shoulders</a>
						</li>
						<li>
							<a href="{{ url('/') }}/product2.html">Dove</a>
						</li>
						<li>
							<a href="{{ url('/') }}/product2.html">Dettol</a>
						</li>
						<li>
							<a href="{{ url('/') }}/product2.html">Dabur</a>
						</li>
						<li>
							<a href="{{ url('/') }}/product2.html">Colgate</a>
						</li>
						<li>
							<a href="{{ url('/') }}/product.html">Coca-Cola</a>
						</li>
						<li>
							<a href="{{ url('/') }}/product2.html">Closeup</a>
						</li>
						<li>
							<a href="{{ url('/') }}/product2.html"> Cinthol</a>
						</li>
						<li>
							<a href="{{ url('/') }}/product.html">Cadbury</a>
						</li>
						<li>
							<a href="{{ url('/') }}/product.html">Bru</a>
						</li>
						<li>
							<a href="{{ url('/') }}/product.html">Bournvita</a>
						</li>
						<li>
							<a href="{{ url('/') }}/product.html">Tang</a>
						</li>
						<li>
							<a href="{{ url('/') }}/product.html">Pears</a>
						</li>
						<li>
							<a href="{{ url('/') }}/product.html">Oreo</a>
						</li>
						<li>
							<a href="{{ url('/') }}/product.html"> Taj Mahal</a>
						</li>
						<li>
							<a href="{{ url('/') }}/product.html">Sprite</a>
						</li>
						<li>
							<a href="{{ url('/') }}/product.html">Thums Up</a>
						</li>
						<li>
							<a href="{{ url('/') }}/product2.html">Fair & Lovely</a>
						</li>
						<li>
							<a href="{{ url('/') }}/product2.html">Lakme</a>
						</li>
						<li>
							<a href="{{ url('/') }}/product.html">Tata</a>
						</li>
						<li>
							<a href="{{ url('/') }}/product2.html">Sunfeast</a>
						</li>
						<li>
							<a href="{{ url('/') }}/product2.html">Sunsilk</a>
						</li>
						<li>
							<a href="{{ url('/') }}/product.html">Patanjali</a>
						</li>
						<li>
							<a href="{{ url('/') }}/product.html">MTR</a>
						</li>
						<li>
							<a href="{{ url('/') }}/product.html">Kissan</a>
						</li>
						<li>
							<a href="{{ url('/') }}/product2.html"> Lipton</a>
						</li>
					</ul>
				</div>
				<!-- //brands -->
				<!-- payment -->
				<div class="sub-some child-momu">
					<h5>Payment Method</h5>
					<ul>
						<li>
							<img src="images/pay2.png" alt="">
						</li>
						<li>
							<img src="images/pay5.png" alt="">
						</li>
						<li>
							<img src="images/pay1.png" alt="">
						</li>
						<li>
							<img src="images/pay4.png" alt="">
						</li>
						<li>
							<img src="images/pay6.png" alt="">
						</li>
						<li>
							<img src="images/pay3.png" alt="">
						</li>
						<li>
							<img src="images/pay7.png" alt="">
						</li>
						<li>
							<img src="images/pay8.png" alt="">
						</li>
						<li>
							<img src="images/pay9.png" alt="">
						</li>
					</ul>
				</div>
				<!-- //payment -->
			</div>
			<!-- //footer fourth section (text) -->
		</div>
	</footer>
	<!-- //footer -->
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
