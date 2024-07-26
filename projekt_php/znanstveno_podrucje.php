<?php
include ("baza.php");
include ("zaglavlje.php");
$veza=DBconnect();
if (! isRegistredOrMore()) {
	header("Location: index.php");
	exit();
} 
$filterKorisnikId = "";
$filterKorisnik = "";
if (array_key_exists("komentari", $_REQUEST)){
	$filterKorisnikId = $_REQUEST["komentari"];
	if  ($filterKorisnikId != "" && $filterKorisnikId != "__svi__") {
		$filterKorisnik=" AND komentar.korisnik_id = $filterKorisnikId ";
	} else {
		$filterKorisnikId = "";
	}
}

$vrijemeOd="";
if (array_key_exists("vrijemeOd", $_REQUEST)){
	$vrijemeOd = $_REQUEST["vrijemeOd"];
}
if(!$vrijemeOd) {
	$vrijemeOd="00:00:00";
}

$vrijemeDo="";
if (array_key_exists("vrijemeDo", $_REQUEST)){
	$vrijemeDo = $_REQUEST["vrijemeDo"];
}
if(!$vrijemeDo) {
	$vrijemeDo="23:59:59";
}

$datumOd= "";
$filterDatumOd = "";
if (array_key_exists("datumOd", $_REQUEST)){
	$datumOd = $_REQUEST["datumOd"];
	if  ( $datumOd ) {
		$filterDatumOd=" AND komentar.datum_vrijeme_kreiranja >= STR_TO_DATE(\"{$datumOd} {$vrijemeOd}\", '%d.%c.%Y %H:%i:%s')";
	} 
}

$datumDo= "";
$filterDatumDo = "";
if (array_key_exists("datumDo", $_REQUEST)){
	$datumDo = $_REQUEST["datumDo"];
	if  ( $datumDo ) {
		$filterDatumDo=" AND komentar.datum_vrijeme_kreiranja <= STR_TO_DATE(\"{$datumDo} {$vrijemeDo}\", '%d.%c.%Y %H:%i:%s')";
	} 
}

?>



<h1 style='text-align:center;'>Znanstveno područje</h1>
<p style='text-align:right'>Nalazite se na stranici: znanstveno_podrucje.php</p>

<div>
<?php
if (isAdmin()){
	echo "<a href=\"uredivanje_znanstvenog_podrucja.php?znanstveno_podrucje_id={$_REQUEST["podrucjeId"]}\"> Uredi znanstveno područje </a>";
	echo "<br>";
	echo "<hr>";
}
?>
</div>
<?php
$sql= "SELECT naziv, opis FROM znanstveno_podrucje WHERE znanstveno_podrucje_id={$_REQUEST["podrucjeId"]}";
$rezultat = izvrsiUpit($veza, $sql);
if ($rezultat){
	if ($red = mysqli_fetch_array($rezultat)){
		echo "Naziv: {$red["naziv"]}";
		echo "<br></br>";
		echo "Opis: {$red["opis"]}";
	}
}
?>

<form id="filtiranje" name="filtriranje" method="get" action="znanstveno_podrucje.php">
<?php
echo "<input type=\"hidden\" id=\"podrucjeId\" name=\"podrucjeId\" value=\"{$_REQUEST["podrucjeId"]}\">";
?>
<hr/>
<label for="komentari" >Izaberite autora komentara:</label>
<br>
<select id="komentari" name="komentari">
<option value="__svi__">Svi</option>



<?php
$sql= "SELECT ime, prezime, korisnik_id FROM korisnik WHERE tip_korisnika_id=1";
$rezultat = izvrsiUpit($veza, $sql);
if ($rezultat){
	while($red = mysqli_fetch_array($rezultat)){
		$selected = "";
		if ($filterKorisnikId == $red["korisnik_id"]) {
			$selected = "selected";
		}
		echo "<option $selected value=\"{$red["korisnik_id"]}\">{$red["ime"]} {$red["prezime"]}</option>";
		
	}
}
?>
</select>

<br>
<br>
<label for="datumOd" >Od datuma:</label>
<?php 
	 echo "<input type=\"text\" id=\"datumOd\" name=\"datumOd\" value=\"{$datumOd}\">";
?>
<label for="datumDo">   Do datuma:</label>
<?php
	echo "<input type=\"text\" id=\"datumDo\" name=\"datumDo\" value=\"{$datumDo}\">";
?>

<label for="vrijemeOd" >Vrijeme od:</label>
<?php 
	 echo "<input type=\"text\" id=\"vrijemeOd\" name=\"vrijemeOd\" value=\"{$vrijemeOd}\">";
?>

<label for="vrijemeDo" >Vrijeme do:</label>
<?php 
	 echo "<input type=\"text\" id=\"vrijemeDo\" name=\"vrijemeDo\" value=\"{$vrijemeDo}\">";
?>
<input class="submit" name="submit" type="submit" value="Filtriraj">



</form>


<h2 style='text-align:center;'>Komentari</h2>
<ul>
<?php
$sql= "SELECT sadrzaj, ime, prezime, komentar.korisnik_id as kid, date_format(datum_vrijeme_kreiranja, '%e.%m.%Y') AS datum, komentar_znanstvenika FROM komentar INNER JOIN korisnik ON komentar.korisnik_id = korisnik.korisnik_id WHERE komentar.znanstveno_podrucje_id={$_REQUEST["podrucjeId"]} $filterKorisnik $filterDatumOd $filterDatumDo ORDER BY datum_vrijeme_kreiranja DESC";
$rezultat = izvrsiUpit($veza, $sql);
if ($rezultat){
	while ($red=mysqli_fetch_array($rezultat)){
		echo "<li>"; 
		$komentarZnanstvenika = $red["komentar_znanstvenika"] == 1;
		if ($komentarZnanstvenika) {
			echo "<a href=\"stranica_znanstvenika.php?znanstvenikId={$red["kid"]}\">";
			echo '<div class="zaglavlje_komentara_znanstvenika"';
		}	
		 else {
			echo '<div class="zaglavlje_komentara"';
			}
		echo '<span class="komentar_korisnik">';	
		echo "{$red["ime"]} {$red["prezime"]}";	
		echo "</span>";
		echo '<span class="komentar_datum">';
		echo " ";
		echo $red["datum"];
		echo "</span>";
		echo "</div>";
		if ($komentarZnanstvenika) {
			echo "</a>";
		}
		echo '<div class="komentar_sadrzaja">';
		echo $red["sadrzaj"];
		echo "</div>";
		echo "</li>";
		}
	}
?>
</ul>

<form form id="unos_komentara" name="unos_komentara" method="get" action="unos_komentara.php">
<input class="submit" name="submit" type="submit" value="Unesi komentar">
<?php
echo "<input type=\"hidden\" id=\"podrucjeId\" name=\"podrucjeId\" value=\"{$_REQUEST["podrucjeId"]}\">";
?>

</form>

<?php
include("footer.php");
?>