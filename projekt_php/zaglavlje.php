<!DOCTYPE html>
 
<html lang= "hr">
	<head>
		<title>Znanstveni forum - IWA</title>
		<meta charset="UTF-8"/>
		<meta name="author" content="Hrvoje Landeka"/>
		<link href="stiliziranje.css" rel="stylesheet" type="text/css" />
		<link rel="icon" href="favicon/favicon.ico">
		<img align='left' style="border:0; width:120px; height:70px" src="logo/IWA_logo.jpg">
	</head>
	<body>
			<div class="navigacija" align='center' style='font-size:larger;'>
				<a href="index.php">Početna</a>
				<a href="o_autoru.html">O autoru</a>
				<?php
				if (array_key_exists("ime", $_SESSION)) {
					echo '<a href="odjava.php">Odjava</a>';
				}
				else{
					echo'<a href="prijava.php">Prijava</a>';
					echo'<a href="registracija.php">Registracija</a>';
				}
				if (isAdmin()){
					echo '<a href="admin_home.php">Admin</a>';
				}					
				if (isRegistredOrMore()){
					echo '<a href="znanstvena_podrucja.php">Znanstvena područja</a>';
				}
				
				if (isModerator()){
					echo '<a href="moderator.php">Stranica moderatora</a>';
				}
				?>
			
				
<?php
	if (array_key_exists("ime", $_SESSION)) {
		echo $_SESSION['ime'];
		echo " ";
		echo $_SESSION['prezime'];
		echo " - ";
		echo $_SESSION['naziv'];
	}
?>
			</div>	
