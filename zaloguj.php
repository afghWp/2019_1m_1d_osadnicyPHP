<?php
	require_once "conect.php"; 
	//uzywamy funkcji require_once by tylko raz wykonac czynnosc logowania i ze stopowaniem gdy mamy blad 
	
	
	$polaczenie = @new mysqli($host,$db_user,$db_password,$db_name);
	//tworzymy zmienna-obiekt poprzez new bedaca polaczeniem, uzywamy nowej, wspieranej funkcji/konstruktora mysqli kltora laczy baze $host...	
	//$polaczenie = @new mysqli($host,$db_user,$db_password,$db_name);
	//aby nie bylo wypisywania bledow trzeba dac @ przed new
	//tak bedzie wypisanie bledow  $polaczenie = @new mysqli($host,$db_user,$db_password,$db_name);
	
	
	if ($polaczenie->connect_errno!=0) //nalezy sprawdzic czy jest polaczenie, jak nie ma to, przejmujemy obsluge bledu
	//jak jest polaczenie to connect_errno jest 0
	{
		echo " Jest blad Error: ".$polaczenie->connect_errno;
	}
	else
	{
		echo "Connect works!!";
		$login=$_POST['login']; //wpisujemy badane login i haslo
		$haslo=$_POST['haslo'];

		$sql = "SELECT * FROM uzytkownicy WHERE user='$login' AND pass='$haslo'";
		//tworzymy ciag z zapytaniem, dajemy $login i $haslo w '' bo to lancuch
		
		if ( $rezultat = $polaczenie -> query($sql) )
		//$rezultat to wynik zapytania, dajemy @ by nie pokazywac bledow, metoda query( trescZapytania ) wykonuje zapytanie 
		//dajemy w i bo jezeli zapytanie sie nie wykona to $rezultat bedzie false, ale nie to ze nie takiego uzytkownika i hasla, ale inny blad
		{
			echo "<br/>"."zapytanie wykonano ok";
			$ilu_userow = $rezultat -> num_rows;
			//tworzymy zmienna ktora mowi czy jest choc jeden zalogowany uzytkownik-poprzez ilosc zwroconych wierszy w zapytaniu
			if ($ilu_userow>0)
			//jest przynajmniej jeden wiersz pasujacy z loginem i haslem w bazie
			{
				echo "<br/>"."jest tylu uzytkownikow z tym loginem i haslem ".$ilu_userow;
				$wiersz = $rezultat -> fetch_assoc();
				//tworzymy poprzez funkcje fetch_assoc tabele asocjacyjna z kolumnami jak w bazie i danymi z zapytania. fetch pojsc po cos
				//tablica assocjacyjan to taka tablica ktora zamiast cyfr indexu w kolumnach ma nazwy kolumn jak baza np $wiersz['pass'] lub $wiersz['drewno']
				echo "<br/>".$wiersz['user']." ".$wiersz['pass']." ".$wiersz['email'];	
				
				
				$rezultat -> close();
				//po wyciagnieciu zapytania i wykorzystaniu danych nalezy zwolnic zmienna rezultat poprzez close() lub free() /zwolnij pamiec/ lub free_result()
				//
				
				
			} else
			{
				echo "<br/>"."nie ma zadnego uzytkownika z tym loginem i haslem";
			}

				
		}
		else
		{
			echo "blad w zapytaniu";
		}
		
		
		$polaczenie->close(); //nalezy zamknac polaczenie
	}

?>
