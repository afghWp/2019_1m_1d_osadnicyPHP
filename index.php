<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
	<title>moja gra pod tytułem "osadnicy"</title>
</head>

<body>
	<h4>
		Ludzie chcą, by historia była do nich podobna, względnie żeby była podobna przynajmniej do ich snów.<br/>
		Na szczęście zdarza im się czasem, że mają wielkie sny.<br/>
		<h5>Charles de Gaulle</h5>
	</h4> <br/>
	
	<!--tworzymy formularz form dlatego by miec blok i moc przeslac z jego dane do drugiej strony zaloguj.php metoda post-schowanym tekstem-->
	<form action="zaloguj.php" method="post">
		Podaj login:  <input type="text" name="login" /> <br/> <br/>
		<!-- wczytujemy dane poprzez pola input login odkrytym tekstem, haslo maskowane-->
		Podaj hasło:  <input type="password" name="haslo" /> <br/>
		<input type="submit" value="Zaloguj się" /> <!--submit to przycisk z napisem value -->
	</form>


</body>
</html> 
