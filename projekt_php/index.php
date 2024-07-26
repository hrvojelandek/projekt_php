<?php
	include ("baza.php");
	include("zaglavlje.php");
	$veza=DBconnect();
?>

		</br>
		<h1 style='text-align:center;'>ZNANSTVENI FORUM KOLEGIJA IWA</h1>
		<h2 style='text-align:center;'>Aplikacija koja služi kao sustav za rasprave sa znanstvenicima</h2>
		<br/>
		<p style='text-align:right'>Nalazite se na početnoj stranici: index.php</p>
		</br>
	<table>
			<thead>
				<tr>
				<th style='text-align: left; width:20%;'>Korisnici sustava</th>
				<th style='text-align: left;'>Mogućnosti korisnika sustava</th>
				</tr>
			</thead>
		<tbody>
			<tr>
				<td>Administrator</td>
				<td>Unosi, pregledava korisnike sustava te definira i ažurira njihove tipove kao i znanstvena područja.</td>
			</tr>
			<tr>
				<td>Moderator/znanstvenik</td>
				<td>Ažurira svoje podatke i šalje zahtjev administratoru da mu odobri znanstveno područje rada. </td>
			</tr>
			<tr>
				<td>Registrirani korisnik</td>
				<td>Pristupa stranici znanstvenih područja, filtrira i piše komentare.</td>
			</tr>
			<tr>
				<td>Neregistrirani korisnik</td>
				<td>Pregledava popis znanstvenika na početnoj stranici.</td>
			</tr>
		</tbody>
	</table>
			<br>
			<br>
		<table align='center' name='popis_znanstvenika' border="1" id='popis_znanstvenika' class='popis_znanstvenika'>
			<caption>
			<h2>Popis znanstvenika</h2>
			<br>
			</caption>
				<thead>
					<tr>
						<th>Fotografija</th>
						<th>Ime</th>
						<th>Prezime</th>
						<th>Titula</th>
					</tr>
				</thead>
				
<?php
	$upit = "SELECT * FROM korisnik WHERE tip_korisnika_id = 1 ORDER BY prezime DESC";
	$rezultat = izvrsiUpit($veza,$upit);
		if($rezultat){
			while($red = mysqli_fetch_array($rezultat)){
				echo "<tr>";
				$_slika= $red["slika"];
				if ($_slika && $_slika != "NULL"){
					echo "<td><img src='{$red["slika"]}' width='75' height='75' alt='Fotografija znanstvenika'/></td>";
				}
				else {
					echo "<td>Nema slike</td>";
				}
				if (isRegistredOrMore()){
					echo "<td>";
					echo "<a href=\"stranica_znanstvenika.php?znanstvenikId={$red["korisnik_id"]}\">";
					echo "{$red["ime"]}</td>";
				} else {
					echo "<td>{$red["ime"]}</td>";
				}
				if (isRegistredOrMore()){
					echo "<td>";
					echo "<a href=\"stranica_znanstvenika.php?znanstvenikId={$red["korisnik_id"]}\">";
					echo "{$red["prezime"]}</td>";
				} else {
					echo "<td>{$red["prezime"]}</td>";
				}
				
				echo "<td>{$red["titula"]}</td>";
			}
		}
?>
		</table>
	</body>
<?php
include("footer.php");
?>