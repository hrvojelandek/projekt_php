<?php
	include ("baza.php");
	include("zaglavlje.php");
	$veza=DBconnect();
	
	$greska = "";
if ($_SERVER['REQUEST_METHOD'] ==="POST") {
	$korime=$_REQUEST["korime"];
	$ime=$_REQUEST["ime"];
	$prezime=$_REQUEST["prezime"];
	$email=$_REQUEST["email"];
	$lozinka=$_REQUEST["lozinka"];
	$titula=$_REQUEST["titula"];
	$radno_mjesto=$_REQUEST["radno_mjesto"];
	$opis=$_REQUEST["opis"];
	if ( strlen ($korime)>0 && strlen ($ime)>0 && strlen ($prezime)>01 && strlen($email)>0 && strlen($lozinka)>0){
		$sql="INSERT INTO korisnik (korime, ime, prezime, email, lozinka, titula, radno_mjesto, opis)
				VALUES (\"$korime\", \"$ime\", \"$prezime\", \"$email\", \"$lozinka\", \"$titula\", \"$radno_mjesto\", \"$opis\")";

		$rezultat = izvrsiUpit($veza,$sql);
		if($rezultat){
			header("Location: prijava.php");
			exit();
		}
		else {
			$greska = "Greška pri registraciji korisnika";
		}	
	} else {
		$greska = "Obavezna polja nisu unešena: korisničko ime, ime, prezime, email, lozinka";
	}

	
}
	
	
?>

<?php

echo $greska;
?>
<br>
<p style='text-align:right'>Nalazite se na stranici: registracija.php</p>
<form id="registracija" name="registracija" method="post" action="registracija.php">
					<label for="korime">Korisničko ime:</label>
					<input type="text" name="korime" id="korime" 
					   size="26" placeholder="Korisničko ime" autofocus="autofocus"/>
					<br>
					<label for="ime">Ime:</label>
					<input type="text" name="ime" id="ime" 
					   size="40" placeholder="Ime" autofocus="autofocus"/>
					<br>
					<label for="prezime">Prezime:</label>
					<input type="text" name="prezime" id="prezime" 
					   size="35" placeholder="Prezime" autofocus="autofocus"/>
					 <br>
					<label for="prezime">E-mail:</label>
					<input type="text" name="email" id="email" 
					   size="37" placeholder="E-mail" autofocus="autofocus"/>
					<br>
					<label for="lozinka">Lozinka:</label>
					<input type="pass" name="lozinka" id="lozinka" 
					   size="35" placeholder="Lozinka" autofocus="autofocus"/>
					<br>
					<label for="titula">Titula:</label>
					<input type="text" name="titula" id="titula" 
					   size="38" placeholder="Titula" autofocus="autofocus"/>
					 <br>
					 <label for="radno_mjesto">Radno mjesto:</label>
					<input type="text" name="radno_mjesto" id="radno_mjesto" 
					   size="27" placeholder="Radno mjesto" autofocus="autofocus"/>
					<br>
					<label for="opis">Opis:</label>
					<input type="text" name="opis" id="opis" 
					   size="40" placeholder="Opis" autofocus="autofocus"/>
					<br>
					<input class="submit" name="submit" type="submit" value="Prijavi se">
					<input id="reset" type="reset" name="gumb2" value="Obriši">
					<hr></hr>					
				</form>	

<?php
include("footer.php");
?>