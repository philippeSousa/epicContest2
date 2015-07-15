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

	
	$albumId = $_POST["albumId"];

	/* Si on recoit un fichier et qu'il est pas vide */
	if ( isset($_FILES) && (count($_FILES)) )
	{
		$targetpath = uploadFile();
		
		if (isset($targetpath))
		{
			echo '<img src="'.$targetpath.'" >';
			
					echo " TRY IT !!!!!!!!!!!!!! ";
				// Upload to a user's profile. The photo will be in the
				// first album in the profile. You can also upload to
				// a specific album by using /ALBUM_ID as the path
				$response = (new FacebookRequest(
						$session, 'POST', '/'.$albumId.'/photos', array(
								'source' => new CURLFile($targetpath, 'image/jpg')
								//,'message' => 'User provided message'
						)
				))->execute()->getGraphObject();
					
				// If you're not using PHP 5.5 or later, change the file reference to:
				// 'source' => '@/path/to/file.name'
					
				echo "Posted with id: " . $response->getProperty('id');
			
		}
		else {
			echo "L'upload de l'image a échoué, veuillez réessayer.";	
		}
	} else 
	{
		?>
		
			<form method="post" enctype="multipart/form-data" >
				<input type="hidden" name="albumId" value="<?php echo $albumId; ?>" />
				<input type="file" name="file" />
				<input type="submit" value="Valider" />
			</form>	
			
		<?php 
	}
	
	function uploadFile()
	{
		/* Envoie le fichier sur le serveur et retourne un nom de fichier provisoire*/		
		$targetpath = "tempPhoto".$_FILES['file']["name"];
		
		if(@move_uploaded_file($_FILES['file']['tmp_name'], $targetpath))
		{			
			return $targetpath;

		}
		else {
			return null;
		}
	}
	
	
?>

	<form method="post" action="selectPhotos.php">
	<input type="hidden" name="albumId" value="<?php echo $albumId; ?>" />
	<input type="submit" value="Retour à l'album" />
	</form>