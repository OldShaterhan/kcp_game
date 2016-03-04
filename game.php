<?php

require 'includes/config.php';
require 'includes/header.php';

if ($user->check()) {
	
	
	if (empty($_POST)) //dlaczego, po wysyłce, POST jest pusty?
	{
		if ($_GET["step"]==2){	
			?>
			<!--<script language="JavaScript">
				
				function change_input_count(theBox) {
				   if (boxesCount+1 > maxBoxes) {
						  alert('Maksimum to ' + maxBoxes + ' rund');
						  return false;
				   }
				   boxesCount++
				   return true;
				}
				function subtract() {
				   boxesCount--
				}
			</script>-->
			<form name="players" action="game.php?step=3">
			Podaj liczbę graczy (2-8): <input type="number" id="players_count" min="2" max="8" onchange=""/><br />
			Podaj imię prowadzącego grę: <input type="text" id="leader"/><br />
			<table>
			<tr><td>Podaj imię 1. gracza drużyny A (kapitana): <input type="text" id="plA1"/></td>
			<td>Podaj imię 2. gracza drużyny A: <input type="text" id="plA2"/></td>
			<td>Podaj imię 3. gracza drużyny A: <input type="text" id="plA3"/></td>
			<td>Podaj imię 4. gracza drużyny A: <input type="text" id="plA4"/></td></tr>
			<tr><td>Podaj imię 1. gracza drużyny B (kapitana): <input type="text" id="plB1"/></td>
			<td>Podaj imię 2. gracza drużyny B: <input type="text" id="plB2"/></td>
			<td>Podaj imię 3. gracza drużyny B: <input type="text" id="plB3"/></td>
			<td>Podaj imię 4. gracza drużyny B: <input type="text" id="plB4"/></td>
			</table>
			<input type="submit" name="send">
			</form>
<?
		}
	}
	else
	{
	
?>
<h2>Wybierz do 8. kategorii</h2>

<script language="JavaScript">
	maxBoxes = 8;
	boxesCount = 1;
	function check(theBox) {
	   if (boxesCount+1 > maxBoxes) {
			  alert('Maksimum to ' + maxBoxes + ' rund');
			  return false;
	   }
	   boxesCount++
	   return true;
	}
	function subtract() {
	   boxesCount--
	}
</script>

<form method="post" action="?step=2">
<label for="kalv1"><input type="checkbox" id="kalv1" onclick="if (this.checked) return check(this); else subtract()" />Kalambury (v.1)</label>
<label for="kalv2"><input type="checkbox" disabled="disabled" id="kalv2" onclick="if (this.checked) return check(this); else subtract()" />Kalambury (v.2)*</label>
<label for="licyt"><input type="checkbox" id="licyt" onclick="if (this.checked) return check(this); else subtract()" />Licytacje</label>
<label for="muz_lic"><input type="checkbox" id="muz_lic" onclick="if (this.checked) return check(this); else subtract()" />Muzyczne licytacje</label>
<label for="urodziny"><input type="checkbox" id="urodziny" onclick="if (this.checked) return check(this); else subtract()" />Urodziny</label>
<label for="kto-kim"><input type="checkbox" id="kto-kim" onclick="if (this.checked) return check(this); else subtract()" />Kto jest kim?</label>
<label for="zakazane"><input type="checkbox" id="zakazane" onclick="if (this.checked) return check(this); else subtract()" />Zakazane słowa</label>
<label for="tv_i_film"><input type="checkbox" id="tv_i_film" onclick="if (this.checked) return check(this); else subtract()" />Cytaty TV i Film</label>
<label for="sport"><input type="checkbox" id="sport" onclick="if (this.checked) return check(this); else subtract()" />Sport</label>
<label for="telewiad"><input type="checkbox" id="telewiad" onclick="if (this.checked) return check(this); else subtract()" />Tele-wiadomości</label>
<label for="pols"><input type="checkbox" id="pols" onclick="if (this.checked) return check(this); else subtract()" />Polszczyzna (v.1)</label>
<label for="polsv2"><input type="checkbox" disabled="disabled" id="polsv2" onclick="if (this.checked) return check(this); else subtract()" />Polszczyzna (v.2)*</label>
<label for="final"><input type="checkbox" disabled="disabled" id="final" checked="checked" />Finał</label><br />

<input type="submit" value="Dalej">
</form>

* - wymaga akcesoriów <br /> 	
	

	
<?
	echo $_GET["step"];
	}
}
else
{
	echo '<p>Musisz wpierw się <a href="login.php">zalogować!</a></p>';
}

?>