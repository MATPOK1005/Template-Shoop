<!DOCTYPE html>
<?php
$userCartCookie = "cart" . $_COOKIE['user'];
if(isset($_COOKIE[$userCartCookie])){
    $currentCart = explode(",", $_COOKIE[$userCartCookie]);
}else{
    $currentCart = [0,0,0];
    setcookie($userCartCookie, implode(",", $currentCart), time() + (86400 * 365 * 5), "/");
}
if(isset($_POST['buttonWyloguj'])){
    setcookie("user", "", time() - (86400 * 30), "/");
    header("Location:http://localhost/mateuszPokorniecki3P/projektSklep/konto.php");
}
if(isset($_POST['buttonKoszyk'])){
    header("Location:http://localhost/mateuszPokorniecki3P/projektSklep/koszyk.php");
}

if(isset($_POST['buttonDodaj0'])){
    $currentCart[0]++;
    setcookie($userCartCookie, implode(",", $currentCart), time() + (86400 * 365 * 5), "/");
}
if(isset($_POST['buttonDodaj1'])){
    $currentCart[1]++;
    setcookie($userCartCookie, implode(",", $currentCart), time() + (86400 * 365 * 5), "/");
}
if(isset($_POST['buttonDodaj2'])){
    $currentCart[2]++;
    setcookie($userCartCookie, implode(",", $currentCart), time() + (86400 * 365 * 5), "/");
}

$regularUserCookie = "regular" . $_COOKIE['user'];
function setClientAsRegular() {
    $regularUserCookie = "regular" . $_COOKIE['user'];
    setcookie($regularUserCookie, "true", time() + (86400 * 365 * 5), "/");
}
?>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Księgarnia</title>
    <link rel="stylesheet" href="stylZalogowany.css">
</head>
<body>
    <section id="baner">
        <h1>KSIĘGARNIA</h1>
    </section>
    <section id="nav">
    <?php
    if(isset($_COOKIE['user'])){
        if(isset($_COOKIE[$regularUserCookie])) {
            echo '<div id="navc1">Witaj ponownie: ' . $_COOKIE['user'] . '</div>';
        } else {
            echo '<div id="navc1">Witaj w KSIĘGARNI: ' . $_COOKIE['user'] . '</div>';
            setClientAsRegular();
        }
    }else{
        header("Location:http://localhost/mateuszPokorniecki3P/projektSklep/konto.php");
    }
    ?>
    <form action="http://localhost/mateuszPokorniecki3P/projektSklep/koszyk.php" method="post" id="navc2">
        <input type="submit" value="Koszyk" name="buttonKoszyk" class="nacButton">
    </form>
    <form action="http://localhost/mateuszPokorniecki3P/projektSklep/zalogowany.php" method="post" id="navc3">
        <input type="submit" value="Wyloguj" name="buttonWyloguj" class="nacButton">
    </form>
    </section>
    <section id="main">
        <div class="produkt">
            <p class="produktc2"><img src="obrazy/januszSiuda.png" alt="obrazek" class="produktc1">Gramatyka Angielska do testów i egzaminów - Janusz Siuda</p>
            <form action="http://localhost/mateuszPokorniecki3P/projektSklep/zalogowany.php" method="post" id="navc3">
                <input type="submit" value="Dodaj" name="buttonDodaj0" class="nacButton">
            </form>
        </div>
        <div class="produkt">
            <p class="produktc2"><img src="obrazy/biblia.jfif" alt="obrazek" class="produktc1">Pismo Święte - Bóg(Nie istnieje(Przewodnik jest ateistą)) ft. Nietrzeźwi apostołowie</p>
            <form action="http://localhost/mateuszPokorniecki3P/projektSklep/zalogowany.php" method="post" id="navc3">
                <input type="submit" value="Dodaj" name="buttonDodaj1" class="nacButton">
            </form>
        </div>
        <div class="produkt">
            <p class="produktc2"><img src="obrazy/bazyDanych.jfif" alt="obrazek" class="produktc1">Tworzenie i administrowanie bazami danych - Jolanta Pokorska</p>
            <form action="http://localhost/mateuszPokorniecki3P/projektSklep/zalogowany.php" method="post" id="navc3">
                <input type="submit" value="Dodaj" name="buttonDodaj2" class="nacButton">
            </form>
        </div>
    </section>
    <section id="stopka">
        <p id="autorStrony">Autor strony: Mateusz Pokorniecki 3P</p>
    </section>
</body>
</html>