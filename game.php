<?php

require 'includes/config.php';
require 'includes/header.php';

if ($user->check()) {
	
	
	if (!empty($_POST)) //dlaczego, po wysyłce, POST jest pusty?
	{
		if ($_GET["step"]==2){	
			?>
			
			
			<<script type="text/javascript" src="//code.jquery.com/jquery-1.9.1.js"></script>

			<script type='text/javascript'> //Wyświetla odpowiednią liczbę pól do podania danych graczy
				$(window).load(function(){
					$('#players_count').change(function() { //Sprawdza zmianę wartości pola input id="players_count"
					   if ($(this).val() <= 7) {
						   $('#plB4_div').hide();
					   }
					   else {
						   $('#plB4_div').show();
					   }
					   if ($(this).val() <= 6) {
						   $('#plA4_div').hide();
					   }
					   else {
						   $('#plA4_div').show();
					   }
					   
					   if ($(this).val() <= 5) {
						   $('#plB3_div').hide();
					   }
					   else {
						   $('#plB3_div').show();
					   }
					   
					   if ($(this).val() <= 4) {
						   $('#plA3_div').hide();
					   }
					   else {
						   $('#plA3_div').show();
					   }
					   
					   if ($(this).val() <= 3) {
						   $('#plB2_div').hide();
					   }
					   else {
						   $('#plB2_div').show();
					   }
					   
					   if ($(this).val() == 2) {
						   $('#plA2_div').hide();
					   }
					   else {
						   $('#plA2_div').show();
					   }
					   
					});
				});
			</script>
			
			<style>
			.players_rows {
				width: 25%;
			}
			</style>
			
			<form name="players" action="game.php?step=3">
			Podaj liczbę graczy (2-8): <input type="number" id="players_count" min="2" max="8" onchange="" value="8"/><br />
			Podaj imię prowadzącego grę: <input type="text" id="leader"/><br />
			<table>
			<tr><td class="players_rows">Podaj imię 1. gracza drużyny A (kapitana): <input type="text" id="plA1_name"/></td>
			<td td class="players_rows"><div id="plA2_div">Podaj imię 2. gracza drużyny A: <input type="text" id="plA2_name"/></div></td>
			<td td class="players_rows"><div id="plA3_div">Podaj imię 3. gracza drużyny A: <input type="text" id="plA3_name"/></div></td>
			<td td class="players_rows"><div id="plA4_div">Podaj imię 4. gracza drużyny A: <input type="text" id="plA4_name"/></div></td></tr>
			<tr><td td class="players_rows">Podaj imię 1. gracza drużyny B: <input type="text" id="plB1_name"/></td>
			<td td class="players_rows"><div id="plB2_div">Podaj imię 2. gracza drużyny B: <input type="text" id="plB2_name"/></div></td>
			<td td class="players_rows"><div id="plB3_div">Podaj imię 3. gracza drużyny B: <input type="text" id="plB3_name"/></div></td>
			<td td class="players_rows"><div id="plB4_div">Podaj imię 4. gracza drużyny B: <input type="text" id="plB4_name"/></div></td>
			</table>
			<input type="submit" name="send">
			</form>
<?php
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

<form method="post" action="game.php?step=2">
<label for="kalv1"><input type="checkbox" id="kalv1" name="kalv1 "onclick="if (this.checked) return check(this); else subtract()" />Kalambury (v.1)</label>
<label for="kalv2"><input type="checkbox" id="kalv2" name="kalv2" onclick="if (this.checked) return check(this); else subtract()" disabled="disabled"/>Kalambury (v.2)*</label>
<label for="licyt"><input type="checkbox" id="licyt" name="licyt" onclick="if (this.checked) return check(this); else subtract()" />Licytacje</label>
<label for="muz_lic"><input type="checkbox" id="muz_lic" name="muz_lic" onclick="if (this.checked) return check(this); else subtract()" />Muzyczne licytacje</label>
<label for="urodziny"><input type="checkbox" id="urodziny" name="urodziny" onclick="if (this.checked) return check(this); else subtract()" />Urodziny</label>
<label for="kto-kim"><input type="checkbox" id="kto-kim" name="kto-kim" onclick="if (this.checked) return check(this); else subtract()" />Kto jest kim?</label>
<label for="zakazane"><input type="checkbox" id="zakazane" id="zakazane" onclick="if (this.checked) return check(this); else subtract()" />Zakazane słowa</label>
<label for="tv_i_film"><input type="checkbox" id="tv_i_film" id="tv_i_film" onclick="if (this.checked) return check(this); else subtract()" />Cytaty TV i Film</label>
<label for="sport"><input type="checkbox" id="sport" name="sport" onclick="if (this.checked) return check(this); else subtract()" />Sport</label>
<label for="telewiad"><input type="checkbox" id="telewiad" name="telewiad" onclick="if (this.checked) return check(this); else subtract()" />Tele-wiadomości</label>
<label for="pols"><input type="checkbox" id="pols" name="pols" onclick="if (this.checked) return check(this); else subtract()" />Polszczyzna (v.1)</label>
<label for="polsv2"><input type="checkbox" id="polsv2" name="polsv2" onclick="if (this.checked) return check(this); else subtract()" disabled="disabled"/>Polszczyzna (v.2)*</label>
<label for="final"><input type="checkbox" id="final" name="final" checked="checked" disabled="disabled"/>Finał</label><br />

<input type="submit" value="Dalej">
</form>

* - wymaga akcesoriów <br /> 	
	

	
<?php
	echo $_GET["step"];
	}
}
else
{
	echo '<p>Musisz wpierw się <a href="login.php">zalogować!</a></p>';
}

?>