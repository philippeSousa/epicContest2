<div class="portfolio-filter">
		<div class="container">
			<div class="services">
				<h3>Epic contest</h3>
			</div>
			<div class="product">		
			<!-- 	<ul id="filters">

					<li><span class="filter active" data-filter="app card icon web">ALL</span></li>
					<li><span class="filter" data-filter="app">Last week</span></li>
					<li><span class="filter" data-filter="card">Last month </span></li>
				</ul> -->



<div class="row">
	
	<div class="col-sm-2 topWeek">
	<div class="img-title">
						<h4>TOP SEMAINE</h4>
					</div>
<!-- 				<h3>Top semaine</h3>
 -->		<div class="clearfix"> </div>
 			<div class="col-md-14">
 				<div class="well">
            		<h4><a href="#" target="_blank">Bootstrap</a></h4>

                <img class="thumbnail img-responsive img-responsive zoom-img" src="//lorempixel.com/150/180"/>
                <div class="info"> <span class="badge">90</span>
 				<span class="badge">42</span>
 				</div>
                </div>
            </div>
		<div class="col-md-14"><img src="web/images/chat.png"/></div>
		<div class="col-md-14"><img src="web/images/chat.png"/></div>

	</div>

<div class="col-sm-7 lastImg">
	<div class="row">
	<div class="img-title">
						<h4>DERNIER AJOUT</h4>


			
					</div>

			<div class="clearfix"> </div>


<?php 
var_dump($listRecentPhotos);
for ($i=0; $i < count($listRecentPhotos) ; $i++) { ?>

<div class="col-xs-14 col-sm-3"> <div class="well">
            		<h4><a href="#" target="_blank"><!-- Bootstrap --></a></h4>
                <img class="thumbnail img-responsive img-responsive zoom-img" src="<?php echo $listRecentPhotos[$i]['url_photo'] ;?>"/>
                <div class="info"> <span class="badge">90</span>
 				<span class="badge">42</span>
 				</div>
                <div class="fb-like" data-href="https://appesgifacebook.herokuapp.com/index.php?uc=photo&iduser=<?php echo $listRecentPhotos[$i]['id_user']?>&idphoto<?php echo $listRecentPhotos[$i]['id_photo'] ?>&date<?php echo $listRecentPhotos[$i]['date_submit']?>" data-send="true" 
                data-layout="box_count" data-width="100" data-show-faces="true" data-font="arial"></div>
                </div>
   </div>
 <?php } 
?>
		


		<div class="col-xs-14 col-sm-3"> <img src="web/images/chat.png"/></div>
		<div class="col-xs-14 col-sm-3"> <img src="web/images/chat.png"/></div>
		<div class="col-xs-14 col-sm-3"> <img src="web/images/chat.png"/></div>

	</div>


	</div>

	<div class="col-sm-2 topMois">
	<div class="img-title">
						<h4>TOP MOIS</h4>
					</div>
			<div class="clearfix"> </div>
		<div class="col-md-14"><div class="well">
            		<h4><a href="#" target="_blank">Bootstrap</a></h4>
                <img class="thumbnail img-responsive img-responsive zoom-img" src="//lorempixel.com/150/180"/>
                <div class="info"> <span class="badge">90</span>
 				<span class="badge">42</span>
 				</div>
                </div>
          </div>
		<div class="col-md-14"><img src="web/images/chat.png"/></div>
		<div class="col-md-14"><img src="web/images/chat.png"/></div>
	</div>
</div>

				
			<!--swipebox -->	
			<link rel="stylesheet" href="css/swipebox.css">
				<script src="js/jquery.swipebox.min.js"></script> 
				<script type="text/javascript">
					jQuery(function($) {
						$(".swipebox").swipebox();
					});
				</script>
			<!--//swipebox Ends -->
			</div>	
		</div>	
	</div>
</div>
