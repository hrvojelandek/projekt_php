<?php
include ("baza.php");
include ("zaglavlje.php");
$veza=DBconnect();
if (! isModerator()){
	header("Location: index.php");
	exit();
}
$greska="";
if ($_SERVER['REQUEST_METHOD']=== "POST"){
	$ime=$_REQUEST["ime"];
	$prezime=$_REQUEST["prezime"];
	$titula=$_REQUEST["titula"];
	$opis=$_REQUEST["opis"];
	$radno_mjesto=$_REQUEST["radno_mjesto"];
	$slika=$_REQUEST["slika"];
$trenutni_korisnik= getKorisnikID(); 
$sql= "UPDATE korisnik SET ime='{$ime}', prezime='{$prezime}', titula='{$titula}', opis='{$opis}', radno_mjesto='{$radno_mjesto}', slika='{$slika}' WHERE korisnik_id = {$trenutni_korisnik}";

$rezultat = izvrsiUpit($veza, $sql);
		if ($rezultat){
			header("Location: moderator.php");
			exit();
		}
		else {$greska="Podaci nisu ažurirani";
		}
}

?>

<h1 style='text-align:center'>Uređivanje podataka moderatora</h1>
<p style='text-align:right'>Nalazite se na stranici: moderator_uredivanje.php</p>

<?php
$ime="";
$prezime="";
$titula="";
$opis="";
$radno_mjesto="";

$logirani_korisnik = getKorisnikID();
$sql= "SELECT ime, prezime, titula, opis, radno_mjesto, slika FROM korisnik WHERE korisnik_id = {$logirani_korisnik}";
$rezultat = izvrsiUpit($veza, $sql);
if ($rezultat){
	if($red = mysqli_fetch_array($rezultat)){
		$ime=$red["ime"];
		$prezime=$red["prezime"];
		$titula=$red["titula"];
		$opis=$red["opis"];
		$radno_mjesto=$red["radno_mjesto"];
		$fotka=$red["slika"];
	}
}
echo "$greska";
?>


<form form id="azuriranje_moderatora" name="azuriranje_moderatora" method="POST" action="moderator_uredivanje.php">
	<table name="azuriranje_moderatora" class="azuriranje_moderatora">
		<tr>
			<td>Ime</td>
			<td>
			<?php
			echo "<input type=\"text\" name=\"ime\" value=\"{$ime}\" id=\"ime\" size=\"40\" autofocus=\"autofocus\"/>";
			?>
			</td>
		</tr>
		<tr>
			<td>Prezime</td>
			<td>
			<?php
			echo "<input type=\"text\" name=\"prezime\" value=\"{$prezime}\" id=\"prezime\" size=\"40\" autofocus=\"autofocus\"/>";
			?>
			</td>
		</tr>
		<tr>
			<td>Titula</td>
			<td>
			<?php
			echo "<input type=\"text\" name=\"titula\" value=\"{$titula}\" id=\"titula\" size=\"40\" autofocus=\"autofocus\"/>";
			?>
			</td>
		</tr>
		<tr>
			<td>Opis</td>
			<td>
			<?php
			echo "<input type=\"text\" name=\"opis\" value=\"{$opis}\" id=\"opis\" size=\"40\" autofocus=\"autofocus\"/>";
			?>
			</td>
		</tr>
		<tr>
			<td>Radno mjesto</td>
			<td>
			<?php
			echo "<input type=\"text\" name=\"radno_mjesto\" value=\"{$radno_mjesto}\" id=\"radno_mjesto\" size=\"40\" autofocus=\"autofocus\"/>";
			?>
			</td>
		</tr>
		<tr>
			<td>Slika</td>
			<td>
			<?php
			echo "<input type=\"text\" name=\"slika\" value=\"{$fotka}\" id=\"slika\" size=\"40\" autofocus=\"autofocus\"/>";
			?>
			</td>
		</tr>
	</table>

<input class="submit" name="submit" type="submit" value="Pošalji">

</form>

<?php
include ("footer.php");
?>