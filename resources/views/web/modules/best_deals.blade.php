
<style type="text/css">

            .product-carousal .owl-prev {
            	top:100px;
                left: 0;
                 position: absolute;
                height: 100px;
                color: inherit;
                background: none;
                border: none;
                z-index: 100;
            }

            .product-carousal .owl-next {
            	top:100px;
                right: 0;
                 position: absolute;
                height: 100px;
                color: inherit;
                background: none;
                border: none;
                z-index: 100;
            }

            .product-carousal .owl-prev i {
                    font-size: 2.5rem;
                    color: #cecece;
                }
                
                .product-carousal .owl-next i {
                    font-size: 2.5rem;
                    color: #cecece;
                }

               .product-carousal .item {
                	height: 320px;
                	width: 	250px;
                }
				.product_card{
					text-align: 	center;
								width: 	250px;
							}

				.men-pro-item .men-thumb-item {
					padding-left: 	50px;
					
				}

				.men-pro-item .men-thumb-item img{
					height: 150px;
					width: 	150px;
					
				}			
				.carousel .item{
    					height: 400px;
    				}

    			.item{
    				height: 200px;
    			}

    				@media screen and (max-width: 450px) {
    					.carousel .item{
	    					height: 150px;
	    				}
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

<h3 class="tittle-w3l" style="padding-top:50px;">Best deals of the day
				<span class="heading-style">
					<i></i>
					<i></i>
					<i></i>
				</span>
			</h3>

<div class="owl-carousel product-carousal owl-theme">

											   
											      <div class="item">
													<div class="product_card">
														<div class="men-pro-item simpleCart_shelfItem">
															<div class="men-thumb-item">
																<img src="images/m1.jpg" alt="" >
																<div class="men-cart-pro">
																	<div class="inner-men-cart-pro">
																		<a href="single.html" class="link-product-add-cart">Quick View</a>
																	</div>
																</div>
																<span class="product-new-top">New</span>
															</div>
															<div class="item-info-product ">
																<h4>
																	<a href="single.html">Almonds 2, 100g</a>
																</h4>
																<div class="info-product-price">
																	<span class="item_price">$149.00</span>
																	<del>$280.00</del>
																</div>


																<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out" style="text-align: center">
																	<div class="product_fields">
																		
																			<input type="hidden" name="cmd" value="_cart" />
																			<input type="hidden" name="add" value="1" />
																			<input type="hidden" name="business" value=" " />
																			<input type="hidden" name="item_name" value="Almonds, 100g" />
																			<input type="hidden" name="amount" value="149.00" />
																			<input type="hidden" name="discount_amount" value="1.00" />
																			<input type="hidden" name="currency_code" value="USD" />
																			<input type="hidden" name="return" value=" " />
																			<input type="hidden" name="cancel_return" value=" " />

																			<div class="addtocart_btn">
																				<input type="submit" name="submit" value="Add to cart" class="button" />
																			</div>
																			
																		
																	</div>
																</div>

															</div>
														</div>
												</div>	
											</div>
										 

</div>
   



											<script type="text/javascript">
	
	 var owl = $('.product-carousal');
	owl.owlCarousel({
	    items:4,
	    loop:true,
	    margin:10,
	    autoplay:false,
	    autoplayTimeout:5000,
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







