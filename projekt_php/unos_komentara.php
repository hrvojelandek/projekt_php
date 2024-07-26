<?php
include ("baza.php");
include ("zaglavlje.php");
$veza=DBconnect();
if (! isRegistredOrMore()) {
	header("Location: index.php");
	exit();
} 
$greska="";
if ($_SERVER['REQUEST_METHOD'] ==="POST") {
	$komentar=$_REQUEST["komentar"];
	$podrucjeId=$_REQUEST["podrucjeId"];
	$korisnikId=getKorisnikId();
	$sqlKorisnik= "SELECT znanstveno_podrucje_id FROM korisnik WHERE korisnik_id ={$korisnikId}";
	$rezultat = izvrsiUpit($veza,$sqlKorisnik);
	$komentar_znanstvenika=0;
	if($rezultat){
		if ($red = mysqli_fetch_array($rezultat)){
			if ($red['znanstveno_podrucje_id'] === $podrucjeId) {
				$komentar_znanstvenika=1;
			}
		}
	}
	$sql= "INSERT into komentar (znanstveno_podrucje_id, korisnik_id, sadrzaj, komentar_znanstvenika) VALUES ({$podrucjeId},{$korisnikId}, \"{$komentar}\", {$komentar_znanstvenika})";
	$rezultat = izvrsiUpit($veza,$sql);
		if($rezultat){
			header("Location: znanstveno_podrucje.php?podrucjeId={$podrucjeId}");
			exit();
		}
		else {
			$greska = "Greška pri unosu komentara";
		}
}

?>
<h2 style='text-align:center'>Stranica za unos komentara</h2>
<p style='text-align:right'>Nalazite se na stranici: unos_komentara.php</p>
<form form id="komentar" name="komentar" method="post" action="unos_komentara.php">
<p>
<label for="komentar">Komentar:</label></p>
  <textarea id="komentar" name="komentar" rows="4" cols="50" placeholder="Ovdje upišite svoj komentar..."></textarea>
  <br>
  <input type="submit" value="Pošalji"> 
  
<?php
echo "<input type=\"hidden\" id=\"podrucjeId\" name=\"podrucjeId\" value=\"{$_REQUEST["podrucjeId"]}\">";
echo $greska;

?>
<hr></hr>
</form>

<?php
include ("footer.php");
?>