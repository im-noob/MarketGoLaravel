
<div class="">

	<style type="text/css">

            .owl-carousel .owl-prev {
            	top:0px;
                left: 0;
                 position: absolute;
                height: 100px;
                color: inherit;
                background: none;
                border: none;
                z-index: 100;
            }

            .owl-carousel .owl-next {
            	top:0px;
                right: 0;
                 position: absolute;
                height: 100px;
                color: inherit;
                background: none;
                border: none;
                z-index: 100;
            }

            .owl-carousel .owl-prev i {
                    font-size: 2.5rem;
                    color: #cecece;
                }
                
                .owl-carousel .owl-next i {
                    font-size: 2.5rem;
                    color: #cecece;
                }

               .top-cat .item {
                	height: 100px;
                	text-align: 	center;
                	padding-left: 	20px;
                	padding-right:	20px;
                	
                }


                .top-cat .item a {
                	text-decoration: 	none;
                	text-align: 	center;
                	color:black;
                }
                .top-cat .item a img{
                	height: 80px;
                	width: 	80px;
                	display: inline-block;

                }

                .top-cat .item a span{
                	font-size: 	10px;

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

	</style>


<div class="owl-carousel top-cat owl-theme" style="padding-top: 25px; height: 150px;">
    
</div>
   

   	</div>
<script src="{{ url('/') }}/assets/owlcarousel/owl.carousel.js"></script>

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

                                        $('.top-cat').html(catHtml);

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

        //the method below prepares the category html from array
        function getCatHtml(obj){

            var finalHtml = "";

            for(var i=0;i<obj.length;i++){
                var resultString = "";
                var categoryName = obj[i].title;
                console.log(categoryName);

                var link = "{{ url('/') }}/";



                  resultString+='<div class="item">'+"\n";
                  resultString+='       <a href="'+link+'">'+"\n";
                  resultString+='               <img src="'+link+obj[i].pic+'"><br>'+"\n";
                  resultString+='               <span>'+categoryName+'</span>'+"\n";
                  resultString+='        </a>'+"\n";
                  resultString+='    </div>'+"\n";

                  finalHtml = finalHtml+resultString;

            }

            return finalHtml;
        } 

        loadCategories();
    });


    // $('.play').on('click',function(){
    //     owl.trigger('play.owl.autoplay',[1000])
    // })
    // $('.stop').on('click',function(){
    //     owl.trigger('stop.owl.autoplay')
    // })
</script>



