<?php

echo '<p>Projekt KCP</p>';

if ($user->check()) { // Tylko dla użytkowników zalogowanych
    // Pobierz dane o użytkowniku i zapisz je do zmiennej $userData
    $userData = $user->data();

    echo '<h1>Witaj '.$userData['login'].'!</h1>';
    echo '<p>Możesz zobaczyć swój <a href="profile.php?id='.$userData['id'].'">profil</a> albo się <a href="logout.php">wylogować</a></p>';
	echo '<h2>Rozpocznij <a href="game.php">nową grę</a></h2>';
} else {
    // Widok dla użytkownika niezalogowanego
    echo '<p>Nie jesteś zalogowany.<br><a href="login.php">Zaloguj</a> się lub <a href="register.php">zarejestruj</a> jeśli jeszcze nie masz konta.</p>';
}



