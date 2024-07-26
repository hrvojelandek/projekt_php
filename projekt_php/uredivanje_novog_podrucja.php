<?php
include ("baza.php");
include ("zaglavlje.php");
$veza=DBconnect();
if (! isAdmin()){
	header("Location: index.php");
	exit(); 
}
$greska="";
if ($_SERVER['REQUEST_METHOD']=== "POST"){
$naziv=$_REQUEST["naziv_podrucja"];
$opis=$_REQUEST["opis_podrucja"];
$sql= "INSERT INTO znanstveno_podrucje (naziv, opis) VALUES ('$naziv', '$opis')";

$rezultat = izvrsiUpit($veza, $sql);
		if ($rezultat){
			header("Location: znanstvena_podrucja.php");
			exit();
		}
		else {$greska="Znanstveno područje nije dodano";
		}
}

?>

<h1 style='text-align:center'>Uređivanje novog područja</h1>
<p style='text-align:right'>Nalazite se na stranici: uredivanje_novog_podrucja.php</p>

<?php
echo "$greska";
?>

<form id="uredivanje_podrucja" name="uredivanje_podrucja" method="POST" action="uredivanje_novog_podrucja.php">
<table name="uredivanje_podrucja" class="uredivanje_podrucja">
	<tr>
		<td>Naziv</td>
		<td><input type="text" name="naziv_podrucja" id="naziv_podrucja"> </td>
	</tr>
	<tr>
		<td>Opis</td>
		<td><input type="text" name="opis_podrucja" id="opis_podrucja"></td>
	</tr>
</table>
<input class="submit" name="submit" type="submit" value="Pošalji">
</form>

<?php
include ("footer.php");
?>