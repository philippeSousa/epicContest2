<?php
	error_reporting(E_ALL);


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


	$albumId = $_GET["albumId"];
	$redirectLoginUrl = "http://localhost/facebook/epicContest/index.php?uc=album&action='".$albumId."'";
	
	$helper = new FacebookRedirectLoginHelper($redirectLoginUrl);
	
		if ( isset($_SESSION) && isset($_SESSION['fb_token']) ) {
			$session = new FacebookSession($_SESSION['fb_token']);
		} else {
			$session = $helper->getSessionFromRedirect();
		}
		
	$user = null;
	$photos = null;

	
	if ( isset($session) ) 
	{		 
		/* Init la connection et get le USER */
		$token = (string) $session->getAccessToken();
		$_SESSION['fb_token'] = $token;
		//Prepare
		$request = new FacebookRequest($session, 'GET', '/me');
		//execute
		$response = $request->execute();
		//transform la data graphObject
		$user = $response->getGraphObject("Facebook\GraphUser");
		
		/* Get les photos de l'album */	
		/* envoie une requete fcb qui va chercher toutes les photo de l'albumId selectionné */
		$requestPhotos = new FacebookRequest(
		  $session,
		  'GET',
		  '/'.$albumId.'/photos'
		);
		$responsePhotos = $requestPhotos->execute();
		$photos = json_decode($responsePhotos->getRawResponse(), true);
/*		var_dump($photos);
*/	
	} else {
		/* S'il est pas connecté, il a pas accès à la page d'upload,
		 *  on le redirige vers l'accueil */
        header('Location: index.php');		
	}

?>

<div class="container">
			<div class="services">
				<h3>Vos photos</h3>
			</div>
			<div class="product">	


    <h1> <?php echo "Bonjour ".$user->getName(); ?> Choisissez une photo pour concourrir ! </h1>
    <a href="selectAlbum.php"> Retour aux albums </a><br/>
    <form method="post" action="fileUpload.php"> 
    	<input type="hidden" name="albumId" value="<?php echo $albumId; ?>" />
    	<input type="submit" value="Ajouter une nouvelle photo à cet album !" />
    </form>

    <div class="col-sm-14">
	<div id="posts" class="row">
<ul class="thumbnails">
		 <?php
/*		 var_dump($photos);
*/    	/* Affiche toutes les photos 
    	 * dans $cettePhoto = array
    	 * $cettePhoto["id"] : l'id de la photo
    	 * $cettePhoto["picture"] : miniature 100px de la photo
    	 * $cettePhoto["images"] : array de toutes les declinaisons de taille de la photo
    	 * "images" [0] : declinaison la plus grande de la photo
    	 * "$cettePhoto["images"][0]["source"] : url de la photo
    	 * */


    	foreach ($photos["data"] as $cettePhoto)
    	{ ?>

  <div id="item" class="post item span2">

<form method="post" action="index.php?uc=validatePhoto">
 						 <input type="hidden" name="photoId" value="<?php echo $cettePhoto['id'] ?>" />
						 <input type="hidden" name="albumId" value=" <?php echo $albumId ?>" />
<!-- 						 <img src="<?php echo $cettePhoto['picture'] ?>"/>
 --> 						 <input  type="image" src="<?php echo $cettePhoto['picture'] ?>" class="thumbnail" />
                  	</form>
  </div>
  
    	<?php }
    ?>
</ul>
	</div>
	</div>

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