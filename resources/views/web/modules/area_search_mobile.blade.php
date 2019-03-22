
	<!-- Trigger the modal with a button -->
<!-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button> -->

<!-- Modal for mobile search-->
<div id="myModal" class="modal" role="dialog">
  <div class="modal-dialog"  id="location_modal-dialog">

    <!-- Modal content-->
    <div class="modal-content" id="location_modal-content"  >
      <div class="modal-header" style="background-color: black; color:white;">
        <span type="button" class="close" data-dismiss="modal" style="float: left; "><i class="fa fa-chevron-left" aria-hidden="true" style="padding-top: 5px;"></i>
</span>
        <h4 class="modal-title" style="padding-left: 30%;"> Select your city</h4>
      </div>


      <div class="searchbar" style=" background-color: white; width: 100%; left:10%; border-style: solid; border-width: 1px; border-color: #cecece;">


        	 	<i class="fa fa-search" aria-hidden="true" style="position: relative; left:20px; top :0px; width:100px;"></i>

	          <input class="search_input" type="text" name="" placeholder="Type your area, eg - sarai, tilkamanjhi etc" style="position:relative; border-style: none; width: 200px; height: 50px;
	          font-size: 15px;left:-50px; top:0px;">
	          
	        </div>
      <div class="modal-body">

      	<div class="row" style="position: relative; top:0px; left: 20px;">
        		<div class="col-xs-2"> 
        			<img src="{{ url('/') }}/images/monuments/2.jpg" style="height: 50px; border-radius: 40px;">
        			<span style="font-size: 10px;"> Tilkamanjhi</span>
        			 
        		</div>
        		<div class="col-xs-2"> 
        			<img src="{{ url('/') }}/images/monuments/3.jpg" style="height: 50px; border-radius: 40px;">
        			<span style="font-size: 10px;"> Sarai</span> 
        			
        		</div>
        		<div class="col-xs-2"> 
        			<img src="{{ url('/') }}/images/monuments/4.jpg" style="height: 50px; border-radius: 40px;">
        			<span style="font-size: 10px;"> Barehpura</span> 
        			
        		</div>
        		<div class="col-xs-2"> 
        			<img src="{{ url('/') }}/images/monuments/5.jpg" style="height: 50px; border-radius: 40px;">
        			<span style="font-size: 10px;"> Tatarpur</span> 
        			
        		</div>
        		<div class="col-xs-2"> 
        			<img src="{{ url('/') }}/images/monuments/6.jpg" style="height: 50px; border-radius: 40px;">
        			<span style="font-size: 10px;"> Nathnagar</span> 
        			
        		</div>
        	</div>

        	

      </div>
      <div class="modal-footer">
       <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
      </div>
    </div>

  </div>
</div>



<script type="text/javascript">
  
  $(function(){


      $(window).on('resize', function(){
            var win = $(this); //this = window
            if (win.width() <= 500) {
              setMobileViewPopups();
          }else{
          setDesktopPopups();
          }
      })

        if ($(this).width() <= 500) {
            setMobileViewPopups();
        }else{
          setDesktopPopups();
        }


        function setMobileViewPopups(){

            $('#choose_area').removeAttr('data-toggle');
            $('#choose_area').attr("data-toggle","modal");
            $('#choose_area').attr("data-target","#myModal");

        }

        function setDesktopPopups(){

          $('#choose_area').removeAttr('data-target');
          $('#choose_area').attr("data-toggle","dropdown");
        }




      //       //if (win.width() >= 1280) { /* ... */ }
      // });

      //$("#page_navigation1").removeAttr("id");

      //$("#page_navigation1").attr("id","page_navigation1");


  });
</script>
