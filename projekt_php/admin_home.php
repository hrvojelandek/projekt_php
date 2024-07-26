<?php
include ("baza.php");
include("zaglavlje.php");

if (! isAdmin()) {
	header("Location: index.php");
	exit();
} 

?>

<h2 style='text-align:center'>Stranica administratora</h2>
<br>
<p style='text-align:right'>Nalazite se na stranici: admin_home.php</p>
<div>
<h3 style='text-align:center'><a href="admin_korisnici.php">Korisnici</a><br>
<br>
<h3 style='text-align:center'><a href="admin_zahtjevi.php">Zahtjevi</a>
<hr></hr>
</div>
<?php
include("footer.php");
?>
