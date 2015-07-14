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

	$user = null;
	$photoId = $_POST["photoId"];
	$albumId = $_POST["albumId"];
	
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
		var_dump($user);
		/* Get les photos de l'album */	
		/* envoie une requete fcb qui va chercher toutes les photo de l'albumId selectionné */
		$requestPhoto = new FacebookRequest(
		  $session,
		  'GET',
		  '/'.$photoId
		);
		$responsePhoto = $requestPhoto->execute();
		$photo = json_decode($responsePhoto->getRawResponse(), true);
	
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


    <form method="post" action="selectPhotos.php" >
    	<input type='hidden' name="albumId" value="<?php echo $albumId; ?>"/>
   		<input type='submit' value="Retour à la liste de photos" />
    </form>
    <h1>Photo validate</h1>
    <div>
    <?php 
    $userId = $user->getId();
/*    echo "user id " . $userId;
*/    $photoId = $photo['id'];
/*    echo " photo id " . $photoId;
*/    $urlMiniature = $photo['picture'];
/*    echo " url min".$urlMiniature;
*/    $urlPhoto = $photo["images"][0]["source"];
/*    echo " url phot".$urlPhoto;
*/
/*    insertPhotos($photoId,$userId, $urlPhoto, $urlMiniature,$conn);
*/

echo '----------------------------';

/*         verifUser($user->getId(),$conn);
*/
/*var_dump($userId);
var_dump($photoId);
var_dump($conn);*/

    ?>
	    <?php    
	    	echo '<img src="'.$photo["images"][0]["source"].'" />';
	    ?>
	    
    </div>
    </div>
    </div>