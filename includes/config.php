<?php
/*
   +----------------------------------------------------------------------+
   | Sobak User System 2                                                  |
   +----------------------------------------------------------------------+
   | www.forumweb.pl/a/b/487677                                           |
   +----------------------------------------------------------------------+
   | Ten plik jest częścią skryptu Sobak User System 2 <sobak.pl>         |
   | Integrowanie w treść tego komentarza stanowi naruszenie zasad, na    |
   | których udostępniono kod.                                            |
   +----------------------------------------------------------------------+
*/

$a = "local"; // local - local database
              // remote - remote database (online, on server)

if ($a == "remote") {

$config['db_host'] = 'mysql5.mydevil.net'; // Serwer bazy danych
$config['db_user'] = 'm6770_kcp_game'; // Nazwa użytkownika
$config['db_pass'] = 'lhWtkZJ65lPeE6im6t3a'; // Hasło
$config['db_name'] = 'm6770_kcp_game'; // Nazwa bazy danych

}

else if($a == "local")
{
    $config['db_host'] = 'localhost'; // Serwer bazy danych
$config['db_user'] = 'root'; // Nazwa użytkownika
$config['db_pass'] = ''; // Hasło
$config['db_name'] = 'm6770_kcp_game'; // Nazwa bazy danych
}

// Kodu znajdującego się poniżej prawdopodobnie nie powinieneś dotykać
global $db;
$db = new mysqli($config['db_host'], $config['db_user'], $config['db_pass'], $config['db_name']);

if ($db->errno) {
    die ('<p class="error">Nie udało się połączyć z bazą danych.</p>');
}



require 'password.php';
require 'User.php';
global $user;
$user = new User($db);
