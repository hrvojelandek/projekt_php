<?php
include ("baza.php");
include ("zaglavlje.php");
$veza=DBconnect();
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
	
	$korisnik_id=$_REQUEST["korisnik_id"];
	if( strlen ($korime)>0 && strlen ($ime)>0 && strlen ($prezime)>0 && strlen ($email)>0 && strlen ($lozinka)){
		$sql="UPDATE korisnik SET korime = '$korime', ime='$ime', prezime='$prezime', email='$email', lozinka=$lozinka, titula='$titula', radno_mjesto='$radno_mjesto', opis='$opis' WHERE korisnik_id = {$korisnik_id}";
		$rezultat = izvrsiUpit($veza, $sql);
		if ($rezultat){
			header("Location: admin_korisnici.php");
			exit();
		}
		else {$greska="Korisnik nije promijenjen";
		}		
	} else {
		$greska="Ispunite sva obavezna polja: korisničko ime, ime, prezime, email, lozinka";
	}
}

?>


<h1 style='text-align:center'>Trenutno prijavljeni korisnik</h1>
<p style='text-align:right'>Nalazite se na stranici: admin_korisnik.php</p>

<?php
echo "$greska";
?>
<form id="uredivanje_korisnika" name="uredivanje_korisnika" method="POST" action="admin_korisnik.php">  
<table>
<?php
$korisnik_id = $_REQUEST["korisnik_id"];
$sql = "SELECT * FROM korisnik WHERE korisnik_id = {$korisnik_id}";
$rezultat = izvrsiUpit($veza, $sql);
		if ($rezultat){
				if ($red=mysqli_fetch_array($rezultat)){
					$korime=$red["korime"];
					$ime=$red["ime"];
					$prezime=$red["prezime"];
					$email=$red["email"];
					$lozinka=$red["lozinka"];
					$titula=$red["titula"];
					$radno_mjesto=$red["radno_mjesto"];
					$opis=$red["opis"];
				
					echo "<tr>";
					echo "<td>Korisničko ime</td>";
					echo "<td><input name=\"korime\" value=\"$korime\"/></td>";
					echo "</tr>";
					echo "<tr>";
					echo "<td>Ime</td>";
					echo "<td><input name=\"ime\" value=\"$ime\"/></td>";
					echo "</tr>";
					echo "<tr>";
					echo "<td>Prezime</td>";
					echo "<td><input name=\"prezime\" value=\"$prezime\"/></td>";
					echo "<tr>";
					echo "<td>E-mail</td>";
					echo "<td><input name=\"email\" value=\"$email\"/></td>";
					echo "</tr>";
					echo "<tr>";
					echo "<td>Lozinka</td>";
					echo "<td><input name=\"lozinka\" value=\"$lozinka\"/></td>";
					echo "</tr>";
					echo "<tr>";
					echo "<td>Titula</td>";
					echo "<td><input name=\"titula\" value=\"$titula\"/></td>";
					echo "</tr>";
					echo "<tr>";
					echo "<td>Radno mjesto</td>";
					echo "<td><input name=\"radno_mjesto\" value=\"$radno_mjesto\"/></td>";
					echo "</tr>";
					echo "<tr>";
					echo "<td>Opis</td>";
					echo "<td><input name=\"opis\" value=\"$opis\"/></td>";
					echo "</tr>";
				}
		}		

?>
</table>
<input class="submit" name="submit" type="submit" value="Pošalji">
<?php
echo "<input type=\"hidden\" name=\"korisnik_id\" value=\"$korisnik_id\"/>";
?>
</form>
<?php
include ("footer.php");
?>