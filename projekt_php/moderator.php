<?php
include ("baza.php");
include ("zaglavlje.php");
$veza=DBconnect();

if (! isModerator()){
	header("Location: index.php");
	exit();
	
}
$ispis_moderator = "";
if ($_SERVER['REQUEST_METHOD'] ==="POST"){

	$znanstveno_podrucje_id=$_REQUEST["zahtjev_moderatora"];
	$korisnik_id= getKorisnikId();
	$sql= "INSERT INTO zahtjev_podrucja (moderator_id, znanstveno_podrucje_id, status) VALUES ({$korisnik_id}, {$znanstveno_podrucje_id} ,2)";
	$rezultat = izvrsiUpit($veza,$sql);
	if($rezultat){
		$ispis_moderator= "Zahtjev poslan adminu";
	} else {
		$ispis_moderator= "Zahtjev nije poslan";
	}
}

?>

<h1 style='text-align:center'>Stranica moderatora</h1>
<p style='text-align:right'>Nalazite se na stranici: moderator.php</p>


<h3 style='text-align:center'><a href="moderator_uredivanje.php">Uređivanje podataka moderatora</a></h3>

<div>
	<h2>Znanstveno područje moderatora</h2>
	<?php
	$korisnik_id=getKorisnikId();
	$sql="SELECT naziv FROM `korisnik` INNER JOIN znanstveno_podrucje ON korisnik.znanstveno_podrucje_id=znanstveno_podrucje.znanstveno_podrucje_id WHERE korisnik_id={$korisnik_id}";
	$rezultat = izvrsiUpit($veza, $sql);
		if ($rezultat){
			if ($red= mysqli_fetch_array ($rezultat)){
				echo "{$red["naziv"]}";		
			}
			else { 
				echo "Korisnik nema dodijeljeno znanstveno područje";
			}
		}
	?>
<br>	
<hr></hr>
<br>
</div>

<div>
	<h2>Zahtjev za znanstvenim područjem</h2>

	<?php
	echo "$ispis_moderator";
	?>
	<form id="zahtjev_moderatora" name="zahtjev_moderatora" method="POST" action="moderator.php">
	<label for="zahtjev_moderatora" >Izaberite znanstveno područje</label>
	<select name="zahtjev_moderatora" id="zahtjev_moderatora">

	<?php
	$sql= "SELECT znanstveno_podrucje_id, naziv FROM znanstveno_podrucje";
	$rezultat = izvrsiUpit($veza, $sql);
	if ($rezultat){
		while($red = mysqli_fetch_array($rezultat)){
			echo "<option value=\"{$red["znanstveno_podrucje_id"]}\">{$red["naziv"]}</option>";	
		}
	}
	?>
	<input type="submit" value="Pošalji">
	</select>
	</form>
	<br>
	<hr></hr>
</div>

<div>
	<br>
	<h2 style='text-align:center'>Pregled zahtjeva za znanstvenim područjem</h2>
	<br>

<table name="popis_zahtjeva" class="popis_zahtjeva">
	<thead>
		<tr>
			<th>Znanstveno područje</th> 
			<th>Status</th>
		</tr>
	</thead>
<?php
$upit = "SELECT naziv, status FROM zahtjev_podrucja INNER JOIN znanstveno_podrucje ON zahtjev_podrucja.znanstveno_podrucje_id=znanstveno_podrucje.znanstveno_podrucje_id WHERE zahtjev_podrucja.moderator_id={$korisnik_id}";
	$rezultat = izvrsiUpit($veza,$upit);
		if($rezultat){
			while($red = mysqli_fetch_array($rezultat)){
				echo "<tr>";
				echo "<td> {$red["naziv"]}</td>";
				$statusTekst = "Nepoznati status";
				if ($red["status"] == 0) { 
					$statusTekst= "Odbijen";
				}
				if ($red["status"] == 1) {
					$statusTekst= "Zahtjev prihvaćen";
				}
				if ($red["status"] == 2) {
					$statusTekst= "Novi zahtjev";
				}
				echo "<td> {$statusTekst}</td>";
				echo "</tr>";
			}		
		}
?>
</table>
</div>

<?php
include ("footer.php");
?>