<!-- cart modal -->

<!-- Trigger the modal with a button -->

<style type="text/css">


					#cart_modal .modal-dialog {
						  width: 450px;
						  left:68%;
						  top:70px;
						  margin: 0;
						  padding: 0;
					}

					#cart_modal .modal-title{
						color: white;
					}

					#cart_modal .modal-header{
						background-color: black;
					}


       				.particulars_p{

       					font-size: 12px;
       					color: #757677;
       				}

       				.particular_card{
       					padding-top: 10px;
       					padding-bottom: 10px;
       				}

       				.particular_card .row{
       					padding-left: 20px;
       				}

       				.offer_tag{

       					background-color: #adffb8;
       					color:#11681d;
       					width: 80px;
       					border-style: solid;
       					border-width: 1px;
       					border-color:#11681d;
       					border-radius: 5px;
       					font-size: 12px;

       				}

       				.i_c_btn {

       					border-radius: 	10px;
       					width: 	20px;
       					height: 20px;
       					background-color: 	#ff6600;
       					color:white;
       					text-align: 	center;
       					line-height: 	-50px;
       				}

       				.i_c_btn span{
       					position: 	relative;	
       					top:-3px;
       				}


       				.i_c_btn:hover {
       					background-color: 	#fcaf7b;
       					color: 	black;
       				}

       				.orange {
       					color: 	#e26500;
       				}

       				.checkout_btn{

       					height: 	50px;
       					width:100%;
       					padding-left:	10%;
       					background-color: 	#d84611;
       					color:white;
       					border-radius: 	5px;

       				}

       				.checkout_btn .row{
       					width:100%;
       					position: 	relative;	
       					left:-160px;
       					top:10px;
       				}

       				.checkout_btn .proceed_with_price{
       					position: relative;	
       					float:right;
       					top:-10px;
       				}



       				.checkout_btn:hover{

       					height: 	50px;
       					width:100%;
       					padding-left:	10%;
       					background-color: 	#bf3200;
       					color:white;

       				}

       				@media screen and (max-width: 450px) {

       					#cart_modal .modal-dialog {
						  width: 100%;
						  left:0%;
						  top:0px;
						  margin: 0;
						  padding: 0;
							}

							#cart_modal .modal-title{
								color: white;
							}

							#cart_modal .modal-header{
								background-color: black;
							}

		       					.particulars_p{

		       					font-size: 12px;
		       					color: #757677;
       				}

       				.particular_card{
       					padding-top: 10px;
       					padding-bottom: 10px;
       				}

       				.particular_card .row{
       					padding-left: 10px;
       				}

       				.offer_tag{

       					background-color: #adffb8;
       					color:#11681d;
       					width: 80px;
       					border-style: solid;
       					border-width: 1px;
       					border-color:#11681d;
       					border-radius: 5px;
       					font-size: 12px;

       				}

       				.i_c_btn {

       					border-radius: 	10px;
       					width: 	20px;
       					height: 20px;
       					background-color: 	#ff6600;
       					color:white;
       					text-align: 	center;
       					line-height: 	-50px;
       				}

       				.i_c_btn span{
       					position: 	relative;	
       					top:-3px;
       				}


       				.i_c_btn:hover {
       					background-color: 	#fcaf7b;
       					color: 	black;
       				}

       				.orange {
       					color: 	#e26500;
       				}

       				.checkout_btn{

       					height: 	50px;
       					width:100%;
       					padding-left:	10%;
       					background-color: 	#d84611;
       					color:white;
       					border-radius: 	5px;

       				}

       				.checkout_btn .row{
       					width:100%;
       					position: 	relative;	
       					left:-100px;
       					top:10px;
       				}

       				.checkout_btn .proceed_with_price{
       					position: relative;	
       					float:right;
       					top:-10px;
       				}



       				.checkout_btn:hover{

       					height: 	50px;
       					width:100%;
       					padding-left:	10%;
       					background-color: 	#bf3200;
       					color:white;

       				}


       				}

       				
       			</style>


<!-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#cart_modal">Open Modal</button> -->

<!-- Modal -->
<div id="cart_modal" class="modal" role="dialog" >
  <div class="modal-dialog" >

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">My Cart <span style='font-size: 12px;'>(1 item)</span></h4>
      </div>
      <div class="modal-body" style="background-color: #e2e2e2; height: 430px; overflow-y: 	scroll;	overflow-x: hidden;	">


       			<div class="row particular_card" style="background-color:white; position: relative; top:-20px;">
       				<div class="row">
       					<div class="col-xs-9">Sub total </div>
       					<div class="col-xs-3">₹165</div>
       					</div>
       					<div class="row">
       					<div class="col-xs-9">Deivery charges <span class="orange" style=" border-radius: 	10px; border-style: solid; border-width: 1px; width: 10px; border-color:#e26500; ">?</span></div>
       					<div class="col-xs-3 orange">₹165</div>
       					</div>
       				<hr>	
       				<div class="row">
       					<div class="col-xs-9">Total savings</div>
       					<div class="col-xs-3 orange">₹165(2%)</div>
       					</div>

       			</div>


       <div class="row particular_card" style="background-color:white;">
       		<div class="col-xs-2">
       			<img src="images/s6.jpg" alt=" " class="img-responsive">
       		</div>
       		<div class="col-xs-10">
       			<div  class="offer_tag" style=""> 60% OFF</div>
       			Some product name
       			<div class="row">
       				<div class="col-xs-1">
       					<div class="i_c_btn">
       						<span>-</span>
       					</div>
       				</div>
       				<div class="col-xs-1">
       					<span class="particulars_p">1</span>
       				</div>
       				<div class="col-xs-1">
       					<div class="i_c_btn">
       						<span>+</span>
       					</div>
       				</div>
       				<div class="col-xs-1">
       					<span class="particulars_p">X</span>
       				</div>
       				<div class="col-xs-2">
       					<span class="particulars_p">₹165</span>
       				</div>
       				<div class="col-xs-2">
       					<span class="particulars_p"><strike>₹165</strike></span>
       				</div>
       				<div class="col-xs-1">
       					<span class="particulars_p"></span>
       				</div>
       				<div class="col-xs-2">
       					<span class="particulars_p" style="font-weight: 600; font-size: 15px;">₹165</span>
       				</div>
       			</div>
       		</div>
       </div>
<br>
       
       <div class="row particular_card" style="background-color:white;">
       		<div class="col-xs-2">
       			<img src="images/s6.jpg" alt=" " class="img-responsive">
       		</div>
       		<div class="col-xs-10">
       			<div  class="offer_tag" style=""> 60% OFF</div>
       			Some product name
       			<div class="row">
       				<div class="col-xs-1">
       					<div class="i_c_btn">
       						<span>-</span>
       					</div>
       				</div>
       				<div class="col-xs-1">
       					<span class="particulars_p">1</span>
       				</div>
       				<div class="col-xs-1">
       					<div class="i_c_btn">
       						<span>+</span>
       					</div>
       				</div>
       				<div class="col-xs-1">
       					<span class="particulars_p">X</span>
       				</div>
       				<div class="col-xs-2">
       					<span class="particulars_p">₹165</span>
       				</div>
       				<div class="col-xs-2">
       					<span class="particulars_p"><strike>₹165</strike></span>
       				</div>
       				<div class="col-xs-1">
       					<span class="particulars_p"></span>
       				</div>
       				<div class="col-xs-2">
       					<span class="particulars_p" style="font-weight: 600; font-size: 15px;">₹165</span>
       				</div>
       			</div>
       		</div>
       </div>
       <br>
              <div class="row particular_card" style="background-color:white;">
       		<div class="col-xs-2">
       			<img src="images/s6.jpg" alt=" " class="img-responsive">
       		</div>
       		<div class="col-xs-10">
       			<div  class="offer_tag" style=""> 60% OFF</div>
       			Some product name
       			<div class="row">
       				<div class="col-xs-1">
       					<div class="i_c_btn">
       						<span>-</span>
       					</div>
       				</div>
       				<div class="col-xs-1">
       					<span class="particulars_p">1</span>
       				</div>
       				<div class="col-xs-1">
       					<div class="i_c_btn">
       						<span>+</span>
       					</div>
       				</div>
       				<div class="col-xs-1">
       					<span class="particulars_p">X</span>
       				</div>
       				<div class="col-xs-2">
       					<span class="particulars_p">₹165</span>
       				</div>
       				<div class="col-xs-2">
       					<span class="particulars_p"><strike>₹165</strike></span>
       				</div>
       				<div class="col-xs-1">
       					<span class="particulars_p"></span>
       				</div>
       				<div class="col-xs-2">
       					<span class="particulars_p" style="font-weight: 600; font-size: 15px;">₹165</span>
       				</div>
       			</div>
       		</div>
       </div>
      </div>
      <div class="modal-footer">
        <div class="checkout_btn"> 
        	<div class="row">
        			<div class="col-xs-10">	<span>Proceed to checkout</span>	</div>
        			<div class="col-xs-2">		</div>
        	</div>
        	<span class="proceed_with_price" >₹195 <i class="fa fa-angle-right" aria-hidden="true" style="	font-size: 20px; padding-left: 	25px; padding-right: 10px;"></i>
</span>
        	
        </div>
      </div>
    </div>

  </div>
</div>

<!-- cart modal -->


	<script type="text/javascript">
		
		$(function(){

			$( "#product_search_modal" ).on('shown.bs.modal', function(){
			    $('#search_popup').focus();
			});

		});
	</script>
	<!-- //navigation -->
	<!-- banner -->