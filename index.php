<!DOCTYPE html>
<?php session_start();
error_reporting(E_ALL);
	ini_set("display_errors", 1);
	require_once 'vendor/autoload.php';
    require_once 'utils/DbConnect.php';
    require_once 'utils/functions.php';
/*    require 'utils/functions.php';
*/
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

  const id = "1468256266797643";
  const mdp = "5598726dd2d32c30ca7e11b7eeb68016";
  
  FacebookSession::setDefaultApplication(id, mdp);
$redirectLoginUrl = "https://appesgifacebook.herokuapp.com/";

  $helper = new FacebookRedirectLoginHelper($redirectLoginUrl);
  if (isset($_SESSION) && isset($_SESSION['fb_token'])) {
      $session = new FacebookSession($_SESSION['fb_token']);
  } else {
      $session = $helper->getSessionFromRedirect();
  }

           
     ?>

     <?php
// var_dump($session->getAccessToken());
   $user = null;
  $loginUrl = null;
  
  if (isset($session)) {
  
      /* Init la connection et get le USER */
      $token = (string) $session->getAccessToken();
      $_SESSION['fb_token'] = $token;
      //Prepare
      $request = new FacebookRequest($session, 'GET', '/me');
      //execute
      $response = $request->execute();
      //transform la data graphObject
      $user = $response->getGraphObject("Facebook\GraphUser");

      
  } else {
  	echo "eddddd";
      // show login url
      $loginUrl = $helper->getLoginUrl(['user_photos']);
/*      var_dump($loginUrl);
*/  }
 ?>



<html>
<?php require_once('vues/head.php'); ?>

<body>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '1468256266797643',
      xfbml      : true,
      version    : 'v2.4'
    });

    // ADD ADDITIONAL FACEBOOK CODE HERE
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>


<?php
require_once 'vues/header.php';
include 'vues/modalUpload.php';
if(!isset($_REQUEST['uc']))
{$uc = 'accueil';}
else
{$uc = $_REQUEST['uc'];}

switch($uc)
{
	case 'accueil':
	{ 
		$date = date('Ymd');

		$listRecentPhotos = getPhotosByDate($date,0,$conn);
		include('vues/v_accueil.php');
		break;
	}
	case 'photo':
	{ 
		$idPhoto = $_GET['idphoto'];
		$idUser = $_GET['iduser'];
		$date = $_GET['date'];
		var_dump($_GET);
		$laphoto = getPhotoByIdAndDate($idPhoto , $idUser , $date,$conn);
		var_dump($laphoto);
		include('vues/photo.php');
		break;
	}
	case 'selectAlbum':
	{
		require 'vues/selectAlbum.php';
		break;
	}
	case 'getPhotoAlbum':
	{	
		$idAlbum = $_GET['albumId'];
		include('vues/listPhotoAlbum.php');
		break;
	}
	case 'validatePhoto': {

	include('vues/validatePhoto.php');
	break;
	}
	default :
	{
		$date = date('Ymd');
		$listRecentPhotos = getPhotoByDate($date,0,$conn);
		include('vues/v_accueil.php');
	}
}
?>

</body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/fr_FR/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
</html>