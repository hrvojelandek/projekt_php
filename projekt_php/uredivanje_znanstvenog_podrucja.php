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
	$znanstveno_podrucje_id=$_REQUEST["znanstveno_podrucje_id"];
	$naziv=$_REQUEST["naziv"];
	$opis=$_REQUEST["opis"];
$sql= "UPDATE znanstveno_podrucje SET naziv='{$naziv}' , opis='{$opis}' WHERE znanstveno_podrucje_id = {$znanstveno_podrucje_id}";
	$rezultat = izvrsiUpit($veza, $sql);
		if ($rezultat){
			header("Location: znanstveno_podrucje.php?podrucjeId={$znanstveno_podrucje_id}");
			exit();
		}
		else {$greska="Znanstveno područje nije ažurirano";
		}
}





?>

<h1 style='text-align:center'>Stranica uređivanja znanstvenog područja</h1>
<p style='text-align:right'>Nalazite se na stranici: uredivanje_znanstvenog_podrucja.php</p>


<?php
echo "$greska";
?>


<?php
$znanstveno_podrucje = $_REQUEST["znanstveno_podrucje_id"];
$sql= "SELECT * from znanstveno_podrucje WHERE znanstveno_podrucje_id = {$znanstveno_podrucje}";
$rezultat = izvrsiUpit($veza, $sql);
if ($rezultat){
	if($red = mysqli_fetch_array($rezultat)){
		$naziv=$red["naziv"];
		$opis=$red["opis"];
	}
}
?>

<form form id="znanstveno_podrucje" name="znanstveno_podrucje" method="POST" action="uredivanje_znanstvenog_podrucja.php">
	<table name="znanstveno_podrucje" class="znanstveno_podrucje">
		<tr>
			<td>Naziv</td>
			<td>
			<?php
			echo "<input type=\"text\" name=\"naziv\" value=\"{$naziv}\" id=\"naziv\" size=\"40\" autofocus=\"autofocus\"/>";
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
	</table><br>
	<?php
	echo "<input type=\"hidden\" name=\"znanstveno_podrucje_id\" value=\"{$znanstveno_podrucje}\" />";
	
	?>
<input class="submit" name="submit" type="submit" value="Pošalji">


</form>

<?php
include ("footer.php");
?>