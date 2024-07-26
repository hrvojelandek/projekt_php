<?php
include ("baza.php");
include ("zaglavlje.php");
$veza=DBconnect();
if (! isRegistredOrMore()) {
	header("Location: index.php");
	exit();
} 

$poruka = "";
if ($_SERVER['REQUEST_METHOD']=== "POST")
{
	if (isAdmin()) {
		$brisiId= $_REQUEST["brisi_Id"];
		$sql="DELETE FROM komentar WHERE znanstveno_podrucje_id={$brisiId}";
		$rezultat=izvrsiUpit($veza, $sql);
		if ($rezultat){
			$sql="DELETE FROM znanstveno_podrucje WHERE znanstveno_podrucje_id={$brisiId}";
			$rezultat=izvrsiUpit($veza, $sql);
			if (! $rezultat){
				$poruka="Znanstveno područje nije obrisano";
			}
		} else {
		$poruka = "Znanstveno podrucje nije obrisano!";
		}
	}
}
?>


<br>
<br>
<h1 style='text-align:center;'>Popis znanstvenih područja</h1>
<p style='text-align:right'>Nalazite se na stranici: znanstvena_podrucja.php</p>
<br>
<div>
<?php
if (isAdmin()){
echo "<a href=\"uredivanje_novog_podrucja.php\">Stranica uređivanja novog područja</a>";
}
?>
</div>
<?php
echo "$poruka";
?>

<table align='center' name='znanstvena_podrucja' border="1" id='znanstvena_podrucja' class='znanstvena_podrucja'>
	<thead>
		<tr>
			<th>Naziv</th> 
			<th>Opis</th>
			<?php 
			if (isAdmin()){
				echo "<th>Brisanje</th>";
			}
			
			?>
		</tr>
	</thead>
	
	<?php
	$sql= "SELECT znanstveno_podrucje.znanstveno_podrucje_id as id, naziv, opis FROM znanstveno_podrucje LEFT OUTER join komentar on znanstveno_podrucje.znanstveno_podrucje_id = komentar.znanstveno_podrucje_id"; 
	$rezultat = izvrsiUpit($veza,$sql);
	
	if($rezultat){
			while($red = mysqli_fetch_array($rezultat)) {
				
				echo "<tr>";
					echo "<td><a href=\"znanstveno_podrucje.php?podrucjeId={$red["id"]}\">{$red["naziv"]}</a></td>";
					echo "<td>{$red["opis"]}</td>";
					if (isAdmin()){
						echo "<td> <form id=\"brisanje_podrucja\" name=\"brisanje_podrucja\" method=\"POST\" action=\"znanstvena_podrucja.php\">";
						$brise_podrucja = "<input type=\"hidden\"  name=\"akcija\" value=\"brisi\"/>";
						echo "<input type=\"hidden\" name= \"brisi_Id\" value=\"{$red["id"]}\"/>";
						echo "<input class=\"submit\" name=\"submit\" type=\"submit\" value=\"Obriši\"</input>";
						echo "{$brise_podrucja}";
						echo "</form>";
						echo "</td>";
					}
				echo "</tr>";
				
			}
	}
	
?>
</table>

<?php
include ("footer.php");
?>