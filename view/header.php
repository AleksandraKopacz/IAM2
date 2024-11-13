<?php require_once dirname(__FILE__) .'/../config.php';
if (!isset($_SESSION)){
		session_start();
	}
?>

<!DOCTYPE html>
<html lang="pl" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>violin - php framework | your code sounds great</title>
		
		<link href='http://fonts.googleapis.com/css?family=Advent+Pro&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Lato:300,700&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,600,700' rel='stylesheet' type='text/css'>

		
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
		<script type="text/javascript" src="https://code.jquery.com/ui/1.11.3/jquery-ui.min.js"></script>

		
		<?php
		echo'

		
		
			<script type="text/javascript" src="'.$conf->app_root.'/js/jquery.cookie.js"></script>
			<link rel="stylesheet" type="text/css" href="'.$conf->app_root.'/css/jquery.cookie.css" />
					
			<link rel="stylesheet" type="text/css" href="'.$conf->app_root.'/css/special/demo.css" />			
			<link rel="stylesheet" type="text/css" href="'.$conf->app_root.'/css/special/form.css" />
			
		';
		
		?>	
<style>
.boldGray{
	font-weight: bold;
	color: gray;
}
.boldRed {
	font-weight: bold;
	color: red;
}
.boldBlue {
	font-weight: bold;
	color: blue;
}
.no-bullet{
	list-style: none;
}
.horizontal-list{
	float: left;
	margin-top: -182px;
	margin-left: 350px;
}
.marked{
	text-decoration: underline;
	font-weight: bold;
	color: yellow;
}
</style>




	</head>
    <body>

	<script>
		$.cookieBar({
		    fixed: true,
		    acceptOnScroll: 200
		});
	</script>  	
	<script>
	    function validateEmail($email) {
	     var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
	     return emailReg.test( $email );
	   }
	</script>

	
            <div class="container">
              	 <div class="col-lg-10 col-lg-offset-1 col-md-11 col-md-offset-1 col-sm-11 col-sm-offset-1"  > 
						<img src="<?php echo $conf->app_root.'/css/special/logo.jpg'; ?>" alt="" class="img-responsive" style="margin: auto" />
						<?php
						if (isset($_SESSION["name"])){
							echo '<p class="btn btn-default">Logged in as <strong class="btn-default">'.$_SESSION["name"].'      </strong>    <a class="btn-danger" href="'.$conf->app_root.'/logout'.'">Logout</a></p>';
						}
						?>
                </div>
            </div>
