<?php
include("baza.php");
include("zaglavlje.php");
$veza=DBconnect();

$greska = "";
if ($_SERVER['REQUEST_METHOD'] ==="POST") {
	$korime=$_REQUEST["user"];
	$pass=$_REQUEST["pass"];
	$sql = "select korisnik_id, korisnik.tip_korisnika_id as tip, ime, prezime, naziv from korisnik inner join tip_korisnika on tip_korisnika.tip_korisnika_id=korisnik.tip_korisnika_id  where korime=\"$korime\" and lozinka=\"$pass\"";
	//echo $sql;
	//echo "<br>";
	$rezultat = izvrsiUpit($veza,$sql);
	if($rezultat){
		if ($red = mysqli_fetch_array($rezultat)){
			$ime = $red["ime"];
			$prezime = $red["prezime"];
			$korisnik_id = $red["korisnik_id"];
			$tip_korisnika_id = $red["tip"];
			$naziv = $red ["naziv"];
			$_SESSION['ime'] = $ime;
			$_SESSION['prezime'] = $prezime;
			$_SESSION['naziv'] =$naziv;
			$_SESSION ['korisnicko_ime'] = $korime;
			$_SESSION ['korisnik_id'] = $korisnik_id;
			$_SESSION ['tip_korisnika_id'] = $tip_korisnika_id;
			header("Location: index.php");
			exit();
			//echo $ime, $prezime, $korisnik_id, $naziv;
		} else {
			$greska = "Neispravni podaci, pokusajte ponovno";
		}
	} else {
		echo "Greska pri provjeri korisnickog imena";
	}
}

?>


<!DOCTYPE html>
<html>
	<head>
		<title>Znanstveni forum - IWA</title>
		<meta charset="UTF-8"/>
		<meta name="author" content="Hrvoje Landeka"/>
	</head>	
	<body>	
		<section>
			<h1 style='text-align:center;'>Prijava korisnika u sustav</h1>
			<p style='text-align:right'>Nalazite se na stranici: prijava.php</p>

			<?php
				if ($greska) {
					echo "$greska <br>";
				}
			?>
			<br>
			<br>
				<form id="prijava" name="prijava" method="post" action="prijava.php">
					<label for="user">Korisničko ime:</label>
					<input type="text" name="user" id="user" 
					   size="30" placeholder="Korisničko ime" autofocus="autofocus"/>
					<br>
					<label for="pass">Lozinka:</label>
					<input type="password" name="pass" id="pass" 
					   size="40" placeholder="Lozinka" autofocus="autofocus"/>
					<br>
					<input class="submit" name="submit" type="submit" value="Prijavi se">
					<input id="reset" type="reset" name="gumb2" value="Obriši">
					<hr></hr>					
				</form>	
		</section>
	</body>	
</html>

<?php
	include("footer.php");
?>