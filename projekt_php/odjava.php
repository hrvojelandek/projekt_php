<?php
include ("baza.php");
unset($_SESSION['ime']);
unset($_SESSION['prezime']);
unset($_SESSION['naziv']);
unset($_SESSION['korisnicko_ime']);
unset($_SESSION['korisnik_id']);
unset($_SESSION['tip_korisnika_id']);

include("zaglavlje.php");
?>
<br>
<h1 style='text-align:center'> Uspješno ste odjavljeni!</h1>
<p style='text-align:right'>Nalazite se na stranici: odjava.php</p>

<br>
<?php
	include("footer.php");
?>