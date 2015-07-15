<?php 
	use Facebook\FacebookSession;
	use Facebook\FacebookRedirectLoginHelper;
	use Facebook\FacebookRequest;
	use Facebook\FacebookResponse;
	use Facebook\FacebookSDKException;
	use Facebook\FacebookRequestException;
	use Facebook\FacebookAuthorizationException;
	use Facebook\GraphObject;
	use Facebook\Entities\AccessToken;
	use Facebook\HttpClients\FacebookCurlHttpClient;
	use Facebook\HttpClients\FacebookHttpable;

	
	if ( isset($session) ) 
	{		 
		/* Init la connection et get le USER */
		$token = (string) $session->getAccessToken();
		//Prepare
		$request = new FacebookRequest($session, 'GET', '/me');
		//execute
		$response = $request->execute();
		//transform la data graphObject
		$user = $response->getGraphObject("Facebook\GraphUser");
/*		var_dump($user);
*/		/* Get les photos de l'album */	
		/* envoie une requete fcb qui va chercher toutes les photo de l'albumId selectionné */
		$requestPhoto = new FacebookRequest(
		  $session,
		  'GET',
		  '/'.$idPhoto
		);
		$responsePhoto = $requestPhoto->execute();
		$photo = json_decode($responsePhoto->getRawResponse(), true);
		var_dump($photo);
	} else {
		/* S'il est pas connecté, il a pas accès à la page d'upload, on le redirige vers l'accueil */
        header('Location: index.php');		
	}





?>

<div class="container">
			<div class="services">
				<h3>Vos albums facebook</h3>
			</div>
			<div class="product">		



<div class="container">
			<div class="services">
				<h3>Vos albums facebook</h3>
			</div>
			<div class="product">	

<div class="row">

	<div class="col-sm-9 ">
	<div class="row lastImg">
	<div class="img-title">
						<h4>DERNIER AJOUT</h4>
					</div>

			<div class="clearfix"> </div>


		 <img src="//lorempixel.com/150/180"/>
	

	</div>
	<div style="margin-top:15px;" class="row lastImg">
		

		qsdddddddddddddddddddddd
	</div>
	<div style="margin-top:15px;" class="row lastImg">
		

		qsdddddddddddddddddddddd
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
			</div>


</div>




</div>
</div>