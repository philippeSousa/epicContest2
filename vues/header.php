<!--header-->
<?php 	error_reporting(E_ALL);


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
	?>
	<div class="header">
		<div class="social-icons">
				<ul>
					<li><a href="#"> </a></li>
					<li><a href="#" class="fb"> </a></li>
					<li><a href="#" class="in"> </a></li>
					<li><a href="#" class="dott"> </a></li>
				</ul>
			</div>
		<div class="container">
			<div class="col-md-9 top-nav">
				<span class="menu"><img src="web/images/menu-icon.png" alt=""/></span>
				<ul class="nav1" style="display:block;">
					<li><a href="index.html" class="active">HOME</a></li>
					<li><a href="about.html">CONCOURS</a></li>
					<li><a href="samplepage.html">ARCHIVES</a></li>
					<li><a href="contact.html" >INFORMATIONS</a></li>
				</ul>	
			</div>
			<div class="col-md-3 header-logo">
<!-- 				<a href="index.html"><img src="web/images/logo.png" alt="logo"/></a>
 -->			
	
        <div class="participer">
        <?php
        if (isset($session)) {
        echo " id user" . $user->getId();
         
            echo "Bonjour " . $user->getName();
            verifUser($user->getId(),$conn);
            echo "<a href='index.php?uc=selectAlbum'  class='btn_participer'> Je veux participer au concours en uploadant une photo !</a>";
/*            echo '<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Participer au concours</button>
';*/
        } else {
/*         verifUser($user->getId(),$conn);
*/           
/*	var_dump($loginUrl);
*/ echo "<a href='" . $loginUrl . "' class='btn_connect'>Se connecter pour have fun with us !!!!</a>";
        }
        	?>
        </div>


 </div>	
			<div class="clearfix"> </div>
		</div>	
	</div>

	<!--//header-->