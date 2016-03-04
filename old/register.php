<?php
header('Content-type: text/html; charset=utf-8');
//include 'header.php';
include 'config.php';
if (isset($_POST['login']) && $_POST['login']!="")
{
	  $login = $_POST['login'];
	  $login = addslashes($login);
	  $email = $_POST['email'];
	  $email = addslashes($email);
	  $pwd = md5($_POST['pwd']);
	  $pwd = addslashes($pwd);
	  $pwd2 = md5($_POST['pwd2']);
	  $pwd2 = addslashes($pwd2);
	  $reg = ($_POST['reg']);
	if(isset($login) || isset($email) || isset($pwd) || isset($pwd2)
       || $login!="" || $email!="" || $pwd!="" || $pwd2!="")
	{
	  $query = mysql_query("SELECT * FROM `users` WHERE `login`='$login'");
	  
	  if(mysql_num_rows($query)==0) 
	  {
		  if($reg == 'on')
			  {
				if($pwd == $pwd2)
				  {  
				  $activationKey = uniqid;
				  $register = mysql_query("INSERT INTO `users` (`login`, `email` , `password`, `activation_key`)
							VALUES ('$login', '$email', '$pwd', '$activationKey')")
							or die("Wystąpił problem z utworzeniem Twojego konta.");
				
				  if ($register){
					echo("Twoje konto zostało utworzone pomyślnie! Wkrótce otrzymasz odnośnik aktywacyjny");
					

					
					
					}
				  }
				else
				echo("Hasła nie są takie same!");
			  }
			  else
			  echo ("Nie zaakceptowałeś/aś Regulaminu!");
	  }
	  else
		  echo("Nazwa użytkownika jest zajęta. Wybierz inną.");
		
	}
	else
		echo ("Nie wypełniłeś/aś wszystkich pól!");
}
else
{
	?>
	<form action="register.php" method="post">
  	<table>
	    <tr><td>Twój login</td>
	    <td><input type="text" name="login"/></td></tr>
	    <tr><td>E-m@il</td>
	    <td><input type="text" name="email"/></td></tr>
	    <tr><td>Hasło</td>
	    <td><input type="password" name="pwd"/></td>
	    <tr><td>Powtórz hasło</td>
	    <td><input type="password" name="pwd2"/></td>
	    <tr><td>Akceptuję <a href="regulaminkwas.html">Regulamin</a></td>
	    <td><input type="checkbox" name="reg"/></td></tr>
	    <tr><td><input type="submit" value="WYŚLIJ"/></td></tr>
  	</table>
  </form>
  <?
}
?>