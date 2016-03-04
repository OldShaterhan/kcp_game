<?php
	// Na samej górze zadeklaruj sesję.
	//session_start();
	// Sekcja wylogowywania, kasuje wszystkie zmienne sesyjne
	//session_destroy();
		$message="Wylogowałeś się"; // Wiadomość po wylogowaniu
	//header('Content-type: text/html; charset=utf-8');
	   
	// Sekcja logowania
	if (isset($_POST['login']) && $_POST['login']!="") {
		// W momencie kliknięcia w przycisk formularza
		$login = $_POST['login'];
		$login = addslashes($login);
		$login = htmlspecialchars($login);
		$password = md5($_POST['passsword']);
		$password = addslashes($password);
		// Koduje hasło funkcją md5().
	 
		$errors;
			
		// sprawdzenie czy istnieje uzytkownik o takim nicku i hasle
		$if_log = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM `users` WHERE login = '$login' AND password = '$haslo'")); 
		
		// jesli nie ma takiego loginu albo haslo sie nie zgadza, wyswietlamy blad
		if ($if_log[0] == 0) 
		{
			$errors[] = 'Niepoprawne dane logowania !';
		} 
	// Połączenie z bazą.
	include 'config.php';
	// Sprawdzenie nazwy użytkownika i hasła.
	  $result=mysql_query("select * FROM `users` WHERE `login`='$login' AND `password`='$pwd'");
		if(@mysql_num_rows($rezultat)){
	        $_SESSION['zalogowany'] = TRUE;
            $_SESSION['login'] = $login;

			while($r = mysql_fetch_assoc($wynik)) 
            {
                $_SESSION['id_usera'] = $r['id'];    
                $_SESSION['login'] = $r['login'];
                $_SESSION['email'] = $r['email'];
				$_SESSION['admin'] = $r['admin'];
            }  
	  }
	  else {
	  $message="Nieprawidłowa nazwa użytkownika i/lub hasło";
	  }
	} // Koniec sprawdzania autoryzacji.
?>





<!--<? echo $message; ?>-->

<form id="form1" name="form1" method="post" action="<? echo $PHP_SELF; ?>">
  <table>
    <tr>
      <td>Login: </td>
      <td><input name="login" type="text" id="login" /></td>
    </tr>
    <tr>
      <td>Hasło: </td>
      <td><input name="pwd" type="password" id="password" /></td>
    </tr>
  </table>
<input type="submit" value="Zaloguj" />
</form>