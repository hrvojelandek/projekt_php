<?php
include("baza.php");
include("zaglavlje.php");
$veza=DBconnect();
if (! isAdmin()){
	header("Location: index.php");
	exit(); 
}

$greska="";
if ($_SERVER['REQUEST_METHOD']=== "POST"){
	
$korime=$_REQUEST["korime"];
$ime=$_REQUEST["ime"];
$prezime=$_REQUEST["prezime"];
$email=$_REQUEST["email"];
$lozinka=$_REQUEST["lozinka"];
$titula=$_REQUEST["titula"];
$radno_mjesto=$_REQUEST["radno_mjesto"];
$opis=$_REQUEST["opis"];

if( strlen ($korime)>0 && strlen ($ime)>0 && strlen ($prezime)>0 && strlen ($email)>0 && strlen ($lozinka)){
	$sql= "INSERT INTO korisnik (korime, tip_korisnika_id, ime, prezime, email, lozinka, titula, radno_mjesto, opis) VALUES ('$korime', 2, '$ime', '$prezime', '$email', $lozinka, '$titula', '$radno_mjesto', '$opis')";
	$rezultat = izvrsiUpit($veza, $sql);
			if ($rezultat){
				header("Location: admin_korisnici.php");
				exit();
			}
			else {$greska="Korisnik nije dodan";
			}		
	} else {
		$greska="Ispunite sva obavezna polja: korisničko ime, ime, prezime, email, lozinka";
	}
}
?>

<h1 style='text-align:center'>Stranica za dodavanje novog korisnika</h1>
<p style='text-align:right'>Nalazite se na stranici: admin_novi_korisnik.php</p>

<?php
echo $greska;
?>
<form id="novi_korisnik" name="novi_korisnik" method="POST" action="admin_novi_korisnik.php">
<table name='novi_korisnik' border="1" id='novi_korisnik' class='novi_korisnik'>
	<tr>
		<td>Korisničko ime</td>
		<td><input type="text" name="korime" id="korime"> </td>
	</tr>
	<tr>
		<td>Ime</td>
		<td><input type="text" name="ime" id="ime"></td>
	</tr>
	<tr>
		<td>Prezime</td>
		<td><input type="text" name="prezime" id="prezime"> </td>
	</tr>
	<tr>
		<td>E-mail</td>
		<td><input type="text" name="email" id="email"></td>
	</tr>
	<tr>
		<td>Lozinka</td>
		<td><input type="text" name="lozinka" id="lozinka"> </td>
	</tr>
	<tr>
		<td>Titula</td>
		<td><input type="text" name="titula" id="titula"></td>
	</tr>
	<tr>
		<td>Radno mjesto</td>
		<td><input type="text" name="radno_mjesto" id="radno_mjesto"> </td>
	</tr>
	<tr>
		<td>Opis</td>
		<td><input type="text" name="opis" id="opis"></td>
	</tr>
</table>
<input class="submit" name="submit" type="submit" value="Pošalji">
</form>

<?php
include("footer.php");
?>