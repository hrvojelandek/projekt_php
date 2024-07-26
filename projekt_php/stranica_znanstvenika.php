<?php
include ("baza.php");
include ("zaglavlje.php");
$veza=DBconnect();
$znanstvenikId = $_REQUEST ["znanstvenikId"];
?>
<h1 style='text-align:center;'>Stranica znanstvenika</h1>
<p style='text-align:right'>Nalazite se na stranici: stranica_znanstvenika.php</p>

	
<?php
$sql= "SELECT ime, prezime, titula, radno_mjesto, znanstveno_podrucje.naziv AS podrucje, slika, korisnik.opis AS opis  FROM korisnik LEFT OUTER JOIN znanstveno_podrucje ON korisnik.znanstveno_podrucje_id = znanstveno_podrucje.znanstveno_podrucje_id WHERE korisnik_id = $znanstvenikId";
$rezultat = izvrsiUpit($veza, $sql);
if ($rezultat){
	if($red = mysqli_fetch_array($rezultat)){
		echo "<img src='{$red["slika"]}' alt='Fotografija znanstvenika'/>";
		echo "<table>";
		echo "<tr><td>Ime</td><td>{$red["ime"]}</td></tr>";
		echo "<tr><td>Prezime</td><td>{$red["prezime"]}</td></tr>";
		echo "<tr><td>Titula</td><td>{$red["titula"]}</td></tr>";
		echo "<tr><td>Radno mjesto</td><td>{$red["radno_mjesto"]}</td></tr>";
		echo "<tr><td>Znanstveno područje</td><td>{$red["podrucje"]}</td></tr>";
		echo "<tr><td>Opis</td><td>{$red["opis"]}</td></tr>";
	}
}
?>
</table>

<?php
include ("footer.php");
?>