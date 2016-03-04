<?php session_start(); 
    require_once 'includes/config.php';
    require_once("includes/f_include.php");
    require_once("includes/f_przyciski.php")
?>
<!DOCTYPE html>
<html>
        
<?php 
    // dołączenie <head> witryny
    include("includes/header.php");

    // dołączenie menu na górze (górna belka)
    include("includes/f_menu.php");
?>
        <!-- Tutaj zaczyna się treść danej podstrony -->
        <!-- Całość jest zawarta w containerze oraz w jednym row -->
        <div class="container">
            <div id="z_panel_calosc" class="row">
                 <?php 
                     // dołącza plik, jaki jest podany w zmiennej $_GET['v'] (pierwszy argument)
                     // jeśli taka zmienna nie istnieje, jest dodawany plik 'tresc/strona_glowna' (drugi argument)
                     dolacz_plik("v", "index2"); 
                 ?>
            </div> 
        </div>    
<?php require 'includes/footer.php';