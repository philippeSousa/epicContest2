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



<?php require_once('vues/head.php'); ?>
<html>
<body>

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
		include('vues/v_accueil.php');
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
		var_dump($idAlbum);
		include('vues/listPhotoAlbum.php');
		break;
	}
	case 'validatePhoto': {

		var_dump($_POST);
		include('vues/validatePhoto.php');
		echo "dddd";
	}
}
?>

</body>

</html>