<?php
$pagename = "KCP game";
$web_url = "http://kcp.2ap.pl/";
$db = @mysql_connect('mysql5.mydevil.net', 'm6770_kcp_game', 'lhWtkZJ65lPeE6im6t3a');
mysql_select_db ("m6770_kcp_game");
mysql_query('SET NAMES "utf8"');
if (mysqli_connect_errno() != 0){
	echo '<p>Wystąpił błąd połączenia: ' . mysqli_connect_error() . '</p>';
}
else {
	// tutaj kod wykonywany, gdy zostało uzyskane połączenie z bazą
}
?>