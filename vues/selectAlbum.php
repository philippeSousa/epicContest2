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

    $loginUrl = null;
    $graphObject = null;
    $albums = null;

$redirectLoginUrl = "http://localhost/facebook/epicContest/index.php?uc=selectAlbum";

$request = new FacebookRequest(
				$session,
				'GET',
				'/me/permissions'
		);
		$responsePermissions = $request->execute();
/*		var_dump($responsePermissions);
*/		$lesPermissions = json_decode($responsePermissions->getRawResponse(), true);
/*		echo "<pre>"; var_dump($lesPermissions["data"]);echo "</pre>";
*/		
		if (in_array("user_photos", $lesPermissions))
		{
			echo " IL A DROIT O FOTO";
		}
		
/*		if (!in_array("publish_actions", $lesPermissions))
		{
			$loginUrl = $helper->getLoginUrl(['user_photos', 'publish_actions']);
			header('Location: '.$loginUrl);
		}
		*/

		/* Get les albums */
		$requestAlbums = new FacebookRequest($session, 'GET', '/me/albums');
		//execute
		$responseAlbums = $requestAlbums->execute();
		/* On convertit l'objet retourné en tableau et on recup les données */
		$albums = json_decode($responseAlbums->getRawResponse(), true);

/*var_dump($albums);
*/?>


<div class="container">
			<div class="services">
				<h3>Vos albums facebook</h3>
			</div>
			<div class="product">		



<h1> <?php echo "Bonjour ".$user->getName(); ?> Choisissez un album pour selectionner une photo ou pour en ajouter une. </h1>

<div class="col-sm-14 lastImg">
	

	<div class="row" id="posts">
	<?php foreach ($albums["data"] as $cetAlbum)
		    	{ ?>
		    	



<div class="col-md-2 portfolio-grids item">
<a href="index.php?uc=getPhotoAlbum&albumId=<?php echo $cetAlbum['id'] ?>" >
					<div class="port-grids">
						<div class="port-text">
							<h5><?php echo $cetAlbum['name'] ?></h5>
						</div>
						<div class="port-image">
							<img src="https://graph.facebook.com/<?php echo $cetAlbum['id'] ?>/picture?type=album&access_token=<?php echo $_SESSION['fb_token'] ?>" class="img-responsive zoom-img">
						</div>
						
					</div>
					</a>
				</div>
<div class="col-sm-14 lastImg">





		    	<?php } ?>   	
<!-- 		<div class="col-xs-14 col-sm-3"> <img src="images/chat.png"/></div>
		<div class="col-xs-14 col-sm-3"> <img src="images/chat.png"/></div>
		<div class="col-xs-14 col-sm-3"> <img src="images/chat.png"/></div>
		<div class="col-xs-14 col-sm-3"> <img src="images/chat.png"/></div> -->
	</div>
	</div>

	<script>
            window.fbAsyncInit = function () {
                FB.init({
                    appId: '1468256266797643',
                    xfbml: true,
                    version: 'v2.3'
                });
            };
            (function (d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) {
                    return;
                }
                js = d.createElement(s);
                js.id = id;
                js.src = "//connect.facebook.net/fr_FR/sdk.js";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));

        </script>


</div>

</div>