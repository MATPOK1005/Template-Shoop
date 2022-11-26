<!DOCTYPE html>
<?php
if(!isset($_COOKIE['user'])){
    header("Location:http://localhost/mateuszPokorniecki3P/projektSklep/konto.php");
}
$userCartCookie = "cart" . $_COOKIE['user'];
$currentCart = explode(",", $_COOKIE[$userCartCookie]);
if(isset($_POST['buttonUsun0'])){
    $currentCart[0]--;
    setcookie($userCartCookie, implode(",", $currentCart), time() + (86400 * 365 * 5), "/");
    header("Location:http://localhost/mateuszPokorniecki3P/projektSklep/koszyk.php");
}
if(isset($_POST['buttonUsun1'])){
    $currentCart[1]--;
    setcookie($userCartCookie, implode(",", $currentCart), time() + (86400 * 365 * 5), "/");
    header("Location:http://localhost/mateuszPokorniecki3P/projektSklep/koszyk.php");
}
if(isset($_POST['buttonUsun2'])){
    $currentCart[2]--;
    setcookie($userCartCookie, implode(",", $currentCart), time() + (86400 * 365 * 5), "/");
    header("Location:http://localhost/mateuszPokorniecki3P/projektSklep/koszyk.php");
}

if(isset($_POST['buttonKup'])){
    $currentCart = [0,0,0];
    setcookie($userCartCookie, implode(",", $currentCart), time() + (86400 * 365 * 5), "/");
    header("Location:http://localhost/mateuszPokorniecki3P/projektSklep/koszyk.php");
}
?>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylKoszyk.css">
    <title>Koszyk</title>
</head>
<body>
    <section id="baner">
        <h1>KSIĘGARNIA</h1>
    </section>
    <section id="nav">
    <div id="navc1">Twój Koszyk</div>
    <form action="http://localhost/mateuszPokorniecki3P/projektSklep/zalogowany.php" method="post" id="navc2">
        <input type="submit" value="Wróć" name="buttonWroc" class="nacButton">
    </form>
    <form action="http://localhost/mateuszPokorniecki3P/projektSklep/zalogowany.php" method="post" id="navc3">
        <input type="submit" value="Wyloguj" name="buttonWyloguj" class="nacButton">
    </form>
    <?php
        $userCartCookie = "cart" . $_COOKIE['user'];
        $currentCart = explode(",", $_COOKIE[$userCartCookie]);
        $cartHasItems = false;
        for($i = 0; $i < sizeof($currentCart); $i++){
            if($currentCart[$i] != 0){
                $cartHasItems = true;
            }
        }
        if($cartHasItems){
            echo '<form action="http://localhost/mateuszPokorniecki3P/projektSklep/koszyk.php" method="post" id="navc2">
                    <input type="submit" value="Kup Książki" name="buttonKup" class="nacButton">
                </form>';
        }
    ?>
    </section>
    <section id="main">
    <?php
        $userCartCookie = "cart" . $_COOKIE['user'];
        $currentCart = explode(",", $_COOKIE[$userCartCookie]);
        $cartHasItems = false;
        for($i = 0; $i < sizeof($currentCart); $i++){
            if($currentCart[$i] != 0){
                $cartHasItems = true;
            }
        }
        if($cartHasItems){
            if($currentCart[0] != 0){
                echo '<div class="produkt">
                        <p class="produktc2"><img src="obrazy/januszSiuda.png" alt="obrazek" class="produktc1">Gramatyka Angielska do testów i egzaminów - Janusz Siuda Ilość: ' . $currentCart[0] . '</p>
                        <form action="http://localhost/mateuszPokorniecki3P/projektSklep/koszyk.php" method="post" id="navc3">
                            <input type="submit" value="Usuń" name="buttonUsun0" class="nacButton">
                        </form>
                    </div>';
            }
            if($currentCart[1] != 0){
                echo '<div class="produkt">
                        <p class="produktc2"><img src="obrazy/biblia.jfif" alt="obrazek" class="produktc1">Pismo Święte - Bóg(Nie istnieje(Przewodnik jest ateistą)) ft. Nietrzeźwi apostołowie Ilość: ' . $currentCart[1] . '</p>
                        <form action="http://localhost/mateuszPokorniecki3P/projektSklep/koszyk.php" method="post" id="navc3">
                            <input type="submit" value="Usuń" name="buttonUsun1" class="nacButton">
                        </form>
                    </div>';
            }
            if($currentCart[2] != 0){
                echo '<div class="produkt">
                        <p class="produktc2"><img src="obrazy/bazyDanych.jfif" alt="obrazek" class="produktc1">Tworzenie i administrowanie bazami danych - Jolanta Pokorska Ilość: ' . $currentCart[2] . '</p>
                        <form action="http://localhost/mateuszPokorniecki3P/projektSklep/Koszyk.php" method="post" id="navc3">
                            <input type="submit" value="Usuń" name="buttonUsun2" class="nacButton">
                        </form>
                    </div>';
            }
        }else{
            echo '<h2>Koszyk pusty :(</h2>';
        }
    ?>
    </section>
    <section id="stopka">
        <p id="autorStrony">Autor strony: Mateusz Pokorniecki 3P</p>
    </section>
</body>
</html>