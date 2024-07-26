<?php
include ("baza.php");
include ("zaglavlje.php");
$veza=DBconnect();

if (! isAdmin()){
	header("Location: index.php");
	exit(); 
}
$greska="";
if (array_key_exists("odobri_podrucje_id",$_REQUEST)) {
	$podrucjeId=$_REQUEST["odobri_podrucje_id"];
	$moderatorId =$_REQUEST["moderator_id"];	
	$sql="UPDATE zahtjev_podrucja SET status=1 WHERE znanstveno_podrucje_id={$podrucjeId} AND moderator_id={$moderatorId}";
	$rezultat = izvrsiUpit($veza, $sql);
	if ($rezultat){
		$sql="UPDATE korisnik SET znanstveno_podrucje_id={$podrucjeId} WHERE korisnik_id={$moderatorId}";
		$rezultat=izvrsiUpit($veza, $sql);
		if (! $rezultat){
			$greska="Zahtjev nije odobren";
		}
	}
	else {
		$greska="Zahtjev nije odobren";
	}
}

if (array_key_exists("odbaci_podrucje_id",$_REQUEST)) {
	$podrucjeId=$_REQUEST["odbaci_podrucje_id"];
	$moderatorId =$_REQUEST["moderator_id"];	
	$sql="UPDATE zahtjev_podrucja SET status=0 WHERE znanstveno_podrucje_id={$podrucjeId} AND moderator_id={$moderatorId}";
	$rezultat = izvrsiUpit($veza, $sql);
	if (! $rezultat){
		$greska="Zahtjev nije odbijen";
	}
}
?>

<h2 style='text-align:center'>Popis zahtjeva</h2>
<p style='text-align:right'>Nalazite se na stranici: admin_zahtjevi.php</p>

<?php
echo "$greska";
?>

<table>
	<thead>
		<tr>
			<th>Korisničko ime</th>
			<th>Ime</th>
			<th>Prezime</th>
			<th>Znanstveno područje</th>
			<th>Odabir</th>
			<th>Odabir</th>
		</tr>
	</thead>
	<tbody>
<?php
$sql="SELECT korime, ime, prezime, naziv, moderator_id, znanstveno_podrucje.znanstveno_podrucje_id as zpid  FROM zahtjev_podrucja INNER JOIN korisnik ON zahtjev_podrucja.moderator_id = korisnik.korisnik_id INNER JOIN znanstveno_podrucje ON zahtjev_podrucja.znanstveno_podrucje_id = znanstveno_podrucje.znanstveno_podrucje_id  WHERE status=2";
$rezultat = izvrsiUpit($veza,$sql);
	
	if($rezultat){
			while($red = mysqli_fetch_array($rezultat)) {
				$podrucje_id=$red["zpid"];
				$moderator_id=$red["moderator_id"];
				echo "<tr>";
					echo "<td>{$red["korime"]}</td>";
					echo "<td>{$red["ime"]}</td>";
					echo "<td>{$red["prezime"]}</td>";
					echo "<td>{$red["naziv"]}</td>";
					echo "<td><a href=\"admin_zahtjevi.php?odobri_podrucje_id=$podrucje_id&moderator_id=$moderator_id\">Odobri</a></td>";
					echo "<td><a href=\"admin_zahtjevi.php?odbaci_podrucje_id=$podrucje_id&moderator_id=$moderator_id\">Odbaci</a></td>";
					echo "</tr>";
			}
	}
?>
</tbody>
</table>
<?php
include ("footer.php");
?>