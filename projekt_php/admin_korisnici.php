<?php
include ("baza.php");
include("zaglavlje.php");
$veza=DBconnect();
if (! isAdmin()) {
	header("Location: index.php");
	exit();
} 

$poruka = "";
if ($_SERVER['REQUEST_METHOD'] ==="POST") {
	if ($_REQUEST["akcija"]=="brisi"){
		$user_id = $_REQUEST ["korisnikId"];
		$sql="SELECT count(*) as kulike FROM komentar WHERE korisnik_id = {$user_id}";
		$rezultat = izvrsiUpit($veza, $sql);
		if ($rezultat){
				if ($red=mysqli_fetch_array($rezultat)){
					$brojKomentara = intVal($red["kulike"]);
					if($brojKomentara > 0) {
						$poruka = "Ne možemo obrisati korisnika jer ima komentare";
					} else {
						$sql="DELETE FROM korisnik WHERE korisnik_id = {$user_id}";
						$rezultat = izvrsiUpit($veza, $sql);
						if (! $rezultat){
							$poruka ="Korisnik nije obrisan";
						}
					}
				}
		}
	
	}
	if ($_REQUEST["akcija"]=="toModerator"){
		$user_id = $_REQUEST ["korisnikId"];
		$sql= "UPDATE korisnik SET tip_korisnika_id = 1 where korisnik_id = {$user_id}";
		
		$rezultat = izvrsiUpit($veza,$sql);
		if($rezultat){
			$poruka = "Korisnik je prebacen u moderatora";
		}
		else {
			$poruka = "Greska pri prebacivanju korisnika u moderatora";
		}
	}
	if ($_REQUEST["akcija"]=="toAdministrator"){
		$user_id = $_REQUEST ["korisnikId"];
		$sql= "UPDATE korisnik SET tip_korisnika_id = 0 where korisnik_id = {$user_id}";
		
		$rezultat = izvrsiUpit($veza,$sql);
		if($rezultat){
			$poruka = "Moderator je prebacen u administratora";
		}
		else {
			$poruka = "Greska pri prebacivanju moderatora u administratora";
		}
	}
	if ($_REQUEST["akcija"]=="toKorisnik"){
		$user_id = $_REQUEST ["korisnikId"];
		$sql= "UPDATE korisnik SET tip_korisnika_id = 2 where korisnik_id = {$user_id}";
		
		$rezultat = izvrsiUpit($veza,$sql);
		if($rezultat){
			$poruka = "Administrator je prebačen u korisnika";
		}
		else {
			$poruka = "Greska pri prebacivanju administratora u korisnika";
		}
	}

}
?>
<br>
<table align='center' name='popis_korisnika' border="1" id='popis_korisnika' class='popis_korisnika'>
			<caption>
			<?php
			echo $poruka;
			?>
			<h1>Popis korisnika</h1>
			<p style='text-align:right'>Nalazite se na stranici: admin_korisnici.php</p>
			<a href="admin_novi_korisnik.php">Dodavanje novog korisnika</a>
			</caption>
				<thead>
					<tr>
						<th>Ime</th>
						<th>Prezime</th>
						<th>Korime</th>
						<th>Titula</th>
						<th>Radno mjesto</th>
						<th>Opis</th>
						<th>Vrsta korisnika</th>
						<th>Izmjena korisnika</th>
						<th>Uređivanje</th>
						<th>Brisanje</th>
					</tr>
				</thead>


<?php

$sql= "SELECT korisnik_id, tip_korisnika.naziv as tip, ime, prezime, korime, titula, radno_mjesto, opis, korisnik.tip_korisnika_id as tip_id FROM korisnik inner join tip_korisnika on tip_korisnika.tip_korisnika_id=korisnik.tip_korisnika_id ";
$rezultat = izvrsiUpit($veza,$sql);
	if($rezultat){
			while($red = mysqli_fetch_array($rezultat)){
				$form = "x";
				$korisnikInput = "<input type=\"hidden\" name=\"korisnikId\" value=\"{$red["korisnik_id"]}\"/>";
				if ($red["tip_id"]==2) {
					$vrstaAkcijeInput = "<input type=\"hidden\" name=\"akcija\" value=\"toModerator\"/>";
					$submitInput = "<input class=\"submit\" name=\"submit\" type=\"submit\" value=\"Prebaci u moderator\">";
					$form="<form id=\"moderator\" name=\"moderator\" action=\"admin_korisnici.php\" method=\"POST\"> {$korisnikInput} {$vrstaAkcijeInput} {$submitInput}</form> ";
				}
				if ($red["tip_id"]==1) {
					$vrstaAkcijeInput = "<input type=\"hidden\" name=\"akcija\" value=\"toAdministrator\"/>";
					$submitInput = "<input class=\"submit\" name=\"submit\" type=\"submit\" value=\"Prebaci u administratora\">";
					$form="<form id=\"moderator\" name=\"moderator\" action=\"admin_korisnici.php\" method=\"POST\"> {$korisnikInput} {$vrstaAkcijeInput} {$submitInput}</form> ";
				}
				if ($red["tip_id"]==0) {
					$vrstaAkcijeInput = "<input type=\"hidden\" name=\"akcija\" value=\"toKorisnik\"/>";
					$submitInput = "<input class=\"submit\" name=\"submit\" type=\"submit\" value=\"Prebaci u korisnika\">";
					$form="<form id=\"moderator\" name=\"moderator\" action=\"admin_korisnici.php\" method=\"POST\"> {$korisnikInput} {$vrstaAkcijeInput} {$submitInput}</form> ";
				}
				$vrstaAkcijeBrise = "<input type=\"hidden\" name=\"akcija\" value=\"brisi\"/>";
				$submitBriseInput = "<input class=\"submit\" name=\"submit\" type=\"submit\" value=\"Obrisi\">";
				$brise_form="<form name=\"brise_form\" action=\"admin_korisnici.php\" method=\"POST\"> {$vrstaAkcijeBrise} {$korisnikInput} {$submitBriseInput}</form>";
				echo "<tr>";
				echo "<td>{$red["ime"]}</td>";
				echo "<td>{$red["prezime"]}</td>";
				echo "<td>{$red["korime"]}</td>";
				echo "<td>{$red["titula"]}</td>";
				echo "<td>{$red["radno_mjesto"]}</td>";
				echo "<td>{$red["opis"]}</td>";
				echo "<td>{$red["tip"]}</td>";
				echo "<td>{$form}</td>";
				echo "<td><a href=\"admin_korisnik.php?korisnik_id={$red["korisnik_id"]}\">Uredi</a></td>";
				echo "<td>{$brise_form}</td>";
				"</tr>";
			}
		}

?>
</table>

<?php
include("footer.php");
?>