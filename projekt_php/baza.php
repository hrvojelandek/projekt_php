<?php
session_start();

define("POSLUZITELJ","localhost");
define("BAZA","iwa_2021_sk_projekt");
define("BAZA_KORISNIK","iwa_2021");
define("BAZA_LOZINKA","foi2021");


function DBconnect(){
	$veza = mysqli_connect(POSLUZITELJ,BAZA_KORISNIK,BAZA_LOZINKA);
	
	if(!$veza){
		echo "GREŠKA: 
		Problem sa spajanjem u datoteci baza.php funkcija otvoriVezu:  
		".mysqli_connect_error();
	}
	
	mysqli_select_db($veza,BAZA);
	
	if(mysqli_error($veza)!==""){
		echo "GREŠKA: 
		Problem sa odabirom baze u baza.php funkcija otvoriVezu:  
		".mysqli_error($veza);
	}
	
	mysqli_set_charset($veza,"utf8");
	
	if(mysqli_error($veza)!==""){
		echo "GREŠKA: 
		Problem sa odabirom baze u baza.php funkcija otvoriVezu:  
		".mysqli_error($veza);
	}
	
	return $veza;
}

function izvrsiUpit($veza, $upit){
	
	$rezultat = mysqli_query($veza,$upit);
	
	if(mysqli_error($veza)!==""){
		echo "GREŠKA: 
		Problem sa upitom: ".$upit." : u datoteci baza.php funkcija izvrsiUput:  
		".mysqli_error($veza);
	}
	
	return $rezultat;
}

function DBclose($veza){
	mysqli_close($veza);
}	

function isAdmin() {
	if (array_key_exists('tip_korisnika_id', $_SESSION)) {
		if ($_SESSION['tip_korisnika_id'] == '0') {
			return true;
		}
	}
	return false;
}

function isRegistredOrMore(){
	if (array_key_exists('tip_korisnika_id', $_SESSION)) {
			return true;
		
	}
	return false;
}

function getKorisnikId(){
	if (array_key_exists('korisnik_id', $_SESSION)){
		return $_SESSION['korisnik_id'];
	}
	return null;
	
}

function isModerator(){
	if (array_key_exists ('tip_korisnika_id', $_SESSION)){
		if ($_SESSION['tip_korisnika_id']=='1'){
			return true;
		}
	}
	return false;
}

?>