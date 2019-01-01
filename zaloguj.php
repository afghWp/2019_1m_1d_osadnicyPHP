<?php
	require_once "conect.php"; 
	//uzywamy funkcji require_once by tylko raz wykonac czynnosc logowania i ze stopowaniem gdy mamy blad 
	
	
	$polaczenie = new mysqli($host,$db_user,$db_password,$db_name);
	//tworzymy zmienna-obiekt poprzez new bedaca polaczeniem, uzywamy nowej, wspieranej funkcji/konstruktora mysqli kltora laczy baze $host...
	
	if ($polaczenie->connect_errno!=0) //nalezy sprawdzic czy jest polaczenie, jak nie ma to, przejmujemy obsluge bledu
	//jak jest polaczenie to connect_errno jest 0
	{
		echo " Jest blad Error: ".$polaczenie->connect_errno." Opis bledu: ".$polaczenie->connect_error;
	}
	else
	{
		echo "Connect works!!";
		$login=$_POST['login']; //wpisujemy badane login i haslo
		$haslo=$_POST['haslo'];

		echo $login."_  ".$haslo."<br/>";
		
		$polaczenie->close(); //nalezy zamknac polaczenie
	}

?>
