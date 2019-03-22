@extends('web.parent')

@section('body')


<style type="text/css">




/* Breadcrumbs from http://bootsnipp.com/snippets/featured/triangle-breadcrumbs-arrows */
.btn-breadcrumb .btn:not(:last-child):after {
  content: " ";
  display: block;
  width: 0;
  height: 0;
  border-top: 17px solid transparent;
  border-bottom: 17px solid transparent;
  border-left: 10px solid white;
  position: absolute;
  top: 50%;
  margin-top: -17px;
  left: 100%;
  z-index: 3;
}
.btn-breadcrumb .btn:not(:last-child):before {
  content: " ";
  display: block;
  width: 0;
  height: 0;
  border-top: 17px solid transparent;
  border-bottom: 17px solid transparent;
  border-left: 10px solid rgb(173, 173, 173);
  position: absolute;
  top: 50%;
  margin-top: -17px;
  margin-left: 1px;
  left: 100%;
  z-index: 3;
}

.btn-breadcrumb .btn {
  padding:6px 12px 6px 24px;
}
.btn-breadcrumb .btn:first-child {
  padding:6px 6px 6px 10px;
}
.btn-breadcrumb .btn:last-child {
  padding:6px 18px 6px 24px;
}

/** Default button **/
.btn-breadcrumb .btn.btn-default:not(:last-child):after {
  border-left: 10px solid #fff;
}
.btn-breadcrumb .btn.btn-default:not(:last-child):before {
  border-left: 10px solid #ccc;
}
.btn-breadcrumb .btn.btn-default:hover:not(:last-child):after {
  border-left: 10px solid #ebebeb;
}
.btn-breadcrumb .btn.btn-default:hover:not(:last-child):before {
  border-left: 10px solid #adadad;
}

/* The responsive part */

.btn-breadcrumb > * > div {
    /* With less: .text-overflow(); */
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;    
}

.btn-breadcrumb > *:nth-child(n+2) {
  display:none;
}

/* === For phones =================================== */
@media (max-width: 767px) {
    .btn-breadcrumb > *:nth-last-child(-n+2) {
        display:block;
    } 
    .btn-breadcrumb > * div {
    	font-weight: 600;
        max-width: 600px;
        width: 100%;
    }
}

/* === For tablets ================================== */
@media (min-width: 768px) and (max-width:991px) {
    .btn-breadcrumb > *:nth-last-child(-n+4) {
        display:block;
    } 
    .btn-breadcrumb > * div {
        max-width: 100px;
    }
}

/* === For desktops ================================== */
@media (min-width: 992px) {
    .btn-breadcrumb > *:nth-last-child(-n+6) {
        display:block;
    } 
    .btn-breadcrumb > * div {
        max-width: 170px;
    }
}





	
	.name_cat{
		position: fixed;
		display: inline;
		background-color: white;
		box-shadow: 0px 3px 3px #ededed;
		border-top-style: solid;
	  border-right-style: none;
	  border-bottom-style: none;
	  border-left-style: none;
	  border-width: 1px;
  border-color: #c6c6c6;
		width: 100%;
		z-index: 3;
	}

	.name_cat div{
		display: inline-block;

		padding: 15px;
		color: #4f4f4f;
		font-size: 14px;

	}

	.sub_cat_mobile{

			top:105px;
			position: 	fixed;
			width: 	100%;
			z-index: 	3;
			background-color: 	#f7f7f7;
	}

	.sub_cat_mobile .fixed_size div{
		display: inline-block;
		padding: 10px;
		color: #ff5a02;
		font-size: 14px;
		border-width: 	1px;
		border-style: 	solid;
		border-color: 	#ff5a02;
		background-color: white;
		border-radius: 	30px;

	}

	.name_cat div:hover{
		background-color: #f7f7f7;
	}

	.name_cat .active{
		background-color: #f7f7f7;
	}

	.contain{
		padding-left: 50px;
		width: 98%;
	}



	.sub_cat {
		border-top-style: solid;
	  border-right-style: solid;
	  border-bottom-style: none;
	  border-left-style: solid;
	  border-width: 1px;
  border-color: #c6c6c6;


		border-width: 1px;
		 border-style: solid;
		 border-color: #c6c6c6;
		 width: 100%;
	}

	
	.sub_cat tr td{
		border-top-style: none;
	  border-right-style: none;
	  border-bottom-style: solid;
	  border-left-style: none;
	  border-width: 1px;
  border-color: #c6c6c6;

  		padding:15px;
		
		color: #4f4f4f;




	}

	.sub_cat tr td a{
		
		color: #4f4f4f;
	}

	.sub_cat tr td i{
		
		color: #ce4800;
	}

	.sub_cat tr td:hover{
		background-color: #f7f7f7;
	}


	.addtocart_btn button{
						background-color: #ff5816; color:white; border-radius: 10px; width: 30px; height:30px; border-style: none;
					}

					.addtocart_btn button p{
						font-size: 26px; position: relative; top:-10px; color: white; font-weight: 200;
					}

					.addtocart_btn .quantity{
						padding-left:10px;
						color: black;
					}

					.loader {
					  border: 4px solid #f3f3f3;
					  border-radius: 50%;
					  border-top: 4px solid #3498db;
					  width: 30px;
					  height: 30px;
					  -webkit-animation: spin 2s linear infinite; /* Safari */
					  animation: spin 2s linear infinite;
					}

					/* Safari */
					@-webkit-keyframes spin {
					  0% { -webkit-transform: rotate(0deg); }
					  100% { -webkit-transform: rotate(360deg); }
					}

					@keyframes spin {
					  0% { transform: rotate(0deg); }
					  100% { transform: rotate(360deg); }
					}



</style>

<br>
<div class="container name_cat" style="display: block;">
	
	
</div>



    
 <div class="row sub_cat_breadcrumb" style="position: fixed; background-color: white; z-index: 3; width: 100%;">
        <div id="bc1" class="btn-group btn-breadcrumb"  style="width: 100%; border-style: solid; border-color: #c6c6c6; border-width: 1px;border-radius: 3px; position: ">
            <a href="#" class="btn btn-default"><i class="fa fa-home"></i></a>
            <a href="#" class="btn btn-default"><div>Foods and beverages.</div></a>
        </div>
	</div>

<div class="container sub_cat_mobile" style="overflow-x: scroll;">



	<div class="fixed_size row" style="  width: 1000px; height: 50px; >
		<a href="">
			<div>Sub category</div>
		</a>

		<a href="">
			<div>Sub category</div>
		</a>

		<a href="">
			<div>Sub category</div>
		</a>

		<a href="">
			<div>Sub category</div>
		</a>

		<a href="">
			<div>Sub category</div>
		</a>

		<a href="">
			<div>Sub category</div>
		</a>

	</div>
</div>


<br><br><br>






	<!-- //special offers -->
	<!-- newsletter -->


						<div class="contain row">
							<div class="col-lg-3 ">
								
								
									<table class="sub_cat" style="">
										<tr>
											<td> <h4  style="font-size: 15px; padding-bottom: 30px; padding-bottom: 30px; ">Food products and beverages</h4></td>
										</tr>
										<tr>
											<td> <a> <i class="fa fa-angle-right" aria-hidden="true"></i>
 Some </a></td>
										</tr>
										<tr>
											<td> <a> <i class="fa fa-angle-right" aria-hidden="true"></i>
 Cat </a></td>
										</tr>
										<tr>
											<td> <a> <i class="fa fa-angle-right" aria-hidden="true"></i>
 Other </a></td>
										</tr>
										<tr>
											<td> <a> <i class="fa fa-angle-right" aria-hidden="true"></i>
 Cat </a></td>
										</tr>
									</table>
								</div>


<h3 class="heading-tittle">Oils</h3>
							<div class="col-lg-9" id="product_div">
								

							
					<div class="clearfix"></div>

							</div>
						</div>


<script type="text/javascript">
	
	 

    //the method below loads the top categories
    $(function(){

        var token = "{{csrf_token()}}";



        function loadCategories(){

                        $.ajax({
                            type: 'GET',
                            dataType: 'json',
                            url: "{{ url('/') }}/api/gro_category",
                            cache: false
                            }).done(function (data) {

                                       console.log(data);

                                       var array = data.data.data;

                                       //var array = obj.data;
                                        var catHtml = getCatHtml(array);

                                        $('.name_cat').html(catHtml);

                                            var owl = $('.owl-carousel');
                                            owl.owlCarousel({
                                                items:4,
                                                loop:true,
                                                margin:10,
                                                autoplay:false,
                                                autoplayTimeout:100000,
                                                autoWidth:true,
                                                autoplayHoverPause:true,
                                            nav: true,
                                            navText: [
                                                '<i class="fa fa-angle-left" aria-hidden="true"></i>',
                                                '<i class="fa fa-angle-right" aria-hidden="true"></i>'
                                            ],
                                            dots: false
                                            });

                            }).fail(

                            function(data, textStatus, xhr) {
                             //This shows status code eg. 403
                             console.error("error", data.status);
                        });
        }

        //the method below loads subcategories for mobile


        //the method below prepares the category html from array
        function getCatHtml(obj){

            var finalHtml = "";

            for(var i=0;i<obj.length;i++){
                var resultString = "";
                var categoryName = obj[i].title;
                console.log(categoryName);

                var link = "{{ url('/') }}/";


                if(i==0){
                	resultString+='       <a href="'+link+'">'+"\n";
                  resultString+='               <div class="active">'+categoryName+'</div>'+"\n";
                  resultString+='        </a>'+"\n";
                }else{
                	resultString+='       <a href="'+link+'">'+"\n";
                  resultString+='               <div>'+categoryName+'</div>'+"\n";
                  resultString+='        </a>'+"\n";
                }
                 
                  
                 

                  finalHtml = finalHtml+resultString;

            }

            return finalHtml;
        } 

        loadCategories();


        $(window).on('resize', function(){
            var win = $(this); //this = window
            if (win.width() <= 500) {
	             setTopCatMobile();
	          }else{
	         	setTopCatLaptop();
	          }
	      })
        	var win = $(this);
        if (win.width() <= 500) {
	             setTopCatMobile();
	          }else{
	         	setTopCatLaptop();
	        }


        //the method below sets the top cat as mobile view
        function setTopCatMobile(){
        	$(".name_cat").attr('style', "position:absolute; top:0px; left:0px;width:0px; height:0px; visibility:hidden;");

        	$(".sub_cat_breadcrumb").attr('style', "position:fixed; width:100%; visibility:visible; z-index:3; background-color:white;");

        	$(".sub_cat_mobile").attr('style', "position:fixed; top:105px;  left:0px;width:100%;  overflow-x: scroll; visibility:visible;");

        	$(".sub_cat").attr('style', "position:absolute; top:0px; left:0px;width:0px; height:0px; visibility:hidden;");


        }

        //the method below sets the top cat as laptop view
        function setTopCatLaptop(){
        	$(".name_cat").attr('style',"width:100%; height:auto; visibility:visible;");
        	 $(".sub_cat_breadcrumb").attr('style', "position:absolute; top:0px; left:0px;width:0px; height:0px; visibility:hidden;");
        	
        	$(".sub_cat_mobile").attr('style', "position:absolute; top:0px; left:0px;width:0px; height:0px; visibility:hidden;");

        	$(".sub_cat").attr('style', "position:relative; visibility:visible;");
        	
        }



    });


    // $('.play').on('click',function(){
    //     owl.trigger('play.owl.autoplay',[1000])
    // })
    // $('.stop').on('click',function(){
    //     owl.trigger('stop.owl.autoplay')
    // })
</script>


											<script type="text/javascript">


	$(function(){


		$('.addtocart_btn').on('click', '.button', function(){

			console.log("Clicked !");
			changeAddtocartToIncrementDecrement($(this).parent());
			//addLoaderToElement($(this).parent());
		});

		 $('.addtocart_btn').on('click','.increment',function(){
			  	console.log('increment');
			  	incrementCartValue($(this).parent().parent().parent());

		});

		 $('.addtocart_btn').on('click','.decrement',function(){
			  	console.log('decrement');
			  	decrementCartValue($(this).parent().parent().parent());

		});

		//  localStorage.setItem('user', JSON.stringify(user));

		// Then to retrieve it from the store and convert to an object again:

		// var user = JSON.parse(localStorage.getItem('user'));

		// If we need to delete all entries of the store we can simply do:

		// localStorage.clear();


		 //the method below adds a loader to element
		 function addLoaderToElement(element){

		 	element.html('<div class="loader" style="position:relative; left:80px;"></div>');
		 }



		




		//the method below increments the cart value
		function incrementCartValue(parent){

			var currentCartAmt = parent.find('.quantity').attr('quantity');

			currentCartAmt = parseInt(currentCartAmt);
			currentCartAmt = currentCartAmt+1;
			parent.find('.quantity').attr('quantity',currentCartAmt);
			parent.find('.quantity').html(currentCartAmt);

		}

		//the method below decremebts the cart value
		function decrementCartValue(parent){

			var currentCartAmt = parent.find('.quantity').attr('quantity');

			currentCartAmt = parseInt(currentCartAmt);
			currentCartAmt = currentCartAmt-1;

			if(currentCartAmt==0){
				changeICtoATC(parent);

			}else{
				parent.find('.quantity').attr('quantity',currentCartAmt);
				parent.find('.quantity').html(currentCartAmt);
			}
			

		}


		//the method below changes the button to increment decrement button
		function changeAddtocartToIncrementDecrement(parent){

			var resultString = "";

			  resultString+='<div class="row">'+"\n";
			  resultString+='				<div class="col-xs-2">'+"\n";
			  resultString+='				</div>'+"\n";
			  resultString+='				<div class="col-xs-2">'+"\n";
			  resultString+='					<button class="decrement">'+"\n";
			  resultString+='						<p >-</p>'+"\n";
			  resultString+='					</button>'+"\n";
			  resultString+='				</div>'+"\n";
			  resultString+='				<div class="col-xs-2">'+"\n";
			  resultString+='					<p class="quantity" quantity="1">1</p>'+"\n";
			  resultString+='				</div>'+"\n";
			  resultString+='				<div class="col-xs-2">'+"\n";
			  resultString+='					<button class="increment">+</button>'+"\n";
			  resultString+='				</div>'+"\n";
			  resultString+='				<div class="col-xs-4">'+"\n";
			  resultString+='				</div>'+"\n";

			  parent.html("");
			  parent.html(resultString);

			 




		}

		//the method below changes increment decrement button to add to cart button

		function changeICtoATC(parent){

			  var resultString = "";

			  resultString+='<input type="submit" name="submit" value="Add to cart" class="button" />'+"\n";

			  parent.html("");
			  parent.html(resultString);
		}









		//the method below shows the product list
		function showProductList(){


			$.ajax({
                            type: 'POST',
                            dataType: 'json',
                            url: "{{ url('/') }}/api/gro_product",
                            data:{id:2, token: "{{csrf_token()}}" },
                            cache: false
                            }).done(function (data) {

                                       console.log(data);

                                       var array = data.data.data;

                                       console.log(array);

                                        var prodHtml = getHtmlForProductList(array);

                                        $('#product_div').html(prodHtml);

                                           

                            }).fail(

                            function(data, textStatus, xhr) {
                             //This shows status code eg. 403
                             console.error("error", data.status);
                        });



		}

		showProductList();


		//the method below gets the html for products list
		function getHtmlForProductList(array){


				var finalHtml = "";

				 var z = 1
            for(var i=0;i<array.length;i++){
                var resultString = "";

               

                

                if(z==1){
                	 resultString+='<div class="row product-sec1" >'+"\n";
  resultString+='						'+"\n";

                }


  



                  resultString+='<div class="col-lg-3 product-men">'+"\n";
				  resultString+='							<div class="men-pro-item simpleCart_shelfItem">'+"\n";
				  resultString+='								<div class="men-thumb-item">'+"\n";
				  resultString+='									<img src="{{ url("/")}}/'+array[i].pic+'" alt="" style="width:100%; height:100%;">'+"\n";
				  resultString+='									<div class="men-cart-pro">'+"\n";
				  resultString+='										<div class="inner-men-cart-pro">'+"\n";
				  resultString+='											<a href="{{ url("/") }}/single.html" class="link-product-add-cart">Quick View</a>'+"\n";
				  resultString+='										</div>'+"\n";
				  resultString+='									</div>'+"\n";
				  resultString+='									<span class="product-new-top">New</span>'+"\n";
				  resultString+=''+"\n";
				  resultString+='								</div>'+"\n";
				  resultString+='								<div class="item-info-product ">'+"\n";
				  resultString+='									<h4>'+"\n";
				  resultString+='										<a href="{{ url("/") }}/single.html">'+array[i].title+'</a>'+"\n";
				  resultString+='									</h4>'+"\n";
				  resultString+='									<div class="info-product-price">'+"\n";
				  resultString+='										<span class="item_price">'+array[i].price+'</span>'+"\n";
				  resultString+='										<del>$500.00</del>'+"\n";
				  resultString+='									</div> '+"\n";
				  resultString+='									<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">'+"\n";
				  resultString+='										<form action="#" method="post">'+"\n";
				  resultString+='											<fieldset>'+"\n";
				  resultString+='												<input type="hidden" name="cmd" value="_cart" />'+"\n";
				  resultString+='												<input type="hidden" name="add" value="1" />'+"\n";
				  resultString+='												<input type="hidden" name="business" value=" " />'+"\n";
				  resultString+='												<input type="hidden" name="item_name" value="Fortune Oil, 5L" />'+"\n";
				  resultString+='												<input type="hidden" name="amount" value="399.99" />'+"\n";
				  resultString+='												<input type="hidden" name="discount_amount" value="1.00" />'+"\n";
				  resultString+='												<input type="hidden" name="currency_code" value="USD" />'+"\n";
				  resultString+='												<input type="hidden" name="return" value=" " />'+"\n";
				  resultString+='												<input type="hidden" name="cancel_return" value=" " />'+"\n";
				  resultString+='												<input type="submit" name="submit" value="Add to cart" class="button" />'+"\n";
				  resultString+='											</fieldset>'+"\n";
				  resultString+='										</form>'+"\n";
				  resultString+='									</div>'+"\n";
				  resultString+=''+"\n";
				  resultString+='								</div>'+"\n";
				  resultString+='							</div>'+"\n";
				  resultString+='						</div>'+"\n";

				 
				  if(z==4){
				  	resultString+='									'+"\n";
  resultString+='						'+"\n";
  resultString+='					</div>'+"\n";
				  }


				 

                if(z==4){
                	z = 1;


                }else{
                	z++;
                }



				  finalHtml = finalHtml+resultString;


            }

            return finalHtml;


		}

	});											
	
	 var owl = $('.product-carousal');
	owl.owlCarousel({
	    items:4,
	    loop:true,
	    margin:10,
	    autoplay:false,
	    autoplayTimeout:1000,
	    autoWidth:true,
	    autoplayHoverPause:true,
    nav: true,
    navText: [
        '<i class="fa fa-angle-left" aria-hidden="true"></i>',
        '<i class="fa fa-angle-right" aria-hidden="true"></i>'
    ],
    dots: false
	});
	// $('.play').on('click',function(){
	//     owl.trigger('play.owl.autoplay',[1000])
	// })
	// $('.stop').on('click',function(){
	//     owl.trigger('stop.owl.autoplay')
	// })
</script>


  @endsection
